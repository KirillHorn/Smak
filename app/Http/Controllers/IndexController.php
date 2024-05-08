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
use App\Models\comments;
use App\Models\orderCustoms;
use App\Models\orders;



class IndexController extends Controller
{
    public function index () {
        $cafe=Cafe::with("categoriesCafe")->take(8)->get();
        $product=Products::with("Categories")->take(8)->get();
        $categoria=Categories::all()->take(8);
        $categoria_cafe=CategoriesCafes::all()->take(6);
        return view('index',["cafe"=>$cafe,"categorcafe" => $categoria_cafe, "product" => $product, "categoria" => $categoria]);
    }
    public function product_blade_cate () {
      $product=Products::with("Categories")->paginate(8);
        $Allcategories=Categories::all();
        return view ('product',compact('product'), ["categories" => $Allcategories ]);
    }
    public function show($id_cafe) {
        $cafe=Cafe::find($id_cafe);
        $product_cafe=Products::where('id_cafe',$id_cafe)->get();
        $comment=comments::where('id_cafe', $id_cafe)->get();
        return view('information',['cafes' => $cafe,'product_cafe' => $product_cafe,'comments' => $comment]);
    }

    public function comment_cafes (Request $request,$id) {
        $request->validate([
            "comment" => "required",
        ],[
            "comment.required" => "Поле обязательно для заполнения!",
        ]);
        $comment=$request->all();
        $comment_add = comments::create([
            'comments_text' => $comment['comment'],
            'id_cafe' => $id,
            'id_user' => Auth::id(),
            'rating' => $comment['rating'],
        ]); 
        $username = Auth::user()->name; // Добавьте это, если хотите получить имя пользователя, оставившего комментарий

        return response()->json([
            'success' => true,
            'comment' => [
                'username' => $username,
                'rating' => $comment['rating'],
                'comment' => $comment['comment']
            ]
        ]);
    }
      public function product_blade(Request $request)
    {
        $sortOrder = $request->get('sort_order');
        if ($sortOrder == 0) {
            $product = Products::with("Categories")->paginate(8);
        } else {
            $product=Products::with("Categories")->where('id_categories',$sortOrder)->paginate(8);
        }
        $Allcategories=Categories::all();
        return view('product', compact('product'), ["categories" => $Allcategories ]);
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
    public function personal_blade () {
        $userid=Auth::id();
        $orders = orders::where('id_users', $userid)->get();
        return view ('users.personal_Area', ['orders' => $orders]);
    }
    public function personal_orders($id) {
        $orders_personal=orders::find($id);
        $orders_products=orderCustoms::where('order',$id)->with('product_order')->get();
        return view('users.order_user',['orders_user' => $orders_personal, 'orders_products' => $orders_products]);
    }

 
}
