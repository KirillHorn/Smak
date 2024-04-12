<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\CategoriesCafes;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class ModerController extends Controller
{
    public function serviceRedact_blade()
    {
        $categories = CategoriesCafes::all();
        return view('moder.serviceRedact', ["categories" => $categories]);
    }
    public function serviceEdit_blade()
    {
        $cafes = Cafe::all();
        return view('moder.serviceEdit', ['cafe' => $cafes]);
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
        $categoria_cafe = CategoriesCafes::all();
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

    // Модерская часть с кафе

    public function serviceRedactProduct_blade()
    {
        $categories = Categories::all();
        $cafes=Cafe::all();
        return view('moder.serviceRedactProduct', ["categories" => $categories, "cafe" => $cafes]);
    }

    public function edit_product(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'weight'=> 'required',
            'cost'=> 'required|numeric',
            'img' => 'required',
            'id_cafe' => 'required',
            'id_categories'=> 'required'
        ], [
            'title.required' => 'Это обязательное поле!',
            'weight.required' => 'Это обязательное поле!',
            'cost.required' => 'Это обязательное поле!',
            'cost.numeric' => 'Это поле должно состоять только из чисел',
            'img.required' => 'Это обязательное поле!',
            'id_cafe.required' => 'Это обязательное поле!',
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
            'id_cafe'=>$infoproduct['id_cafe'],
            'id_categories'=>$infoproduct['id_categories'],
           

        ]);

        if ($cafeAdd) {
            return redirect()->back()->with('success', 'Вы добавили продукт ');
        } else {
            return redirect('/')->with('error', 'Не удалось добавить продукт ');
        }

        }

        public function serviceProduct_blade()
        {
            $categories = Categories::all();
            $products=Products::all();
            return view('moder.serviceEditProduct', ["categories" => $categories, "product" => $products]);
        }

        public function serviceEditproduct_blade($id) {
            $products=Products::find($id);
            $categories =Categories::all();
            $cafes=Cafe::all();
            return view('moder.EditProduct', ["product" => $products,"categories" => $categories,"cafes"=>$cafes]);
        }

        public function updateProduct(Request $request, Products $id ) {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'weight'=> 'required|numeric',
                'cost'=> 'required|numeric',
                'img' => 'required',
                'id_cafe' => 'required',
                'id_categories'=> 'required'
            ], [
                'title.required' => 'Это обязательное поле!',
                'weight.required' => 'Это обязательное поле!',
                'weight.numeric' => 'Это поле должно состоять только из чисел',
                'cost.required' => 'Это обязательное поле!',
                'cost.numeric' => 'Это поле должно состоять только из чисел',
                'img.required' => 'Это обязательное поле!',
                'id_cafe.required' => 'Это обязательное поле!',
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
                'id_cafe' =>$infoproduct['id_cafe'],
                'id_categories'=>$infoproduct['id_categories'],
                ]);
            $id->save();
            if ($id->save()) {
                return redirect("/moder/serviceEditProduct")->with("success", "редактирование Продукта прошла успешна");
            } else {
                return redirect()->back()->with("error", "редактирование Продукта прошла успешна");
            }
          
        }

        public function delete_product(Products $id)
        {
            $id->delete();
            return redirect()->back()->with("success", "удаление прошло успешно");
    
        }
    }

