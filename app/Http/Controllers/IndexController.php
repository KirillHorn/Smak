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
//     public function boot(): void
// {
//     Blade::component('header-alert', Alert::class);
// }
}
