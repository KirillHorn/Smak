<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Alert;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\baskets;
use App\Models\Cafe;
use App\Models\Products;
use App\Models\CategoriesCafes;
use App\Models\Categories;
use App\Models\orders;



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
      public function categories(Request $request)
    {
        $sortOrder = $request->get('sort_order');
        if ($sortOrder == 0) {
            $product = Products::all()->paginate(8);
        } else {
            $product=Products::where('Categories',$sortOrder)->paginate(8);
        }
        $Allcategories=Categories::all();
        return view('product', ['categories' =>  $Allcategories, 'product' =>    $product ]);
    }
    public function cafe_blade (Request $request) {
        $sortOrder = $request->get('sort_order');
        if ($sortOrder == 0) {
        $cafe=Cafe::with("categoriesCafe")->paginate(8);
        } else {
            $cafe=Cafe::where('id_categoriesCafe',$sortOrder)->paginate(8);
        }
        $categoriesCafe=CategoriesCafes::all();

        return view('cafe',compact('cafe'),['categorcafe'=>$categoriesCafe]);
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
        $userid=Auth::id();
        $orders = orders::where('id_users', $userid)->get();
        $basket= baskets::where('id_users', $userid)->get();
        return view ('users.personal_Area', ['orders' => $orders , 'basket' =>$basket]);
    }

 
}
