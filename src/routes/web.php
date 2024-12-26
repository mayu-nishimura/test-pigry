<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

// 会員登録ルート
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('registerForm');
Route::post('/register', [UserController::class, 'register'])->name('register'); 

// 初期体重登録ルート
Route::get('/register/step2', [WeightController::class, 'showInitialWeightForm'])->name('initialWeightForm');
Route::post('/register/step2', [WeightController::class, 'storeInitialWeight'])->name('storeInitialWeight');

// ログインルート・ログアウト
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 体重管理画面のルート
Route::get('/weight_logs', [WeightController::class, 'index'])->name('index');

// 体重情報更新ルート
Route::put('/weight_logs/{:weightLogId}/update', [WeightController::class, 'updateWeightLog'])->name('updateWeightLog');

// 体重情報削除ルート
Route::delete('/weight_logs/{:weightLogId}/delete', [WeightController::class, 'deleteWeightLog'])->name('deleteWeightLog');

// 目標体重設定画面のルート
Route::get('/weight_logs/goal_setting', [WeightController::class, 'showWeightTargetForm'])->name('weightTargetForm');

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');

