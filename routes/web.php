<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::get('forgot-password', [ForgetPasswordController::class, 'index'])->middleware('guest')->name('password.request');
Route::post('forgot-password', [ForgetPasswordController::class, 'sendLink'])->middleware('guest')->name('password.email');
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'reset'])->middleware('guest')->name('password.reset');
Route::post('reset-password', [ForgetPasswordController::class, 'postReset'])->middleware('guest');

Route::prefix('admin')->middleware(['auth', 'role:1'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('posts',[PostController::class,'index']);
    Route::get('posts/create',[PostController::class,'create']);
    Route::post('posts',[PostController::class,'store']);
    Route::get('posts/{id}',[PostController::class,'show']);
    Route::get('posts/{id}/edit', [PostController::class,'edit']);
    Route::put('posts/{id}',[PostController::class,'update']);
    Route::get('posts/{id}/delete',[PostController::class,'destroy']);
});

// User routes with prefix 'user'
Route::prefix('user')->middleware(['auth', 'role:2'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});
