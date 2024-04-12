<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\baskets;
use App\Models\orders;
use App\Models\orders_products;
use App\Models\orderCustoms;


class OrderController extends Controller
{
    public function OrderController()
    {
        $totalSum = Session::get('total_sum', 0);
        return view('order', ['totalSum' => $totalSum]);
    }
    function getBaskets()
    {
        $basket = DB::table('baskets')
            ->select('products.title', 'products.cost', 'products.img', 'baskets.id', 'count')
            ->join('products', 'baskets.id_product', '=', 'products.id')
            ->where('id_users', '=', Auth::id())
            ->get();

        return view('baskets', ['basket' => $basket])->with('baskets', 'Корзина пуста');
    }
    public function baskets($id)
    {
        $id_users = Auth::id();
        $b_u = Auth::user()->basket_products;
        $isInBasket = false;
        foreach ($b_u as $item) {
            if ($item->id_product == $id) {
                $productInBasket = baskets::find($item->id);
                $productInBasket->count += 1;
                $productInBasket->save();
                $isInBasket = true;
                return redirect()->back();
            }
        }
        baskets::create([
            'id_product' => $id,
            'id_users' => $id_users,
            'count' => 1,
        ]);

        return redirect()->back();
    }
    public function baskets_delete($id)
    {
        $id_users = Auth::id();
        $b_u = Auth::user()->basket_products;
        $isInBasket = false;
        foreach ($b_u as $item) {
            if ($item->id_product == $id) {
                $productInBasket = baskets::find($item->id);
                $productInBasket->count -= 1;
                $productInBasket->save();
                $isInBasket = true;
                return redirect()->back();
            } else {
                $b = baskets::where([
                    "id_users" => Auth::id(),
                    "id" => $item->id
                ])->delete();

                return redirect()->back();
            }
        }
    }
    public function baskets_order(Request $request)
    {
        $infoProduct = $request->all();    
        $request->session()->put('total_sum', $infoProduct['total_sum']);
        $id_users = Auth::id();
        $isInBasket = false;
        $productUser = baskets::where('id_users', $id_users)->get(); 
        $productCount=$infoProduct['products'];
        foreach ($productUser as $item) {
            foreach ($productCount as $count) {
                if ($item->id_product == $count['id']) {
                        $item->count = $count['count'];
                        $item->save();
                } else {
                    $false=false;
                }
            }
        }
        return redirect('/order');
    }
    public function orderCreate(Request $request)
    {
        $userID = Auth::id();
        $request->validate([
            'location' => 'required',
            'comment' => 'required',
        ], [
            'location.required' => 'Это обязательное поле!',
            'comment.required' => 'Это обязательное поле!',
        ]);

        $infoOrder = $request->all();
        $orderAdd = orders::create([
            'amount' => $infoOrder['amount'],
            'id_users' => $userID,
            'comment' => $infoOrder['comment'],
            'location' => $infoOrder['location'],
            'paymant' => $infoOrder['very']
        ]);
        $to  =  Auth::user()->email;
        $subject = "Чек по заказу№" . $orderAdd['id'];
        $message = '
        Чек по заказу:
        Цена заказа:' . $orderAdd['amount'] . 'руб '.'
        Комментарий заказа: ' . $orderAdd['comment'] . '
        Адрес доставки:' . $orderAdd['location'] . '
        ';
        mail($to, $subject, $message);
        if ($orderAdd) {
            $productUser = baskets::where('id_users', $userID)->get();
            foreach ($productUser as $product) {
                orderCustoms::create([
                    'order' => $orderAdd['id'],
                    'product' => $product['id_product'],
                    'count'=>$product['count']

                ]);
            }
            DB::table('baskets')->delete();
            return redirect('/users/personal_Area');
        } else {
            return redirect('/orders');
        }
    }
}
