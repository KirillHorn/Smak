<?php

namespace App\Http\Controllers;

use App\Models\applications;
use App\Models\Cafe;
use App\Models\CategoriesCafes;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModerController extends Controller
{
    public function application_add() {
        $categories=CategoriesCafes::all();
        return view('application',['categories' => $categories]);
    }
    // public function cafesModer() {
    //     $cafes=Cafe::where('id_moder', Auth::user()->id)->first();
    //     return view('moder.cafesModer',['cafes' => $cafes ]);
    // }
    // public function application_add_validate(Request $request) {
    //     $request->validate([
    //         "name" => "required|alpha",
    //         "surname" => "required|alpha",
    //         "patronymic" => "required|alpha",
    //         "email" => "required|unique:users|email",
    //         "phone" => "required|numeric|min:11",
    //         'document' => 'required|mimes:jpeg,jpg,pdf',
    //         'title' => 'required',
    //         'img' => 'required|mimes:jpeg,jpg,png',
    //         'location' => 'required',
    //     ],[
    //         "email.required" => "Поле обязательно для заполнения!",
    //         "email.email" => "Введите корректный email",
    //         "email.unique" => "Данный email уже занят",
    //         "name.required" => "Поле обязательно для заполнения!",
    //         "name.alpha" => "Имя должно состоять только из букв!",
    //         "surname.required" => "Поле обязательно для заполнения!",
    //         "surname.alpha" => "Фамилия должно состоять только из букв!",
    //         "patronymic.required" => "Поле обязательно для заполнения!",
    //         "patronymic.alpha" => "Отчество должно состоять только из букв!",
    //         "phone.required" => "Поле обязательно для заполнения!",
    //         "phone.numeric" => "Номер только из цифр!",
    //         'title.required' => 'Это обязательное поле!',
    //         'document.required' => 'Это обязательное поле!',
    //         'document.mimes' => 'Только форматы: jpeg,pdf!',
    //         'img.required' => 'Это обязательное поле!',
    //         'img.mimes' => 'Только форматы: jpeg,jpg,png!',
    //         'location.required' => 'Это обязательное поле!',
    //     ]);
    //     $application=$request->all();
       
    //     $img_info = $request->file('img')->hashName();
    //     $path_img = $request->file('img')->store('/public/img');

    //     $document_info = $request->file('document')->hashName();
    //     $document_path = $request->file('document')->store('/public/img');
        
    //     $applicationAdd=applications::create([
    //         'name' => $application['name'],
    //         'surname' => $application['surname'],
    //         'patronymic' => $application['patronymic'],
    //         'email' => $application['email'],
    //         'phone' => $application['phone'],
    //         'img' => $img_info,
    //         'title' => $application['title'],
    //         'document' => $document_info,
    //         'id_categoriesCafe' => $application['id_categoriesCafe'],
    //         'location' => $application['location'],
    //         'id_status' => 1,
    //     ]);
    //     if ($applicationAdd) {
    //         return redirect()->back()->with('success', 'Вы отправили заявку!');
    //     } else {
    //         return redirect('/')->with('error', 'Заявка не была отправлена ');
    //     }
    // }
 

 
    //     public function serviceProduct_blade()
    //     {
    //         $categories = Categories::all();
    //         $cafes=Cafe::where('id_moder', Auth::user()->id)->first();
    //         $products=Products::where('id_cafe', $cafes['id'])->paginate(4);
    //         return view('moder.serviceEditProduct', compact('products'), ["categories" => $categories]);
    //     }

    //     public function serviceEditproduct_blade($id) {
    //         $products=Products::find($id);
    //         $categories =Categories::where('id', '!=', $products['id_categories'])->get();
    //         $cafes=Cafe::where('id', '!=', $products['id_cafe'])->get();
    //         return view('moder.EditProduct', ["product" => $products,"categories" => $categories,"cafes"=>$cafes]);
    //     }

       

       
    }

