<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::get('/?tab=mylist', [ItemController::class, 'mylist']);
    Route::post('/purchase/{exhibition_id}', [PurchaseController::class, 'purchase']);
    Route::post('/purchase/address/{exhibition_id}', [AddressController::class, 'update']);
    Route::get('/sell', [ExhibitionController::class, 'create'])->name('sell.create'); // 商品出品フォームの表示
    Route::post('/sell', [ExhibitionController::class, 'add'])->name('sell.add'); // 商品の保存
    Route::get('/mypage', [ProfileController::class, 'show'])->name('mypage');
    Route::post('/mypage/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/mypage?tab=buy', [ProfileController::class, 'purchased']);
    Route::get('/mypage?tab=sell', [ProfileController::class, 'sold']);
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/item/{exhibition_id}', [ItemController::class, 'show']);


