<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Alert;
use App\Models\area;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; // Возвращаем эту строку

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\baskets;
use App\Models\branchs;
use App\Models\Cafe;
use App\Models\Products;
use App\Models\CategoriesCafes;
use App\Models\Categories;
use App\Models\comments;
use App\Models\orderCustoms;
use App\Models\orders;
use App\Models\street;
use Illuminate\Auth\Events\Validated;

class IndexController extends Controller
{
    public function index()
    {
        $product = Products::with("Categories")->take(8)->get();
        $categoria = Categories::all()->take(12);
        $area= area::all();
        $productJson = json_encode($product->pluck('title')->toArray());
        return view('index', [ "product" => $product, "categoria" => $categoria,"productJson" => $productJson,
        'areas' => $area
        ]); 
    }
    public function product_blade_cate()
    {
        $product = Products::with("Categories")->paginate(8);
        $Allcategories = Categories::all();
   
        return view('product', compact('product'), ["categories" => $Allcategories]);
    }
    public function comment_cafes(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "comment" => "required",
            'rating' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->error()
            ]);
        }
        $comment = $request->all();
        $comment_add = comments::create([
            'comments_text' => $comment['comment'],
            'id_product' => $id,
            'id_user' => Auth::id(),
            'rating' => $comment['rating'],
        ]);
        $username = Auth::user()->name; // Добавьте это, если хотите получить имя пользователя, оставившего комментарий
        if ($comment_add) {
            return response()->json([
                'success' => true,
                'comment' => [
                    'username' => $username,
                    'rating' => $comment['rating'],
                    'comment' => $comment['comment']
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Ошибка добавления комментария'
            ]);
        }
    }
    public function product_blade(Request $request)
    {
        $sortOrder = $request->get('sort_order');
        if ($sortOrder == 0) {
            $product = Products::with("Categories")->paginate(8);
        } else {
            $product = Products::with("Categories")->where('id_categories', $sortOrder)->paginate(8);
        }
        $Allcategories = Categories::all();
        return view('product', compact('product'), ["categories" => $Allcategories]);
    }
    public function branch_blade(Request $request)
    {
        $sortOrder = $request->get('sort_order');
        $branch_query = branchs::query();
        $branchCount = branchs::getBranchCount();
        $branchs_first=branchs::first();
        $branchs = $branch_query->where('id', "!=", $branchs_first->id)->paginate(8);

        return view('cafe', compact('branchs', 'branchs_first','branchCount'));
    }
    public function goods_blade($id)
    {
        $product = Products::find($id);
        $currentTime = now()->setTimezone('Asia/Yekaterinburg');
        $comment = comments::where('id_product', $id)->get();
        $averageRating = DB::table('comments')
            ->where('id_product', $id)
            ->avg('rating');
            
        $averageRating = number_format($averageRating, 1);

        return view('goods', ['product' => $product, 'comments' => $comment,'averageRating' => $averageRating,'currentTime' => $currentTime]);
    }
    public function personal_blade()
    {
        $userid = Auth::id();
        $orders = orders::where('id_users', $userid)->get();
        return view('users.personal_Area', ['orders' => $orders]);
    }
    public function personal_orders($id)
    {
        $orders_personal = orders::find($id);
        $orders_products = orderCustoms::where('order', $id)->with('product_order')->get();
        return view('users.order_user', ['orders_user' => $orders_personal, 'orders_products' => $orders_products]);
    }
    public function search(Request $request)
    {
        $query = $request->input('search');
        $categories = Categories::all();
        $product = Products::with("Categories")->get();
        $categoriesJson = json_encode($categories->pluck('title')->toArray());
        $productJson = json_encode($product->pluck('title')->toArray());
            $products = Products::where('title', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->limit(10)
                ->get();
                $category = Categories::where('title', 'like', "%{$query}%")->first();

    // Если категория найдена, получаем продукты из этой категории
    if ($category) {
        $products = $category->product()->limit(10)->get();
    }
            $results = $products->unique('title')->values()->all();
        return view('search', compact('results'), [
            "categoriesJson" => $categoriesJson,
            "productJson" => $productJson,
        ]);
    }
}
