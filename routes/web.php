<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Translator\TranslatorController;
use App\Http\Controllers\Translator\CareerController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Klien\BiodataKlienController;
use App\Http\Controllers\Klien\OrderMenuController;
use App\Http\Controllers\Klien\OrderTeksController;
use App\Http\Controllers\Klien\OrderDubbingController;
use App\Http\Controllers\Klien\OrderSubtitleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

 
Route::get('/', function () {
    return view('welcome');
});
 

Auth::routes();



Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['klien'])->group(function () {
        
        //biodata
        Route::resource('profile-klien', 'App\Http\Controllers\Klien\BiodataKlienController');
        Route::patch('biodata-klien/{users}', 'App\Http\Controllers\Klien\BiodataKlienController@updateBioKlien');
        Route::get('/klien', [App\Http\Controllers\Klien\BiodataKlienController::class, 'dashboard'])->name('klien');

        Route::resource('menu-order', 'App\Http\Controllers\Klien\OrderMenuController');

        //order menu dokumen
        Route::get('/order-dokumen', [App\Http\Controllers\Klien\OrderDokumenController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-dokumen', 'App\Http\Controllers\Klien\OrderDokumenController');
        Route::put('/order-dokumen/{id_order}', 'App\Http\Controllers\Klien\OrderDokumenController@update')->name('update_order_dokumen');

        //order teks
        Route::get('/order-teks', [App\Http\Controllers\Klien\OrderTeksController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-teks', 'App\Http\Controllers\Klien\OrderTeksController');
        Route::put('/order-teks/{id_order}', 'App\Http\Controllers\Klien\OrderTeksController@update')->name('update_order_teks');

        //order dubbing
        Route::get('/order-subtitle', [App\Http\Controllers\Klien\OrderSubtitleController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-dubbing', 'App\Http\Controllers\Klien\OrderDubbingController');
        Route::put('/order-dubbing/{id_order}', 'App\Http\Controllers\Klien\OrderDubbingController@update')->name('update_order_dubbing');
        
        //order subtitle
        Route::get('/order-subtitle', [App\Http\Controllers\Klien\OrderSubtitleController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-subtitle', 'App\Http\Controllers\Klien\OrderSubtitleController');
        Route::put('/order-subtitle/{id_order}', 'App\Http\Controllers\Klien\OrderSubtitleController@update')->name('update_order_subtitle');

       //Order Interpreter
       Route::get('/order-interpreter', [App\Http\Controllers\Klien\OrderInterpreterController::class, 'menuOrder'])->name('menu-order');
       Route::resource('order-interpreter', 'App\Http\Controllers\Klien\OrderInterpreterController');
       Route::put('/order-interpreter/{id_order}', 'App\Http\Controllers\Klien\OrderInterpreterController@update')->name('update_order_interpreter');

       //Order Transkrip 
       Route::get('/order-transkrip', [App\Http\Controllers\Klien\OrderTranskripController::class, 'menuOrder'])->name('menu-order');
       Route::resource('order-transkrip', 'App\Http\Controllers\Klien\OrderTranskripController');
       Route::put('/order-transkrip/{id_order}', 'App\Http\Controllers\Klien\OrderTranskripController@update')->name('update_order_transkrip');
       Route::post('/order-transkrip/create', [OrderTranskripController::class, 'store']);

        Route::resource('menu-pembayaran', 'App\Http\Controllers\Klien\MenuPembayaranController');
        Route::get('/bukti/download/{id_transaksi}', 'App\Http\Controllers\Klien\MenuPembayaranController@download')->name('bukti.download');
        Route::get('/invoice/download/{id_transaksi}', 'App\Http\Controllers\Klien\MenuPembayaranController@invoice')->name('pdf.download');
    });

    Route::middleware(['translator'])->group(function () {
        Route::get('/translator', [App\Http\Controllers\Translator\TranslatorController::class, 'index']);
        Route::get('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'index']);
        Route::patch('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'update']);  
        Route::get('/find-a-job', [App\Http\Controllers\Translator\TranslatorController::class, 'find']);
        Route::get('/to-do-list', [App\Http\Controllers\Translator\ToDoController::class, 'index']);
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
 
    //Route Admin
    Route::middleware(['admin'])->group(function () {

        
        Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin');
        Route::resource('users', 'App\Http\Controllers\Admin\UsersController');
        Route::get('/users/{user}/delete', 'App\Http\Controllers\Admin\UsersController@destroy');
        Route::get('/users/download/{id}', 'App\Http\Controllers\Admin\UsersController@download')->name('users.download');
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
        Route::get('/translator/download/{id_translator}', 'App\Http\Controllers\Admin\DaftarTranslatorController@download')->name('translator.download');
        Route::resource('profile-admin', 'App\Http\Controllers\Admin\ProfileController');
        Route::patch('biodata-admin/{users}', 'App\Http\Controllers\Admin\ProfileController@updateBiodata');
        Route::resource('daftar-transaksi', 'App\Http\Controllers\Admin\DaftarTransaksiController');
        Route::resource('distribusi-fee', 'App\Http\Controllers\Admin\DistribusiFeeController');

        
         //Hiring
         Route::get('/hire', [App\Http\Controllers\Admin\HiringController::class, 'index']);
         Route::get('/index-wawancara', [App\Http\Controllers\Admin\HiringController::class, 'indexWawancara']);
         Route::get('/wawancara-{id_translator}', [App\Http\Controllers\Admin\HiringController::class, 'showWawancara']);
         Route::get('/{id_translator}', [App\Http\Controllers\Admin\HiringController::class, 'show'])->name('hire.show');
         Route::match(['get', 'post'],'/wawancara/{id_translator}', [App\Http\Controllers\Admin\HiringController::class, 'wawancara']);
         Route::match(['get', 'post'],'/berkas/{id_translator}', [App\Http\Controllers\Admin\HiringController::class, 'berkas']);
         Route::match(['get', 'post'], '/catatan-{id_translator}', [App\Http\Controllers\Admin\HiringController::class, 'catatan']);
         
        

        // Route::post('/users', [App\Http\Controllers\Admin\AdminController::class, 'storeUsers'])->name('users');
        // Route::delete('/users/{user}', [App\Http\Controllers\Admin\AdminController::class, 'destroyUsers'])->name('users');
        // Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\AdminController::class, 'editUsers'])->name('users');
        // Route::patch('/users/{user}', [App\Http\Controllers\Admin\AdminController::class, 'updateUsers'])->name('users');
    }); 

    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });

    });


Addchat::routes();
