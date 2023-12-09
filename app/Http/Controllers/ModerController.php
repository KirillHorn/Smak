<?php

namespace App\Http\Controllers;

use App\Models\cafe;
use App\Models\categories_cafes;
use Illuminate\Http\Request;

class ModerController extends Controller
{
    public function  serviceRedact_blade() {
        $categories=categories_cafes::all();
        return view('moder.serviceRedact',["categories" => $categories]);
    }
    public function  serviceEdit_blade() {
        return view('moder.serviceEdit');
    }
    public function edit_cafe(Request $request){
        $request->validate ([
            'title'=> 'required',
            'img'=>'required',
            'location' =>'required',
        ], [
            'title.required'=>'Это обязательное поле!',
            'img.required'=>'Это обязательное поле!',
            'location.required'=>'Это обязательное поле!'
        ]);

        $infocafe= $request->all();
        // dd($infocafe);
        $img_info=$request->file('img')->hashName();
        $path_img=$request->file('img')->store('/public/img');

        $cafeAdd=cafe::create ([
            'title' => $infocafe['title'],
            'img'=> $img_info,
            'id_categoriesCafe' => $infocafe['id_categoriesCafe'],
            'location' => $infocafe['location'],

        ]);

        if ($cafeAdd) {
            return redirect()->back()->with('addproduct' , 'Вы добавили Заведение ');
              } else {
                return redirect('/')->with('error','Не удалось добавить заведение ');
              }
    }
}
