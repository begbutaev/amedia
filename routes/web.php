<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::middleware(['auth'])->group(function (){
    Route::get('/', [MainController::class, 'create'])->name('create');
    Route::post('/store', [MainController::class, 'store'])->name('store');

    Route::middleware(['is_manager'])->group(function (){
        Route::get('/manager', [MainController::class, 'showList'])->name('showList');
        Route::post('/manager/{appeal}', [MainController::class, 'answered'])->name('answered');
    });

});
