<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Pages\DashboardController;

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

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');


    Route::namespace('admin')->middleware('admin')->group(function() {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/new-course', [AdminController::class, 'show_new_course'])->name('admin_show_new_course');
        Route::post('/admin/new-course', [AdminController::class, 'store_new_course'])->name('admin_store_new_course');
    });
});
