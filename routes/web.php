<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend');
Route::get('meal/{id}', [App\Http\Controllers\FrontendController::class, 'show'])->name('meal.show');

Route::post('/order/store', [App\Http\Controllers\FrontendController::class, 'store'])->name('order.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    ['prefix' => 'admin' , 'middleware' => [ 'auth' ,'admin'] ] , function(){
//Meals
 Route::get('/meals', [App\Http\Controllers\MealController::class, 'index'])->name('meals');

Route::get('/meals/create', [App\Http\Controllers\MealController::class, 'create'])->name('meals.create');
Route::post('/meals/store', [App\Http\Controllers\MealController::class, 'store'])->name('meals.store');

Route::get('/meals/edit/{id}', [App\Http\Controllers\MealController::class, 'edit'])->name('meals.edit');
Route::PUT('/meals/update/{id}', [App\Http\Controllers\MealController::class, 'update'])->name('meals.update');

Route::get('/meals/delete/{id}', [App\Http\Controllers\MealController::class, 'destroy'])->name('meals.delete');

// order
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
Route::post('/orders/status/{id}', [App\Http\Controllers\OrderController::class, 'changeStatus'])->name('order.status');

Route::get('/customers', [App\Http\Controllers\OrderController::class, 'customers'])->name('customers');

}); // admin
