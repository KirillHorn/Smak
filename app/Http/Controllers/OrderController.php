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

    public function baskets($id)
    {

        $id_users = Auth::id();
        baskets::create([
            'id_product' => $id,
            'id_users' => $id_users,
            'created_at' => null,
            'updated_at' => null,
        ]);

        $basket = DB::table('baskets')
            ->select('products.title', 'products.cost', 'products.img', 'baskets.id')
            ->join('products', 'baskets.id_product', '=', 'products.id')
            ->where('id_users', '=', $id_users)
            ->get();

        return view('baskets', ['basket' => $basket])->with('success', '');
    }


    public function baskets_delete( baskets $id)
    {

        $userID = Auth::id();
        // $test = baskets::find($id)->where('id_users', $userID)

        //     ->delete();

       // $test = baskets::where([['id', $id],['id_users', $userID]])->delete();
       DB::delete('DELETE FROM baskets WHERE id = ?' , [$id]);
    // if ($test) {

        return redirect()->back();
    // } else {
    //     return redirect()->back()->with('error' , ' Хуйня ебананя');
    // }

        // $basket = DB::table('baskets')
        // ->select('products.title' , 'products.cost', 'products.img', 'baskets.id' )
        // ->join('products','baskets.id_product','=','products.id')
        // ->where('id_users', '=' , $userID)
        // ->get();

        // session(['basket' => $basket]);


    }

    public function orderCreate(Request $request) {
        $userID = Auth::id();
        $request ->validate([
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

        if ($orderAdd ) {
            return redirect('/users/personal_Area');
        } else {
            return redirect('/orders');
        }
    }
}
