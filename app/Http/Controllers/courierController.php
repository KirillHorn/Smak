<?php

namespace App\Http\Controllers;

use App\Models\application_courier;
use App\Models\courier_orders;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\orderCustoms;
use App\Models\orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class courierController extends Controller
{
    public function courier_blade()
    {
       return view('application_courier');
    }
    public function registration_courier(Request $request)
    {
       $request->validate([
          "name" => "required|alpha",
          "surname" => "required|alpha",
          "patronymic" => "required|alpha",
          "email" => "required",
          "phone" => "required|numeric",
         ],
          [
             "email.required" => "Поле обязательно для заполнения!",
             "email.email" => "Введите корректный email",
 
             "name.required" => "Поле обязательно для заполнения!",
             "name.alpha" => "Имя должно состоять только из букв!",
             "surname.required" => "Поле обязательно для заполнения!",
             "surname.alpha" => "Фамилия должно состоять только из букв!",
             "patronymic.required" => "Поле обязательно для заполнения!",
             "patronymic.alpha" => "Отчество должно состоять только из букв!",
             "phone.required" => "Поле обязательно для заполнения!",
             "phone.numeric" => "Номер только из цифр!",
          ]);
       $courierInfo = $request->all();
 
       $courierCreate= application_courier::create([
             'name' => $courierInfo['name'],
             'surname' => $courierInfo['surname'],
             'patronymic' => $courierInfo['patronymic'],
             'email' => $courierInfo['email'],
             'phone' => $courierInfo['phone'],
             'id_status' => 1,
      
          ]);
       if ( $courierCreate) {
          return redirect()->back()->with("update", "Заявка отправлена!");
       } else {
          return redirect()->back()->with("error", "Проверьте данные!");
       }
     
    }
    public function personal_courier()
    {
      $orders_current = courier_orders::where('id_courier', Auth::id())
      ->whereHas('order_user.status', function ($query) {
          $query->where('id', '2');
      })
      ->with(['order_user.status'])
      ->with('order_user')
      ->first();
      $orders=courier_orders::where('id_courier', Auth::id())
      ->whereHas('order_user.status', function ($query) {
          $query->where('id', '3');
      })
      ->with(['order_user.status'])
      ->with('order_user')
      ->get();
       return view('courier.personal_Area',['orders' => $orders,'orders_current' => $orders_current]);
    }
    public function orders_pdf() {
      $orders = courier_orders::where('id_courier', Auth::id())->get();
      $pdf = PDF::loadView('components.pdf', compact('orders'))->setPaper('a4')->setOptions(['defaultFont' => 'Arial'])->setOption('charset', 'utf-8');
      $pdf->save(storage_path('app/pdf'));
      return $pdf->download('orders.pdf');
    }
    public function orders_courier()
    {
      $orders=orders::where('id_status',1)->paginate(8);
       return view('courier.orders_for_courier',compact('orders'));
    }
    public function specific_order($id)
    {
      $orders_personal=orders::find($id); 
      $orders_products=orderCustoms::where('order',$id)->with('product_order')->get();
       return view('courier.specific_order',['order' => $orders_personal, 'orders_products' => $orders_products]);
    }
    public function courier_order($id) {
      $orders_personal=orders::find($id);
         $orders_personal->id_status = 2;
         if ($orders_personal->save()) {
         $order_courier=courier_orders::create([
            'id_orders' => $orders_personal['id'],
            'id_courier' => Auth::id(),
         ]);
      }
      return redirect()->back()->with('success','Вы приняли заказ!');
    }
    public function courier_order_completed ($id) {
      $orders_personal=orders::find($id);
         $orders_personal->id_status = 3;
         if ($orders_personal->save()) {
            return redirect('/courier/personal_Area')->with('success','Вы завершили заказ!');
         } else {
            return redirect()->back()->with('error','Вы не завершили заказ!');
         }
    
     
    }
}
