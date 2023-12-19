<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function registration_page()
   {
      return view('auth.registration');
   }
   public function registration_valid(Request $request)
   {
      $request->validate([
         "name" => "required|alpha",
         "surname" => "required|alpha",
         "patronymic" => "required|alpha",
         "email" => "required|unique:users|email",
         "phone" => "required|numeric",
         "password" => "required",
         "confirm_password" => "required|same:password"],
         [
            "email.required" => "Поле обязательно для заполнения!",
            "email.email" => "Введите корректный email",
            "email.unique" => "Данный email уже занят",
            "name.required" => "Поле обязательно для заполнения!",
            "name.alpha" => "Имя должно состоять только из букв!",
            "surname.required" => "Поле обязательно для заполнения!",
            "surname.alpha" => "Фамилия должно состоять только из букв!",
            "patronymic.required" => "Поле обязательно для заполнения!",
            "patronymic.alpha" => "Отчество должно состоять только из букв!",
            "phone.required" => "Поле обязательно для заполнения!",
            "phone.numeric" => "Номер только из цифр!",
            "password.required" => "Поле обязательно для заполнения!",
            "confirm_password.required" => "Поле обязательно для заполнения!",
         ]);
      $userInfo = $request->all();
      $userCreate = User::create([
         'name' => $userInfo['name'],
         'surname' => $userInfo['surname'],
         'patronymic' => $userInfo['patronymic'],
         'email' => $userInfo['email'],
         'phone' => $userInfo['phone'],
         "password" => Hash::make($userInfo['password']),
         'id_role' => 1,
      ]);
      if ($userCreate) {
         Auth::login($userCreate);
         return redirect("/")->with("success", "Вы зарегались!");
      } else {
         return redirect("/auth/registration")->with("error", "Вы зарегались!");
      }
   }
   public function auth_page()
   {
      return view('auth.auth');
   }
   public function auth_valid(Request $request)
   {
      $request->validate([
         "email" => "required|email",
         "password" => "required",
      ], [
         "email.required" => "Поле обязательно для заполнения!",
         "email.email" => "Введите корректный email",
         "password.required" => "Поле обязательно для заполнения!",

      ]);

      $user_auth = $request->only("email", "password");
      if (
         Auth::attempt([
            "email" => $user_auth['email'],
            "password" => $user_auth['password']
         ])
      ) {
         if (Auth::user()->id_role == 2) {
            return redirect("/moder/serviceEdit")->with("success", "Вы вошли модер!");
         } else {
            return redirect("/users/personal_Area")->with("auth", "Вы вошли!");
         }

      } else {
         return redirect()->back()->with("error", "Неверный логин или пароль");
      }
   }

   public function signout()
   { //выход из аутентификация
      Session::flush();
      Auth::logout();
      return redirect("/");
   }

   public function registration_redact(Request $request, User $id)
   {
      $request->validate([
         "name" => "required|alpha",
         "surname" => "required|alpha",
         "patronymic" => "required|alpha",
         "email" => "required",
         "phone" => "required|numeric",
         "password" => "required",
         "confirm_password" => "required|same:password"],
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
            "password.required" => "Поле обязательно для заполнения!",

            "confirm_password.required" => "Поле обязательно для заполнения!",
         ]);
      $userInfo = $request->all();

      $id->fill(
         [
            'name' => $userInfo['name'],
            'surname' => $userInfo['surname'],
            'patronymic' => $userInfo['patronymic'],
            'email' => $userInfo['email'],
            'phone' => $userInfo['phone'],
            "password" => Hash::make($userInfo['password']),
         ]);
      $id->save();
      return redirect("/users/personal_Area")->with("update", "Редактирование данных прошло успешно!");
   }
}
