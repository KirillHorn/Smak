<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Alert;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index () {
        return view('index');
    }
    public function product_blade () {
        return view ('product');
    }
    public function cafe_blade () {
        return view ('cafe');
    }
    
    public function goods_blade () {
        return view ('goods');
    }

    public function cafe_bl_blade () {
        return view ('cafe_bl');
    }

    public function personal_blade () {
        return view ('users.personal_Area');
    }
    public function personal_courier_blade () {
        return view ('courier.personal_Area');
    }
//     public function boot(): void
// {
//     Blade::component('header-alert', Alert::class);
// }
}
