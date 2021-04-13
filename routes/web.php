<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

 
Route::get('/', function () {
    return view('welcome');
});
 

Auth::routes();

Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
    //Route Admin
    Route::middleware(['admin'])->group(function () {
        
        Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin');
        Route::resource('bank', 'App\Http\Controllers\Admin\BankController');
        Route::get('/bank/{bank}/delete', 'App\Http\Controllers\Admin\BankController@destroy');
        Route::resource('users', 'App\Http\Controllers\Admin\UsersController');
        Route::get('/users/{user}/delete', 'App\Http\Controllers\Admin\UsersController@destroy');

        //Route Daftar Harga
        Route::resource('daftar-harga-teks', 'App\Http\Controllers\Admin\HargaTeksController');
        Route::get('/daftar-harga-teks/{harga}/delete', 'App\Http\Controllers\Admin\HargaTeksController@destroy');
        Route::resource('daftar-harga-dokumen', 'App\Http\Controllers\Admin\HargaDokumenController');
        Route::get('/daftar-harga-dokumen/{harga}/delete', 'App\Http\Controllers\Admin\HargaDokumenController@destroy');
        

        // Route::resource('profile', 'App\Http\Controllers\Admin\ProfileController');
        // Route::resource('daftar-admin', 'App\Http\Controllers\Admin\AdminController');
        

        // Route::post('/users', [App\Http\Controllers\Admin\AdminController::class, 'storeUsers'])->name('users');
        // Route::delete('/users/{user}', [App\Http\Controllers\Admin\AdminController::class, 'destroyUsers'])->name('users');
        // Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\AdminController::class, 'editUsers'])->name('users');
        // Route::patch('/users/{user}', [App\Http\Controllers\Admin\AdminController::class, 'updateUsers'])->name('users');

    });


    // Route::middleware(['admin'])->group(function () {
    //     Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin');
    // });
    Route::middleware(['translator'])->group(function () {
        Route::get('/translator', [App\Http\Controllers\Admin\TranslatorController::class, 'index'])->name('translator');
    });
 
    Route::middleware(['klien'])->group(function () {
        Route::resource('menu-order', 'App\Http\Controllers\Admin\KlienController');
        //Route::get('/klien', [App\Http\Controllers\Admin\KlienController::class, 'dashboard'])->name('klien');
        //Route::get('/menu-order', [App\Http\Controllers\Admin\KlienController::class, 'index'])->name('menu-order');
        //Route::post('/order-teks', [App\Http\Controllers\Admin\KlienController::class, 'orderTeks'])->name('order-teks');
    });
    
 
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });
 
});


//Route Admin
//Route Admin
// Route::get('/adm', function () {
//     return view('layouts.admin.dashboard');
// });

