<?php

namespace App\Http\Controllers;

use App\Models\application_courier;
use App\Models\User;
use Illuminate\Http\Request;

class courierController extends Controller
{

    public function courier_blade()
    {
       return view('application_courier');
    }
   
    public function registration_courier(Request $request)
    {
       $request->validate([
          "name" => "required|alpha",
          "surname" => "required|alpha",
          "patronymic" => "required|alpha",
          "email" => "required",
          "phone" => "required|numeric",
         ],
          [
             "email.required" => "Поле обязательно для заполнения!",
             "email.email" => "Введите корректный email",
 
             "name.required" => "Поле обязательно для заполнения!",
             "name.alpha" => "Имя должно состоять только из букв!",
             "surname.required" => "Поле обязательно для заполнения!",
             "surname.alpha" => "Фамилия должно состоять только из букв!",
             "patronymic.required" => "Поле обязательно для заполнения!",
             "patronymic.alpha" => "Отчество должно состоять только из букв!",
             "phone.required" => "Поле обязательно для заполнения!",
             "phone.numeric" => "Номер только из цифр!",
          ]);
       $courierInfo = $request->all();
 
       $courierCreate= application_courier::create([
             'name' => $courierInfo['name'],
             'surname' => $courierInfo['surname'],
             'patronymic' => $courierInfo['patronymic'],
             'email' => $courierInfo['email'],
             'phone' => $courierInfo['phone'],
             'id_status' => 1,
      
          ]);
       if ( $courierCreate) {
          return redirect()->back()->with("update", "Заявка отправлена!");
       } else {
          return redirect()->back()->with("error", "Проверьте данные!");
       }
     
    }

    public function personal_courier()
    {
       return view('courier.personal_Area');
    }
    public function orders_courier()
    {
       return view('courier.orders_for_courier');
    }
}
