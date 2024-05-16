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
                break; 
            }
        }
        if (!$isInBasket) {
            baskets::create([
                'id_users' => $id_users,
                'id_product' => $id,
                'count' => 1,
            ]);
        }
        return redirect()->back()->with('success', 'вы добавили товар');
    }
    public function baskets_delete($id)
    {
        $id_users = Auth::id();
        $isInBasket = false;
        $basket=baskets::where('id_users',$id_users);
        $basket->delete();
        return response()->json(['success' => true]);
            
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
            'id_status' => 1,
            'paymant' => $infoOrder['very']
        ]);
        $to = Auth::user()->email;
        $subject = "Чек по заказу №" . $orderAdd['id'];
        
        $message = '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Чек по заказу</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                }
                .container {
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    background-color: #f9f9f9;
                }
                .header {
                    background-color: #A408A7;
                    color: #fff;
                    padding: 10px;
                    border-radius: 5px 5px 0 0;
                }
                .content {
                    margin-top: 20px;
                }
                .footer {
                    margin-top: 20px;
                    font-size: 0.8em;
                    color: #777;
                }
                .order-details {
                    margin-top: 10px;
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    background-color: #fff;
                }
              </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Чек по заказу №' . $orderAdd['id'] . '</h1>
                </div>
                <div class="content">
                    <p>Спасибо за ваш заказ! Вот детали вашего заказа:</p>
                    <div class="order-details">
                        <p><strong>Цена заказа:</strong> ' . $orderAdd['amount'] . ' руб.</p>
                        <p><strong>Комментарий заказа:</strong> ' . $orderAdd['comment'] . '</p>
                        <p><strong>Адрес доставки:</strong> ' . $orderAdd['location'] . '</p>
                    </div>
                </div>
                <div class="footer">
                    <p>Если у вас возникли вопросы, пожалуйста, свяжитесь с нашей поддержкой.</p>
                </div>
            </div>
        </body>
        </html>
        ';
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: no-reply@example.com' . "\r\n";
        mail($to, $subject, $message, $headers);
        if ($orderAdd) {
            $productUser = baskets::where('id_users', $userID)->get();
            foreach ($productUser as $product) {
                orderCustoms::create([
                    'order' => $orderAdd['id'],
                    'product' => $product['id_product'],
                    'count'=>$product['count']

                ]);
            }
            DB::table('baskets')->where('id_users', $userID)->delete();
            return redirect('/users/personal_Area');
        } else {
            return redirect('/orders');
        }
    }
}
