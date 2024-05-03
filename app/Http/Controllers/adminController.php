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
        ]);
        if ($userAdd) {
            $to  =  $userAdd['email'];
            $subject = "Ваше заведение" . $userAdd['title']. 'добавлено!';
            $message = '
            Вот ваши данные по входу в панель модератора!
            Электронная почта:' . $userAdd['email'] .'
            Пароль: ' . $password . '
            ';
            mail($to, $subject, $message);
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
            $to  =  $userAdd['email'];
            $subject = "Вы приняты как курьер" . $userAdd['name']. 'добавлено!';
            $message = '
            Вот ваши данные для входа!
            Электронная почта:' . $userAdd['email'] .'
            Пароль: ' . $password . '
            ';
            mail($to, $subject, $message);
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
    public function edit_cafe(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'img' => 'required',
            'location' => 'required',
        ], [
            'title.required' => 'Это обязательное поле!',
            'img.required' => 'Это обязательное поле!',
            'location.required' => 'Это обязательное поле!'
        ]);

        $infocafe = $request->all();
        // dd($infocafe);
        $img_info = $request->file('img')->hashName();
        $path_img = $request->file('img')->store('/public/img');

        $cafeAdd = Cafe::create([
            'title' => $infocafe['title'],
            'img' => $img_info,
            'id_categoriesCafe' => $infocafe['id_categoriesCafe'],
            'location' => $infocafe['location'],
            'id_moder' => $infocafe['moder'],
        ]);

        if ($cafeAdd) {
            return redirect()->back()->with('success', 'Вы добавили Заведение ');
        } else {
            return redirect('/')->with('error', 'Не удалось добавить заведение ');
        }
    }
    public function Edit($id)
    {
        $cafes_Edit = Cafe::find($id);
        $categoria_cafe = CategoriesCafes::where('id', '!=', $cafes_Edit['id_categoriesCafe'])->get();
        return view('moder.Edit', ['cafes_info' => $cafes_Edit, 'categoria_cafe' => $categoria_cafe]);
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
}
