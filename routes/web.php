<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get("/dashboard" , [App\Http\Controllers\DashboardController::class, 'index'])->name("dashboard.index");
    Route::get('/images', [ImageController::class, 'index'])->name('images.index');
    Route::get('/images/create', [ImageController::class, 'create'])->name('images.create');
    Route::post('/images/create', [ImageController::class, 'store'])->name('images.store');
    Route::get('/images/delete/{id}', [ImageController::class, 'destroy'])->name('images.delete');
    Route::get('/profile', [UserController::class, 'create'])->name('profile.index');
    Route::post('/profile/editProfile', [UserController::class, 'editProfile'])->name('profile.editProfile');
    Route::post('/profile/editPassword', [UserController::class, 'editPassword'])->name('profile.editPassword');
    Route::get('/users', [AdminController::class, 'getUsers'])->name('users.index');
});

Auth::routes();

