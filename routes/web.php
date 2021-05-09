<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Translator\TranslatorController;
use App\Http\Controllers\Translator\CareerController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Klien\BiodataKlienController;
use App\Http\Controllers\Klien\OrderMenuController;
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
        Route::resource('users', 'App\Http\Controllers\Admin\UsersController');
        Route::get('/users/{user}/delete', 'App\Http\Controllers\Admin\UsersController@destroy');
        Route::get('/users/download/{id}', 'App\Http\Controllers\Admin\UsersController@download')->name('users.download');;
        Route::resource('bank', 'App\Http\Controllers\Admin\BankController');
        Route::get('/bank/{bank}/delete', 'App\Http\Controllers\Admin\BankController@destroy');
        
        //Route Daftar Harga
        Route::resource('daftar-harga-teks', 'App\Http\Controllers\Admin\HargaTeksController');
        Route::get('/daftar-harga-teks/{harga}/delete', 'App\Http\Controllers\Admin\HargaTeksController@destroy');
        Route::resource('daftar-harga-dokumen', 'App\Http\Controllers\Admin\HargaDokumenController');
        Route::get('/daftar-harga-dokumen/{harga}/delete', 'App\Http\Controllers\Admin\HargaDokumenController@destroy');
        Route::resource('daftar-harga-subtitle', 'App\Http\Controllers\Admin\HargaSubtitleController');
        Route::get('/daftar-harga-subtitle/{harga}/delete', 'App\Http\Controllers\Admin\HargaSubtitleController@destroy');
        Route::resource('daftar-harga-dubbing', 'App\Http\Controllers\Admin\HargaDubbingController');
        Route::get('/daftar-harga-dubbing/{harga}/delete', 'App\Http\Controllers\Admin\HargaDubbingController@destroy');
        Route::resource('daftar-harga-transkrip', 'App\Http\Controllers\Admin\HargaTranskripController');
        Route::get('/daftar-harga-transkrip/{harga}/delete', 'App\Http\Controllers\Admin\HargaTranskripController@destroy');
        Route::resource('daftar-harga-interpreter', 'App\Http\Controllers\Admin\HargaInterpreterController');
        Route::get('/daftar-harga-interpreter/{harga}/delete', 'App\Http\Controllers\Admin\HargaInterpreterController@destroy');
        
        Route::resource('daftar-admin', 'App\Http\Controllers\Admin\AdminController');
        Route::resource('daftar-klien', 'App\Http\Controllers\Admin\DaftarKlienController');
        Route::resource('daftar-translator', 'App\Http\Controllers\Admin\DaftarTranslatorController');
        Route::resource('profile-admin', 'App\Http\Controllers\Admin\ProfileController');
        Route::patch('biodata-admin/{users}', 'App\Http\Controllers\Admin\ProfileController@updateBiodata');
        Route::resource('daftar-transaksi', 'App\Http\Controllers\Admin\DaftarTransaksiController');
        
        

        // Route::post('/users', [App\Http\Controllers\Admin\AdminController::class, 'storeUsers'])->name('users');
        // Route::delete('/users/{user}', [App\Http\Controllers\Admin\AdminController::class, 'destroyUsers'])->name('users');
        // Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\AdminController::class, 'editUsers'])->name('users');
        // Route::patch('/users/{user}', [App\Http\Controllers\Admin\AdminController::class, 'updateUsers'])->name('users');

    });

    Route::middleware(['translator'])->group(function () {
        Route::get('/translator', [App\Http\Controllers\Translator\TranslatorController::class, 'index']);
        Route::get('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'index']);
        Route::patch('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'update']);  
        Route::get('/find-a-job', [App\Http\Controllers\Translator\TranslatorController::class, 'find']);
        Route::get('/to-do-list', [App\Http\Controllers\Translator\TranslatorController::class, 'todo']);
        Route::get('/review', [App\Http\Controllers\Translator\TranslatorController::class, 'review']);
        Route::get('/career', [App\Http\Controllers\Translator\CareerController::class, 'index']);
        Route::post('/career', [App\Http\Controllers\Translator\CareerController::class, 'store']);
        Route::get('/document', [App\Http\Controllers\Translator\CareerController::class, 'indexDocument']);
        Route::post('/document', [App\Http\Controllers\Translator\CareerController::class, 'submitDocument']);
        Route::get('/certificate', [App\Http\Controllers\Translator\CareerController::class, 'indexCertificate']);
        Route::post('/certificate', [App\Http\Controllers\Translator\CareerController::class, 'submitCertificate'])->name('certificate');
        Route::post('/certificate-create', [App\Http\Controllers\Translator\ProfileController::class, 'createCertificate']); 
        Route::post('/certificate-update/{id_keahlian}', [App\Http\Controllers\Translator\ProfileController::class, 'updateCertificate']); 
        Route::get('/certificate/{id_keahlian}', [App\Http\Controllers\Translator\ProfileController::class, 'deleteCertificate']); 
        Route::get('/progress', [App\Http\Controllers\Translator\CareerController::class, 'indexProgress']);
    });
 
    Route::middleware(['klien'])->group(function () {
        Route::get('/klien', [App\Http\Controllers\Klien\BiodataKlienController::class, 'dashboard'])->name('klien');
        Route::resource('profile', 'App\Http\Controllers\Klien\BiodataKlienController');
        Route::patch('/biodata/{user}','App\Http\Controllers\Klien\BiodataKlienController@updateBioKlien'); 
        Route::resource('menu-order', 'App\Http\Controllers\Klien\OrderMenuController');

        //order menu dokumen
        Route::get('/order-dokumen', [App\Http\Controllers\Klien\OrderMenuController::class, 'indexDokumen'])->name('order-dokumen');
        Route::post('/order-dokumen', [App\Http\Controllers\Klien\OrderMenuController::class, 'submitDokumen'])->name('order-dokumen');
        Route::get('/show-order-dokumen', [App\Http\Controllers\Klien\OrderMenuController::class, 'showOrderDokumen'])->name('show-order-dokumen');

        
        Route::resource('order-teks', 'App\Http\Controllers\Klien\OrderTeksController');
        
        Route::resource('menu-pembayaran', 'App\Http\Controllers\Klien\MenuPembayaranController');
        Route::resource('order-interpreter', 'App\Http\Controllers\Klien\OrderInterpreterController');
        Route::resource('order-transkrip', 'App\Http\Controllers\Klien\OrderTranskripController');


    });
    
 
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });
 
});