<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Alert;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Products;
use App\Models\CategoriesCafes;


class IndexController extends Controller
{
    public function index () {
        $cafe=Cafe::with("categoriesCafe")->get();
        $product=Products::with("Categories")->get();
        // dd($cafe);
        // $cafe=cafe::all();
        return view('index',["cafe"=>$cafe, "product" => $product]);
    }
    public function product_blade () {
        
        return view ('product');
    }
    public function cafe_blade () {
        return view ('cafe');
    }
    
    public function goods_blade ($id) {
        $product=Products::find($id);
        return view ('goods' , ['product' =>$product]);
    }

    public function show ($id_cafe) {
        $id_cafes=Cafe::find($id_cafe);
        return view ('information',['cafe_id'=>$id_cafes]);
    }

    public function personal_blade () {
        return view ('users.personal_Area');
    }
    public function personal_courier_blade () {
        return view ('courier.personal_Area');
    }
//     public function boot(): void
// {
//     Blade::component('header-alert', Alert::class);
// }
}
