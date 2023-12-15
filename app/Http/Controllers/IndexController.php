<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Alert;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Products;
use App\Models\CategoriesCafes;
use App\Models\Categories;



class IndexController extends Controller
{
    public function index () {
        $cafe=Cafe::with("categoriesCafe")->take(8)->get();
        $product=Products::with("Categories")->take(8)->get();
        $categoria=Categories::all();
        
        return view('index',["cafe"=>$cafe, "product" => $product, "categoria" => $categoria]);
    }   
    public function product_blade () {
      $product=Products::with("Categories")->paginate(8);
        $Allcategories=Categories::all();
        return view ('product',compact('product'), ["categories" => $Allcategories ]);
    }
      public function categories($id)
    {
        $product = Products::where("id_categories" , $id)->get();
        $Allcategories=Categories::all();
        return view('productCategory', ['categories' =>  $Allcategories, 'product' =>    $product ]);
    }
    public function cafe_blade () {
        $cafe=Cafe::with("categoriesCafe")->paginate(8);
        $categoriesCafe=CategoriesCafes::all();
        return view ('cafe',compact('cafe'), [ 'categorcafe'=>$categoriesCafe]);
    }
    public function categoriesCafe($id)
    {
        $cafe = Cafe::where("id_categoriesCafe" , $id)->get();
        $Allcategories=CategoriesCafes::all();
        return view('cafeCategory', ['categorcafe' =>  $Allcategories, 'cafe' => $cafe ]);
    }

    public function goods_blade ($id) {
        $product=Products::find($id);
        return view ('goods' , ['product' =>$product]);
    }

    public function show ($id_cafe, $categories_id=null ) {
        $cafes=Cafe::find($id_cafe);
        $categoriesproduct=Categories::all();
        $query = $cafes->product();
        $products = $query->get();
        return view ('information', compact('cafes','categoriesproduct' , 'products', ));
    }

    public function personal_blade () {
        return view ('users.personal_Area');
    }
    public function personal_courier_blade () {
        return view ('courier.personal_Area');
    }

}
