<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModerController;
use App\Http\Controllers\OrderController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/sitemap', function(){
    return view('sitemap');
});

Route::get('/product', [IndexController::class, 'product_blade'])->name('products');

Route::get('/cafe', [IndexController::class, 'cafe_blade'])->name("cafe");


Route::get('/goods/{id}', [IndexController::class, 'goods_blade'])->name('goods.r');

Route::get('/information/{id_cafe}/{categoryId?}', [IndexController::class, 'show'])->name('show.r');

Route::get('/baskets',[OrderController::class, 'getBaskets']);

Route::get('/baskets/{id}', [OrderController::class, 'baskets'])->name('basket.r');

Route::get('/{id}/baskets_delete', [OrderController::class, 'baskets_delete'])->name('delete_basket.r');

Route::post('/baskets_order', [OrderController::class, 'baskets_order']);

Route::post('/order_create', [OrderController::class, 'orderCreate']);

Route::middleware('checkRole:Клиент')->group(function () {

    Route::get('/users/personal_Area', [IndexController::class, 'personal_blade']);

    Route::get('/users/order_user/{id}', [IndexController::class, 'personal_orders']);

    Route::patch('users/personal_Area/{id}/registration_redact', [AuthController::class, 'registration_redact'])->name('r.update');
});


Route::middleware('checkRole:Модератор')->group(function () {

    Route::get('/moder/serviceRedact', [ModerController::class, 'serviceRedact_blade']);

    Route::get('/moder/serviceRedactProduct', [ModerController::class, 'serviceRedactProduct_blade']);

    Route::post('/edit_product', [ModerController::class, 'edit_product']);

    Route::get('/moder/serviceEditProduct', [ModerController::class, 'serviceProduct_blade']);

    Route::get('/moder/{id}/EditProduct', [ModerController::class, 'serviceEditproduct_blade']);

    Route::post('/moder/{id}/updateProduct', [ModerController::class, 'updateProduct'])->name('products.update');

    Route::delete('/moder/{id}/delete_product', [ModerController::class, 'delete_product'])->name('delete.product');

    Route::get('/moder/serviceEdit', [ModerController::class, 'serviceEdit_blade']);

    Route::get('/moder/{id}/Edit', [ModerController::class, 'Edit']);


    Route::post('/edit_product', [ModerController::class, 'edit_product']);

    Route::post('/moder/{id}/update_cafe', [ModerController::class, 'update_cafe'])->name('edit.update');

    Route::delete('/moder/{id}/delete_cafe', [ModerController::class, 'delete_cafe'])->name('delete.cafes');

    Route::post('/edit_cafe', [ModerController::class, 'edit_cafe']);

    Route::get('/moder/serviceRedactProduct', [ModerController::class, 'serviceRedactProduct_blade']);

});


Route::get('/order', [OrderController::class, 'OrderController']);




Route::get('/auth/registration', [AuthController::class, 'registration_page']);

Route::post('/registration_valid', [AuthController::class, 'registration_valid']);

Route::get('/auth/auth', [AuthController::class, 'auth_page']);

Route::get('/signout', [AuthController::class, 'signout']);

Route::post('/auth_valid', [AuthController::class, 'auth_valid']);





