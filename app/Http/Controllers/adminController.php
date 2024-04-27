<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cafe;
use App\Models\CategoriesCafes;
use App\Models\Categories;
class adminController extends Controller
{

    public function serviceRedact_blade()
    {
        $categories = CategoriesCafes::all();
        return view('moder.serviceRedact', ["categories" => $categories]);
    }
    public function serviceEdit_blade()
    {
        $cafe = Cafe::paginate(4);
        return view('moder.serviceEdit', compact('cafe'));
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
            'id_morder' => Auth::id(),

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
