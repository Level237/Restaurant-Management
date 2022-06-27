<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Admin\AdminController;
Use App\Http\Controllers\Admin\CategoryController;
Use App\Http\Controllers\Admin\MenuController;
Use App\Http\Controllers\Admin\TableController;
Use App\Http\Controllers\Admin\ReservationController;
Use App\Http\Controllers\frontend\CategoryController as FrontendCategoryController;
Use App\Http\Controllers\frontend\MenuController as FrontendMenuController;
Use App\Http\Controllers\frontend\reservationController as FrontendReservationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories',[FrontendCategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{category}',[FrontendCategoryController::class,'show'])->name('categories.show');
Route::get('/menus',[FrontendMenuController::class,'index'])->name('menus.index');
Route::get('/reservations/stepOne',[FrontendReservationController::class,'stepOne'])->name('reservation.stepOne');
Route::get('/reservations/stepTwo',[FrontendReservationController::class,'steptwo'])->name('reservation.stepTwo');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
});
require __DIR__.'/auth.php';
