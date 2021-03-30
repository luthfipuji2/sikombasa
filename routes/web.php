<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
        Route::middleware(['admin'])->group(function () {
            Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
        });

        Route::middleware(['translator'])->group(function () {
            Route::get('/translator', [App\Http\Controllers\Translator\TranslatorController::class, 'index'])->name('translator');
        });
    
        Route::middleware(['klien'])->group(function () {
            Route::get('/klien', [App\Http\Controllers\Klien\KlienController::class, 'index'])->name('klien');
        });
        
    
        Route::get('/logout', function() {
            Auth::logout();
            redirect('/');
        });
    
});

Route::get('{path}', [App\Http\Controllers\HomeController::class, 'index'])->where('path', '([A-z\d\-/_.]+)?' );