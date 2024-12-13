<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'viewLogin'])->name('login.view');
    Route::post('/', [LoginController::class, 'checkLogin'])->name('login.check');

    Route::get('/register', [RegisterController::class, 'viewRegistration'])->name('register.view');
    Route::post('/register', [RegisterController::class, 'storeRegister'])->name('register.store');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'viewForgotPassword'])->name('forgot-password.view');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'updateResetPassword'])->name('reset-password.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'checkLogout'])->name('logout.check');

    Route::get('dashboard', [TodoController::class,'index'])->name('dashboard');
    Route::get('create', [TodoController::class,'create'])->name('create');
    Route::get('edit', [TodoController::class, 'edit']);
    Route::post('update', [TodoController::class, 'update']);
    Route::post('store', [TodoController::class, 'store'])->name('store');
    Route::get('delete', [TodoController::class, 'delete']);


    Route::get('details', [TodoController::class, 'details']);



});