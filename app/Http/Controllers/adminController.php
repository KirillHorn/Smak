<?php

namespace App\Http\Controllers;

use App\Models\application_courier;
use App\Models\area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\branchs;
use App\Models\street;
use App\Models\Categories;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class adminController extends Controller
{


    public function allCourier_blade($id)
    {

     
        return view('admin.applicationsCourier');
    }

    public function serviceProduct_blade()
    {
        $categories = Categories::all();
        $products=Products::paginate(4);
        return view('admin.serviceEditProduct', compact('products'), ["categories" => $categories]);
    }
    public function serviceEditproduct_blade($id) {
        $products=Products::find($id);
        $categories =Categories::where('id', '!=', $products['id_categories'])->get();
        return view('admin.EditProduct', ["product" => $products,"categories" => $categories]);
    }
    
    public function applicationAcceptedCourier(Request $request) {
        $request->validate([
            "name" => "required|alpha",
            "surname" => "required|alpha",
            "patronymic" => "required|alpha",
            "email" => "required|unique:users|email",
            "phone" => "required|min:11"],
            [
               "email.required" => "Поле обязательно для заполнения!",
               "email.email" => "Введите корректный email",
               "email.unique" => "Данный email уже занят",
               "name.required" => "Поле обязательно для заполнения!",
               "name.alpha" => "Имя должна состоять только из букв!",
               "surname.required" => "Поле обязательно для заполнения!",
               "surname.alpha" => "Фамилия должна состоять только из букв!",
               "patronymic.required" => "Поле обязательно для заполнения!",
               "patronymic.alpha" => "Отчество должна состоять только из букв!",
               "phone.required" => "Поле обязательно для заполнения!",
               "phone.min" => "Поле должно состоять из 11 символов!",
               "password.required" => "Поле обязательно для заполнения!",
               "confirm_password.same" => "Пароли должны совпадать!",
               "confirm_password.required" => "Поле обязательно для заполнения!",
            ]);
        $userInfo = $request->all();
        $password=Str::random(10);
        $userAdd=User::create([
            'name' => $userInfo['name'],
            'surname' => $userInfo['surname'],
            'patronymic' => $userInfo['patronymic'],
            'email' => $userInfo['email'],
            'phone' => $userInfo['phone'],
            'id_role' => 3  ,
            'password' => Hash::make($password),
        ]);
        if ($userAdd) {
            $to = $userAdd['email'];
            $subject = "Вы приняты на работу курьера " . $userAdd['name'] . "!";
            $message = '
            <html>
            <head>
              <title>Ваш аккаунт был создан!</title>
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
              </style>
            </head>
            <body>
              <div class="container">
                <div class="header">
                  <h1>Вы приняты!</h1>
                </div>
                <div class="content">
                  <p>Вот ваши данные по входу в личный кабинет!</p>
                  <p><strong>Электронная почта:</strong> ' . $userAdd['email'] . '</p>
                  <p><strong>Пароль:</strong> ' . $password . '</p>
                </div>
                <div class="footer">
                  <p>Если у вас возникли вопросы, пожалуйста, свяжитесь с нашей поддержкой.</p>
                </div>
              </div>
            </body>
            </html>';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: no-reply@example.com' . "\r\n";
            mail($to, $subject, $message, $headers);
        }
        return redirect()->back()->with('success', 'Вы добавили нового курьера ');
    }
    public function serviceEdit_blade(Request $request)
    {

        $areas = area::all();
        $branch_query = branchs::query();

        if ($request->has('area_id') && $request->area_id) {
            $branch_query->whereHas('street', function ($branch_query) use ($request) {
                $branch_query->where('id_area', $request->area_id);
            });
        }

        $branch = $branch_query->paginate(4);
        return view('admin.serviceEdit', compact('branch','areas'));
    }
    public function Edit($id)
    {
        $cafes_Edit = branchs::find($id);
        $street = street::where('id', '!=', $cafes_Edit['id_street'])->get();
        $street_all = street::all();
        $streetJson = json_encode($street_all->pluck('title_street')->toArray());
        return view('admin.EditCafes', ['branchs' => $cafes_Edit, 'street' => $street,"streetJson" => $streetJson]);
    }
  

    public function delete_cafe(branchs $id)
    {
        $id->delete();
        return redirect()->back()->with("success", "Удаление прошло успешно");
    }
    public function EditCategories()
    {
        return view('admin.EditCategories');
    }
    public function categories_Add(Request $request) {
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Это обязательное поле!',
        ]);
        $infocategories=$request->all();
        $cafeAdd = Categories::create([
            'title' => $infocategories['title'],
        ]);
        if ($cafeAdd) {
            return redirect()->back()->with('success', 'Вы добавили категорию');
        } else {
            return redirect('/')->with('error', 'Не удалось добавить категорию ');
        }
    }
    public function Categories()
    {
        $Categories = Categories::with('product')->paginate(6);
        return view('admin.CategoriesEdit', compact('Categories'));
    }

    public function categories_update(Request $request,Categories $id) {
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Это обязательное поле!',
        ]);
        $infocategories=$request->all();
        $id->fill(
            [
                'title' => $infocategories['title'],
            ]);
        $id->save();
        if ($id->save()) {
            return redirect()->back()->with('sussecc','Вы изменили категорию!');
        } else {
            return redirect()->back()->with('error','Вы не смогли изменить категорию!');
        }
    }
    public function serviceRedactProduct_blade()
    {
        $Categories = Categories::all();
        return view('admin.serviceRedactProduct', ["categories" => $Categories]);
    }
    public function delete_product(Products $id)
    {
        $id->delete();
        return redirect()->back()->with("success", "Удаление блюда прошло успешно");

    }
    public function edit_product(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'weight'=> 'required|numeric',
            'cost'=> 'required|numeric',
            'img' => 'required',
            'id_categories'=> 'required'
        ], [
            'title.required' => 'Это обязательное поле!',
            'description.required' => 'Это обязательное поле!',
            'weight.required' => 'Это обязательное поле!',
            'weight.numeric' => 'Это поле должно состоять только из чисел',
            'cost.required' => 'Это обязательное поле!',
            'cost.numeric' => 'Это поле должно состоять только из чисел',
            'img.required' => 'Это обязательное поле!',
            'id_categories.required' => 'Это обязательное поле!'
        ]);
        $infoproduct = $request->all();
        $img_info = $request->file('img')->hashName();
        $path_img = $request->file('img')->store('/public/img');
        $cafeAdd = Products::create([
            'title' => $infoproduct['title'],
            'description' => $infoproduct['description'],
            'weight' => $infoproduct['weight'],
            'cost' => $infoproduct['cost'],
            'img' => $img_info,
            'rating_product' => 0,
            'id_categories'=>$infoproduct['id_categories'],
        ]);
        if ($cafeAdd) {
            return redirect()->back()->with('success', 'Вы добавили блюдо ');
        } else {
            return redirect('/')->with('error', 'Не удалось добавить блюдо ');
        }
    }

        public function updateProduct(Request $request, Products $id ) {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'weight'=> 'required|numeric',
                'cost'=> 'required|numeric',
                'img' => 'required',
                'id_categories'=> 'required'
            ], [
                'title.required' => 'Это обязательное поле!',
                'description.required' => 'Это обязательное поле!',
                'weight.required' => 'Это обязательное поле!',
                'weight.numeric' => 'Это поле должно состоять только из чисел',
                'cost.required' => 'Это обязательное поле!',
                'cost.numeric' => 'Это поле должно состоять только из чисел',
                'img.required' => 'Это обязательное поле!',
                'id_categories.required' => 'Это обязательное поле!' 
            ]);
           
            $infoproduct = $request->all();
            $img_info = $request->file('img')->hashName();
            $path_img = $request->file('img')->store('/public/img');
            $id->fill(
                [
                    'title' => $infoproduct['title'],
                'description' => $infoproduct['description'],
                'weight' => $infoproduct['weight'],
                 'cost' => $infoproduct['cost'],
                'img' => $img_info,
                'id_categories'=>$infoproduct['id_categories'],
                ]);
            if ($id->save()) {
                return redirect("/admin/serviceEditProduct")->with("success", "Редактирование блюда прошло успешно");
            } else {
                return redirect()->back()->with("error", "Ошибка в редактирование!");
            }
          
        }
        public function add_branch_blade()
        {
            $street = street::all();
            $streetJson = json_encode($street->pluck('title_street')->toArray());

            return view('admin.serviceBrech', ["street" => $street,"streetJson" => $streetJson,]);
        }
        public function add_branch(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'phone' => 'required',
                'img' => 'required',
                'id_street'=> 'required',
                'location_detalis' => 'required'
            ], [
                'title.required' => 'Это обязательное поле!',
                'phone.required' => 'Это обязательное поле!',
                'img.required' => 'Это обязательное поле!',
                'id_street.required' => 'Это обязательное поле!',
                'location_detalis.required' => 'Это обязательное поле!',
            ]);
            $infoBranch = $request->all();
            $street = street::where('title_street', $infoBranch['id_street'])->first();
            $img_info = $request->file('img')->hashName();
            $path_img = $request->file('img')->store('/public/img');
            $branchAdd = branchs::create([
                'title' => $infoBranch['title'],
                'img' =>$img_info,
                'id_street' => $street['id'],
                'phone' => $infoBranch['phone'],
                'location_detalis' => $infoBranch['location_detalis'],
            ]);
            if ($branchAdd) {
                return redirect()->back()->with('success', 'Вы добавили филиал ');
            } else {
                return redirect('/')->with('error', 'Не удалось добавить филиал ');
            }
            }
            public function update_cafe(Request $request, branchs $id)
            {
                $request->validate([
                    'title' => 'required',
                        'phone' => 'required',
                        'img' => 'required',
                        'id_street'=> 'required',
                        'location_detalis' => 'required'
                ], [
                    'title.required' => 'Это обязательное поле!',
                    'phone.required' => 'Это обязательное поле!',
                    'img.required' => 'Это обязательное поле!',
                    'id_street.required' => 'Это обязательное поле!',
                    'location_detalis.required' => 'Это обязательное поле!',
                ]); 
                $cafeInfo = $request->all();
                $street = street::where('title_street', $cafeInfo['id_street'])->first();
                $img_info = $request->file('img')->hashName();
                $path_img = $request->file('img')->store('/public/img');
                $id->fill(
                    [
                        'title' => $cafeInfo['title'],
                        'img' => $img_info,
                        'id_street' => $street['id'],
                        'phone' => $cafeInfo['phone'],
                        'location_detalis' => $cafeInfo['location_detalis'],
                    ]);
                $id->save();
                return redirect("/admin/serviceEdit")->with("success", "Редактирование филиала прошла успешна");
            }
}
