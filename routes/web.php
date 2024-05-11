<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\courierController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/sitemap', function(){
    return view('sitemap');
});

Route::get('/product', [IndexController::class, 'product_blade'])->name('products');

Route::get('/cafe', [IndexController::class, 'cafe_blade'])->name("cafe");

Route::get('/search', [IndexController::class, 'search']);

Route::get('/goods/{id}', [IndexController::class, 'goods_blade'])->name('goods.r');

Route::get('/information/{id_cafe}', [IndexController::class, 'show'])->name('show.r');

Route::post('/{id}/comment_cafes', [IndexController::class, 'comment_cafes']);

Route::get('/baskets',[OrderController::class, 'getBaskets']);

Route::get('/baskets/{id}', [OrderController::class, 'baskets'])->name('basket.r');

Route::get('/{id}/baskets_delete', [OrderController::class, 'baskets_delete'])->name('delete_basket.r');

Route::get('/application', [ModerController::class, 'application_add']);

Route::post('/application_add_validate', [ModerController::class, 'application_add_validate']);

Route::get('/admin/{id}/applicationsUser', [adminController::class, 'applicationModer']);

Route::get('/{id}/applicationAccepted', [adminController::class, 'applicationAccepted']);

Route::get('/{id}/applicationDeviation', [adminController::class, 'applicationDeviation']);

Route::get('/admin/{id}/applicationsCourier', [adminController::class, 'allCourier_blade']);

Route::get('/{id}/applicationAcceptedCourier', [adminController::class, 'applicationAcceptedCourier']);

Route::get('/{id}/applicationDeviationCourier', [adminController::class, 'applicationDeviationCourier']);


Route::middleware('checkRole:Клиент')->group(function () {

    Route::get('/users/personal_Area', [IndexController::class, 'personal_blade']);

    Route::get('/users/order_user/{id}', [IndexController::class, 'personal_orders']);



    Route::post('/baskets_order', [OrderController::class, 'baskets_order']);

Route::post('/order_create', [OrderController::class, 'orderCreate']);

Route::get('/order', [OrderController::class, 'OrderController']);
});

Route::patch('users/personal_Area/{id}/registration_redact', [AuthController::class, 'registration_redact'])->name('r.update');


Route::middleware('checkRole:Модератор')->group(function () {



    Route::get('/moder/serviceRedactProduct', [ModerController::class, 'serviceRedactProduct_blade']);

    Route::post('/edit_product', [ModerController::class, 'edit_product']);

    Route::get('/moder/serviceEditProduct', [ModerController::class, 'serviceProduct_blade']);

    Route::get('/moder/cafesModer', [ModerController::class, 'cafesModer']);

    Route::get('/moder/{id}/EditProduct', [ModerController::class, 'serviceEditproduct_blade']);

    Route::post('/moder/{id}/updateProduct', [ModerController::class, 'updateProduct'])->name('products.update');

    Route::delete('/moder/{id}/delete_product', [ModerController::class, 'delete_product'])->name('delete.product');



  


    Route::post('/edit_product', [ModerController::class, 'edit_product']);

 

    Route::get('/moder/serviceRedactProduct', [ModerController::class, 'serviceRedactProduct_blade']);

});

Route::get('/admin/serviceRedact', [adminController::class, 'serviceRedact_blade']);

Route::get('/admin/serviceEdit', [adminController::class, 'serviceEdit_blade']);

Route::get('/admin/{id}/Edit', [adminController::class, 'Edit']);

Route::post('/admin/{id}/update_cafe', [adminController::class, 'update_cafe'])->name('edit.update');

Route::delete('/admin/{id}/delete_cafe', [adminController::class, 'delete_cafe'])->name('delete.cafes');

Route::post('/edit_cafe', [adminController::class, 'edit_cafe']);



Route::get('/auth/registration', [AuthController::class, 'registration_page']);

Route::post('/registration_valid', [AuthController::class, 'registration_valid']);

Route::get('/auth/auth', [AuthController::class, 'auth_page']);

Route::get('/signout', [AuthController::class, 'signout']);

Route::post('/auth_valid', [AuthController::class, 'auth_valid']);

Route::get('/application_courier', [courierController::class, 'courier_blade']);

Route::post('/registration_courier', [courierController::class, 'registration_courier']);

Route::get('/courier/personal_Area', [courierController::class, 'personal_courier']);

Route::get('/courier/orders_for_courier', [courierController::class, 'orders_courier']);

Route::get('/{id}/specific_order', [courierController::class, 'specific_order'])->name('courier.order');

Route::get('/{id}/courier_order', [courierController::class, 'courier_order'])->name('courier');

Route::get('/{id}/courier_order_completed', [courierController::class, 'courier_order_completed'])->name('courier.completed');


