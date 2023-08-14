<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::prefix('memos')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\MemoController::class, 'index'])->name('memos');
    Route::post('/add', [App\Http\Controllers\MemoController::class, 'store'])->name('memo');
    Route::post('/delete/{id}', [App\Http\Controllers\MemoController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{id}', [App\Http\Controllers\MemoController::class, 'edit']);
    Route::post('/edit/{id}', [App\Http\Controllers\MemoController::class, 'edit']);
});

Route::get('/logout', [App\Http\Controller\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

