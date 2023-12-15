<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\baskets;

class OrderController extends Controller
{
   public function OrderController () {
    return view('order');
   }

   public function baskets ($id) {

      $id_users= Auth::id();
      baskets::create([
         'id_product' => $id,
         'id_users' => $id_users,
     ]);

     $basket = DB::table('baskets')
     ->select('products.title' , 'products.cost', 'products.img', 'baskets.id' )
     ->join('products','baskets.id_product','=','products.id')
     ->where('id_users', '=' , $id_users)
     ->get();
      
     session(['basket' => $basket]);

      return view('baskets')->with('success','');
   }
   
}
