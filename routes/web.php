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

Route::get('/auth/auth', [AuthController::class, 'auth_page']);

Route::get('/signout', [AuthController::class, 'signout']);

Route::post('/auth_valid', [AuthController::class, 'auth_valid']);

Route::get('/product', [IndexController::class, 'product_blade'])->name('products');

Route::get('/cafe', [IndexController::class, 'branch_blade'])->name("cafe");

Route::get('/search', [IndexController::class, 'search']);

Route::get('/baskets',[OrderController::class, 'getBaskets']);

Route::get('/goods/{id}', [IndexController::class, 'goods_blade'])->name('goods.r');

Route::get('/application_courier', [courierController::class, 'courier_blade']);

Route::post('/registration_courier', [courierController::class, 'registration_courier']);

Route::get('/auth/registration', [AuthController::class, 'registration_page']);

Route::post('/registration_valid', [AuthController::class, 'registration_valid']);

Route::middleware('checkRole:Клиент')->group(function () {

    Route::get('/users/personal_Area', [IndexController::class, 'personal_blade']);

    Route::get('/users/order_user/{id}', [IndexController::class, 'personal_orders']);

    Route::post('/{id}/comment_cafes', [IndexController::class, 'comment_cafes']);

    Route::get('/baskets/{id}', [OrderController::class, 'baskets'])->name('basket.r');

    Route::get('/{id}/baskets_delete', [OrderController::class, 'baskets_delete'])->name('delete_basket.r');

    Route::post('/baskets_order', [OrderController::class, 'baskets_order']);

    Route::post('/order_create', [OrderController::class, 'orderCreate']);

    Route::get('/order', [OrderController::class, 'OrderController']);

});

Route::patch('users/personal_Area/{id}/registration_redact', [AuthController::class, 'registration_redact'])->name('r.update');

Route::middleware('checkRole:Курьер')->group(function () {

    Route::get('/courier/personal_Area', [courierController::class, 'personal_courier'])->name('personal_courier');
    
    Route::get('/courier/{area_id}/orders_for_courier', [courierController::class, 'orders_courier']);
    
    Route::get('/courier/{id}/specific_order', [courierController::class, 'specific_order'])->name('courier.order');
    
    Route::get('/{id}/courier_order', [courierController::class, 'courier_order'])->name('courier');
    
    Route::get('/{id}/courier_order_completed', [courierController::class, 'courier_order_completed'])->name('courier.completed');
    
    Route::get('/orders_pdf', [courierController::class, 'orders_pdf'])->name('orders_pdf');

});

Route::middleware('checkRole:Администратор')->group(function () {

    Route::get('/admin/serviceRedact', [adminController::class, 'serviceRedact_blade']);

    Route::get('/admin/serviceEdit', [adminController::class, 'serviceEdit_blade'])->name('serviceEdit_blade');
    
    Route::get('/admin/{id}/EditCafes', [adminController::class, 'Edit']);
    
    Route::post('/admin/{id}/update_cafe', [adminController::class, 'update_cafe'])->name('edit.update');
    
    Route::delete('/admin/{id}/delete_cafe', [adminController::class, 'delete_cafe'])->name('delete.cafes');
    
    Route::post('/edit_cafe', [adminController::class, 'edit_cafe']);
    
    Route::get('/admin/EditCategories', [adminController::class, 'EditCategories']);
    
    Route::post('/categories_Add', [adminController::class, 'categories_Add']);
    
    Route::get('/admin/CategoriesEdit', [adminController::class, 'Categories']);
    
    Route::get('/admin/CategoriesEdit_redact', [adminController::class, 'Categories_one']);
    
    Route::post('/admin/{id}/update_cafe', [adminController::class, 'update_cafe'])->name('edit.update');

    Route::get('/admin/{id}/applicationsCourier', [adminController::class, 'allCourier_blade']);

    Route::post('/applicationAcceptedCourier', [adminController::class, 'applicationAcceptedCourier']);


    Route::get('/admin/serviceBrech', [adminController::class, 'add_branch_blade']); // добавить филиал

    Route::post('/add_branch', [adminController::class, 'add_branch']);

    Route::get('/admin/serviceRedactProduct', [adminController::class, 'serviceRedactProduct_blade']); // добавить продукт

    Route::delete('/admin/{id}/delete_product', [adminController::class, 'delete_product'])->name('delete.product'); //удаление продукта

    Route::post('/edit_product', [adminController::class, 'edit_product']);

    Route::get('/admin/serviceEditProduct', [adminController::class, 'serviceProduct_blade']); // все продукты

    Route::get('/admin/{id}/EditProduct', [adminController::class, 'serviceEditproduct_blade']); 

    Route::post('/admin/{id}/updateProduct', [adminController::class, 'updateProduct'])->name('products.update');

    Route::PATCH('/admin/categories_update/{id}', [adminController::class, 'categories_update'])->name('edit.update.categories');

});










