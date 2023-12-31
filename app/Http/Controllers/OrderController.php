<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\baskets;
use App\Models\orders;

class OrderController extends Controller
{
    public function OrderController()
    {
        return view('order');
    }

    function getBaskets()
    {
        $basket = DB::table('baskets')
            ->select('products.title', 'products.cost', 'products.img', 'baskets.id','count')
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
                if ($item->id_product == $id){
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
        // dd($b);
        // $userID = Auth::id();
        // $test = baskets::find($id)->where('id_users', $userID)

        //     ->delete();

        // $test = baskets::where([['id', $id],['id_users', $userID]])->delete();
        // DB::delete('DELETE FROM baskets WHERE id = ?', [$id]);
        // if ($test) {

       
        // } else {
        //     return redirect()->back()->with('error' , ' Хуйня ебананя');
        // }

        // $basket = DB::table('baskets')
        // ->select('products.title' , 'products.cost', 'products.img', 'baskets.id' )
        // ->join('products','baskets.id_product','=','products.id')
        // ->where('id_users', '=' , $userID)
        // ->get();

        // session(['basket' => $basket]);


  

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
        ]);

        if ($orderAdd) {
            // $id_basket=baskets::join('orders', 'baskets.id_basket', '=', 'orders.id_basket')
            // ->select('baskets.id', 'baskets.id_basket', 'baskets.id_order', 'baskets.count', 'baskets.created_at', 'baskets.updated_at')
            // ->get();
            // $orders= orders::create([

            // ]);

            return redirect('/users/personal_Area');
        } else {
            return redirect('/orders');
        }
    }
}
