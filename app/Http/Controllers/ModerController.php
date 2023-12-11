<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\CategoriesCafes;
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
            return redirect()->back()->with('addproduct', 'Вы добавили Заведение ');
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
        return redirect("/moder/serviceEdit")->with("kasdksakda", "редактирование заведения прошла успешна");

    }

    public function delete_cafe(Cafe $id)
    {
        $id->delete();
        return redirect()->back()->with("destroy", "удаление прошло успешно");

    }
}
