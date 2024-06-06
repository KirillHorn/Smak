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
         "phone" => "required|min:11",
         "password" => "required|min:8",
         "confirm_password" => "required|same:password"],
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
         return redirect("/users/personal_Area")->with("success", "Вы зарегистрировались!!");
      } else {
         return redirect("/auth/registration")->with("error", "Ошибка регистрации!");
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
         if (Auth::user()->id_role == 1) {
            return redirect("/users/personal_Area")->with("success", "Вы вошли " . Auth::user()->name . "!");
         } elseif (Auth::user()->id_role == 4) {
            return redirect("/admin/{id}/applicationsCourier")->with("success", "Вы вошли как администратор!");
         } else {
            return redirect("/courier/personal_Area")->with("success", "Вы вошли как курьер " . Auth::user()->name . "!");
         }

      } else {
         return redirect()->back()->with("error", "Неверный логин или пароль");
      }
   }
   // Route::get('/admin/{id}/applicationsUser', [adminController::class, 'applicationModer']);

   // Route::get('/{id}/applicationAccepted', [adminController::class, 'applicationAccepted']);

   // Route::get('/{id}/applicationDeviation', [adminController::class, 'applicationDeviation']);

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
         "phone" => "required|min:11",
         "password" => "required|min:8",
         "password_old" => "required"],
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
            "phone.min" => "Не меньше 11 символов!",
            "password.required" => "Поле обязательно для заполнения!",
            "password.min" => "Новый пароль должен быть не короче 8 символов!",
            "password_old.required" => "Поле обязательно для заполнения!",
          
         ]);
      $userInfo = $request->all();
      $user = Auth::user();
      if (!Hash::check($userInfo['password_old'], $user->password)) {
         return redirect()->back()->withErrors(['password_old' => 'Старый пароль введен неправильно']);
     }
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
      if ($id->save()) {
         return redirect("/users/personal_Area")->with("update", "Редактирование данных прошло успешно!");
      } else {
         return redirect()->back()->with("error_signIn", "Проверьте данные!");
      }
   }
}
