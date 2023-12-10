<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModerController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::get('/product' , [IndexController::class, 'product_blade']);

Route::get('/cafe' , [IndexController::class, 'cafe_blade']);

Route::get('/goods' , [IndexController::class, 'goods_blade']);

Route::get('/information/{id_cafe}' , [IndexController::class, 'show'])->name('show.r');

// Route::get('/information' , function () { return view('information');});

// Route::get('/information' , [IndexController::class, 'show']);

Route::get('/users/personal_Area' , [IndexController::class, 'personal_blade']);

Route::get('/order',[OrderController::class, 'OrderController' ] );

Route::get('/courier/personal_Area' , [IndexController::class, 'personal_courier_blade']);

Route::get('/moder/serviceRedact' , [ModerController::class, 'serviceRedact_blade']);

Route::get('/moder/serviceEdit' , [ModerController::class, 'serviceEdit_blade']);

Route::get('/auth/registration', [AuthController::class, 'registration_page']);

Route::post('/registration_valid', [AuthController::class,'registration_valid']);

Route::get('/auth/auth', [AuthController::class, 'auth_page']);

Route::get('/signout', [AuthController::class, 'signout']);

Route::post('/auth_valid', [AuthController::class,'auth_valid']);

Route::patch('users/personal_Area/{id}/registration_redact', [AuthController::class,'registration_redact'])->name('r.update');

Route::post('/edit_cafe', [ModerController::class,'edit_cafe']);

