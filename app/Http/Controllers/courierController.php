<?php

namespace App\Http\Controllers;

use App\Models\application_courier;
use App\Models\area;
use App\Models\courier_orders;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\orderCustoms;
use App\Models\orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\View\Components\Pdf_order;
use Carbon\Carbon;
use PDF;

class courierController extends Controller
{
    public function courier_blade()
    {
       return view('application_courier');
    }
     public function personal_courier(Request $request)
    {
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    // Получение текущих заказов (со статусом 2) без фильтрации по датам
    $orders_current = courier_orders::where('id_courier', Auth::id())
        ->whereHas('order_user.status', function ($query) {
            $query->where('id', '2');
        })
        ->with(['order_user.status', 'order_user'])
        ->first();

    // Получение завершенных заказов (со статусом 3) с возможной фильтрацией по датам
    $orders_query = courier_orders::where('id_courier', Auth::id())
        ->whereHas('order_user.status', function ($query) {
            $query->where('id', '3');
        })
        ->with(['order_user.status', 'order_user']);

    // Применение фильтрации по диапазону дат, если оба параметра переданы
    if ($start_date && $end_date) {
        $orders_query->whereBetween('created_at', [$start_date, $end_date]);
      
    }

    $orders = $orders_query->get();
    // Рассчитать разницу во времени для завершенных заказов
    foreach ($orders as $order) {
        $start = Carbon::parse($order->order_user->start_order);
        $end = Carbon::parse($order->order_user->end_order);
        $order->difference = $end->diff($start)->format('%H:%I:%S');
    }

    // Возврат представления с заказами
    return view('courier.personal_Area', [
        'orders' => $orders,
        'orders_current' => $orders_current
    ]);
}
public function orders_pdf(Request $request)
{
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $order_query = courier_orders::where('id_courier', Auth::id());
    if ($start_date && $end_date) {
        $start_date = Carbon::parse($start_date)->startOfDay();
        $end_date = Carbon::parse($end_date)->endOfDay();
        $order_query->whereBetween('created_at', [$start_date, $end_date]);
    }
    $orders = $order_query->get();
    $pdfComponent = new Pdf_order($orders);
    $pdf = PDF::loadView('components.pdf', ['orders' => $pdfComponent->orders, 'start_date' => $start_date, 'end_date' => $end_date])
        ->setPaper('a4')
        ->setOptions(['defaultFont' => 'Arial'])
        ->setOption('charset', 'utf-8');
    return $pdf->download('orders.pdf');
}

        public function orders_courier($area_id)
        {
            $area = area::all();
            if ($area_id == 0) {
                $orders = orders::where('id_status', 1)
                ->join('branchs', 'orders.id_brach', '=', 'branchs.id')
                ->join('streets as branch_streets', 'branchs.id_street', '=', 'branch_streets.id')
                ->join('areas as branch_areas', 'branch_streets.id_area', '=', 'branch_areas.id')
                ->join('streets as order_streets', 'orders.id_street', '=', 'order_streets.id')
                ->select('orders.*', 'order_streets.title_street as order_street', 'branch_areas.title_area as branch_area', 'branch_streets.title_street as branch_street', 'branchs.title as branch_title')
                ->orderBy('branchs.title')
                ->orderBy('order_streets.title_street')
                ->orderBy('branch_areas.title_area')
                ->paginate(8);
            } else {
                $orders = orders::where('id_status', 1)
                ->join('branchs', 'orders.id_brach', '=', 'branchs.id')
                ->join('streets as branch_streets', 'branchs.id_street', '=', 'branch_streets.id')
                ->join('areas as branch_areas', 'branch_streets.id_area', '=', 'branch_areas.id')
                ->join('streets as order_streets', 'orders.id_street', '=', 'order_streets.id')
                ->where('branch_areas.id', $area_id)  
                ->select('orders.*', 'order_streets.title_street as order_street', 'branch_areas.title_area as branch_area', 'branch_streets.title_street as branch_street', 'branchs.title as branch_title')
                ->orderBy('branchs.title')
                ->orderBy('order_streets.title_street')
                ->orderBy('branch_areas.title_area')
                ->paginate(8);
            }
    
        return view('courier.orders_for_courier', compact('orders'),['area' => $area]);
        }
    public function specific_order($id)
    {
      $orders_personal = orders::where('orders.id', $id)
      ->join('branchs', 'orders.id_brach', '=', 'branchs.id')
      ->join('streets as branch_streets', 'branchs.id_street', '=', 'branch_streets.id')
      ->join('areas as branch_areas', 'branch_streets.id_area', '=', 'branch_areas.id')
      ->join('streets as order_streets', 'orders.id_street', '=', 'order_streets.id')
      ->select(
          'orders.*', 
          'order_streets.title_street as order_street', 
          'branch_areas.title_area as branch_area', 
          'branch_streets.title_street as branch_street', 
          'branchs.title as branch_title'
      )
      ->orderBy('branchs.title')
      ->orderBy('order_streets.title_street')
      ->orderBy('branch_areas.title_area')
      ->first();
      $orders_personal->start_order = Carbon::parse($orders_personal->start_order);
      $orders_personal->end_order = Carbon::parse($orders_personal->end_order);
      $orders_personal->difference = $orders_personal->end_order->diff($orders_personal->start_order)->format('%H:%I:%S');
      $orders_products=orderCustoms::where('order',$id)->with('product_order')->get();
       return view('courier.specific_order',['order' => $orders_personal, 'orders_products' => $orders_products]);
    }
    public function courier_order($id) {
      $orders_personal = orders::find($id);
      if (!$orders_personal) {
          return redirect()->back()->with('error', 'Заказ не найден!');
      }
      $orders_personal->id_status = 2;
      $orders_personal->start_order = Carbon::now(); // Установка времени начала
      if ($orders_personal->save()) {
          courier_orders::create([
              'id_orders' => $orders_personal->id,
              'id_courier' => Auth::id(),
              
          ]);
      }
      return redirect()->back()->with('success', 'Вы приняли заказ!');
  }
  public function courier_order_completed($id) {
      $orders_personal = orders::find($id);
      if (!$orders_personal) {
          return redirect()->back()->with('error', 'Заказ не найден!');
      }
      $orders_personal->id_status = 3;
      $orders_personal->end_order = Carbon::now(); 
      $order_courier = courier_orders::where('id_orders', $id)->first();
      $order_courier->save();
      if ($orders_personal->save()) {
          $startTime = Carbon::parse($orders_personal->start_order);
          $endTime = Carbon::parse($orders_personal->end_order);
          $duration = $endTime->diffForHumans($startTime, true); 
          return redirect('/courier/personal_Area')->with('success', "Вы завершили заказ! Время выполнения: $duration");
      } else {
          return redirect()->back()->with('error', 'Вы не завершили заказ!');
      }
  }
}
