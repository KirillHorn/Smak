<?php

namespace App\Http\Controllers;

use App\Models\application_courier;
use App\Models\applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cafe;
use App\Models\CategoriesCafes;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class adminController extends Controller
{

    public function serviceRedact_blade()
    {
        $categories = CategoriesCafes::all();
        $user=User::where('id_role', 2)->get();
        return view('admin.serviceRedact', ["categories" => $categories, 'moder' => $user]);
    }
    public function applicationModer($id) {
        if ($id == 1) {
            $application = applications::where('id_status', '=', 1)->get();
        } elseif ($id == 2 ) {
            $application = applications::where('id_status', '=', 2)->get();
        } else {
            $application = applications::where('id_status', '=', 3)->get();
        }
     
        return view('admin.applicationsUser', ['applications' => $application ]);
    }
    public function applicationAccepted($id) {
        $applicationAccepted=applications::find($id);
        $applicationAccepted->id_status = 2;
        $applicationAccepted->save();
        $password=Str::random(10);
        $userAdd=User::create([
            'name' => $applicationAccepted->name,
            'surname' => $applicationAccepted->surname,
            'patronymic' => $applicationAccepted->patronymic,
            'email' => $applicationAccepted->email,
            'phone' => $applicationAccepted->phone,
            'id_role' => 2,
            'password' => Hash::make($password),
        ]);
        $cafeAdd=Cafe::create([
            'title' => $applicationAccepted['title'],
            'img' =>$applicationAccepted['img'],
            'id_categoriesCafe' => $applicationAccepted['id_categoriesCafe'],
            'location' => $applicationAccepted['location'],
            'id_moder' => $userAdd['id'],
            'rating_cafe' => 0,
        ]);
        if ($userAdd) {
            $to = $userAdd['email'];
            $subject = "Ваше заведение " . $userAdd['title'] . " добавлено!";
            $message = '
            <html>
            <head>
              <title>Ваше заведение добавлено!</title>
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
                  <h1>Ваше заведение добавлено!</h1>
                </div>
                <div class="content">
                  <p>Вот ваши данные по входу в панель модератора!</p>
                  <p><strong>Электронная почта:</strong> ' . $userAdd['email'] . '</p>
                  <p><strong>Пароль:</strong> ' . $password . '</p>
                </div>
                <div class="footer">
                  <p>Если у вас возникли вопросы, пожалуйста, свяжитесь с нашей поддержкой.</p>
                </div>
              </div>
            </body>
            </html>
            ';
        
            // Заголовки для отправки HTML-письма
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
            // Дополнительные заголовки
            $headers .= 'From: no-reply@example.com' . "\r\n";
        
            mail($to, $subject, $message, $headers);
        }
        return redirect()->back()->with('success', 'Вы добавили Заведение ');
    }
    public function applicationDeviation($id) {
        $applicationAccepted=applications::find($id);
        $applicationAccepted->id_status = 3;
        $applicationAccepted->save();
        return redirect()->back()->with('success', 'Заявка не принята ');
    }
    public function allCourier_blade($id)
    {
        if ($id == 1) {
            $application = application_courier::where('id_status', '=', 1)->get();
        } elseif ($id == 2 ) {
            $application = application_courier::where('id_status', '=', 2)->get();
        } else {
            $application = application_courier::where('id_status', '=', 3)->get();
        }
     
        return view('admin.applicationsCourier', ['application_courier' => $application ]);
    }
    
    public function applicationAcceptedCourier($id) {
        $applicationAccepted=application_courier::find($id);
        $applicationAccepted->id_status = 2;
        $applicationAccepted->save();
        $password=Str::random(10);
        $userAdd=User::create([
            'name' => $applicationAccepted->name,
            'surname' => $applicationAccepted->surname,
            'patronymic' => $applicationAccepted->patronymic,
            'email' => $applicationAccepted->email,
            'phone' => $applicationAccepted->phone,
            'id_role' => 3  ,
            'password' => Hash::make($password),
        ]);
        if ($userAdd) {
            $to = $userAdd['email'];
            $subject = "Вы приняты на работу курьера " . $userAdd['name'] . "!";
            $message = '
            <html>
            <head>
              <title>Ваше заведение добавлено!</title>
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
            </html>
            ';
        
           
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        
            $headers .= 'From: no-reply@example.com' . "\r\n";
        
            mail($to, $subject, $message, $headers);
        }
        return redirect()->back()->with('success', 'Вы добавили нового курьера ');
    }
    public function applicationDeviationCourier($id) {
        $applicationAccepted=application_courier::find($id);
        $applicationAccepted->id_status = 3;
        $applicationAccepted->save();
        return redirect()->back()->with('success', 'Заявка не принята ');
    }
    public function serviceEdit_blade()
    {
        $cafe = Cafe::paginate(4);
        return view('admin.serviceEdit', compact('cafe'));
    }
    public function Edit($id)
    {
        $cafes_Edit = Cafe::find($id);
        $categoria_cafe = CategoriesCafes::where('id', '!=', $cafes_Edit['id_categoriesCafe'])->get();
        return view('admin.EditCafes', ['cafes_info' => $cafes_Edit, 'categoria_cafe' => $categoria_cafe]);
    }
    public function update_cafe(Request $request, Cafe $id)
    {
        $request->validate([
            'title' => 'required',
            'img' => 'required',
            'location' => 'required',
            'categoria_id' => 'required',
        ], [
            'title.required' => 'Это обязательное поле!',
            'img.required' => 'Это обязательное поле!',
            'location.required' => 'Это обязательное поле!',
            'categoria_id' => 'Это обязательное поле!',
        ]);

        $cafeInfo = $request->all();
        $img_info = $request->file('img')->hashName();
        $path_img = $request->file('img')->store('/public/img');

        $id->fill(
            [
                'title' => $cafeInfo['title'],
                'img' => $img_info,
                'id_categoriesCafe' => $cafeInfo['categoria_id'],
                'location' => $cafeInfo['location'],
            ]);
        $id->save();
        return redirect("/moder/serviceEdit")->with("success", "редактирование заведения прошла успешна");

    }

    public function delete_cafe(Cafe $id)
    {
        $id->delete();
        return redirect()->back()->with("success", "удаление прошло успешно");

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
        $Categories = Categories::paginate(6);
        return view('admin.CategoriesEdit', compact('Categories'));
    }
    public function Categories_one($id)
    {
        $Categories = Categories::find($id);
        return view('admin.CategoriesEdit_redact', ['categories' => $Categories]);
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
}
