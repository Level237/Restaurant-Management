<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Admin\AdminController;
Use App\Http\Controllers\Admin\CategoryController;
Use App\Http\Controllers\Admin\MenuController;
Use App\Http\Controllers\Admin\TableController;
Use App\Http\Controllers\Admin\ReservationController;
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
