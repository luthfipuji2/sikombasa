<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Translator\TranslatorController;
use App\Http\Controllers\Translator\CareerController;
use App\Http\Controllers\Translator\FindaJobController;
use App\Http\Controllers\Klien\OrderTranskripController;
use App\Http\Controllers\Klien\OrderInterpreterController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Klien\BiodataKlienController;
use App\Http\Controllers\Klien\OrderMenuController;
use App\Http\Controllers\Klien\OrderTeksController;
use App\Http\Controllers\Klien\OrderDubbingController;
use App\Http\Controllers\Klien\OrderSubtitleController;
use App\Http\Controllers\Klien\StatusInterpreterController;
use App\Http\Controllers\Klien\StatusTranskripController;
use App\Http\Controllers\Klien\StatusOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
      

        //Route Transaksi
        Route::resource('menu-pembayaran', 'App\Http\Controllers\Klien\MenuPembayaranController');
        Route::resource('status-order', 'App\Http\Controllers\Klien\StatusOrderController');
        Route::resource('review-order', 'App\Http\Controllers\Klien\ReviewOrderController');
        Route::get('/bukti/download/{id_transaksi}', 'App\Http\Controllers\Klien\MenuPembayaranController@download')->name('bukti.download');
        Route::get('/detail-order-{id_order}', 'App\Http\Controllers\Klien\MenuPembayaranController@show')->name('detail-order');
        Route::get('/invoice/download/{id_transaksi}', 'App\Http\Controllers\Klien\MenuPembayaranController@invoice')->name('pdf.download');

        //Order Interpreter
        Route::resource('order-interpreter/status', 'App\Http\Controllers\Klien\StatusInterpreterController');
        Route::get('/order-interpreter', [App\Http\Controllers\Klien\OrderInterpreterController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-interpreter', 'App\Http\Controllers\Klien\OrderInterpreterController');
        Route::put('/order-interpreter/{id_order}', 'App\Http\Controllers\Klien\OrderInterpreterController@update')->name('update_order_interpreter');
        
        //Order Transkrip 
        Route::resource('/order-transkrip/revisi', 'App\Http\Controllers\Klien\StatusTranskripController');
        Route::get('/order-transkrip/revisi', 'App\Http\Controllers\Klien\StatusTranskripController@create');
        Route::get('/order-transkrip/revisi-download/{id_order}', 'App\Http\Controllers\Klien\StatusTranskripController@downloadrevisi');
        Route::resource('order-transkrip/status', 'App\Http\Controllers\Klien\StatusTranskripController');
        Route::get('/order-transkrip', [App\Http\Controllers\Klien\OrderTranskripController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-transkrip', 'App\Http\Controllers\Klien\OrderTranskripController');
        Route::put('/order-transkrip/{id_order}', 'App\Http\Controllers\Klien\OrderTranskripController@update')->name('update_order_transkrip');
        Route::delete('/order-transkrip/{id_order}', 'App\Http\Controllers\Klien\OrderTranskripController@destroy');
        Route::post('/order-transkrip/create', [OrderTranskripController::class, 'store']);
        Route::get('/order-transkrip-download/{id_order}', 'App\Http\Controllers\Klien\StatusTranskripController@downloadhasil');
        
        //Get a Job
        Route::get('/career', [App\Http\Controllers\Klien\CareerController::class, 'index']);
        Route::post('/career', [App\Http\Controllers\Klien\CareerController::class, 'store']);
        Route::get('/document', [App\Http\Controllers\Klien\CareerController::class, 'indexDocument']);
        Route::post('/document', [App\Http\Controllers\Klien\CareerController::class, 'submitDocument']);
        Route::get('/certificate', [App\Http\Controllers\Klien\CareerController::class, 'indexCertificate']);
        Route::post('/certificate', [App\Http\Controllers\Klien\CareerController::class, 'submitCertificate'])->name('certificate');
        Route::get('/progress', [App\Http\Controllers\Klien\CareerController::class, 'indexProgress']);
        Route::get('/post-apply', [App\Http\Controllers\Klien\PostController::class, 'index']);
        Route::patch('/biodata-post', [App\Http\Controllers\Klien\PostController::class, 'updateBiodata']);
        Route::get('/document-post', [App\Http\Controllers\Klien\PostController::class, 'indexDocument']);
        Route::patch('/document-post', [App\Http\Controllers\Klien\PostController::class, 'updateDocument']);
        Route::get('/certificate-post', [App\Http\Controllers\Klien\PostController::class, 'indexCertificate']);
        Route::post('/certificate-post-create', [App\Http\Controllers\Klien\PostController::class, 'createCertificate']); 
        Route::match(['get', 'post'], '/certificate-post-update/{id_keahlian}', [App\Http\Controllers\Klien\PostController::class, 'updateCertificate']);
        Route::get('/certificate-post/{id_keahlian}', [App\Http\Controllers\Klien\PostController::class, 'deleteCertificate']); 

        
    });

    Route::middleware(['translator'])->group(function () {
        //Dashboard
        Route::get('/translator', [App\Http\Controllers\Translator\TranslatorController::class, 'index']);

        //Profile Translator
        Route::get('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'index']);
        Route::patch('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'update']); 

        Route::patch('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'update']);
        Route::get('/account-translator', [App\Http\Controllers\Translator\AccountController::class, 'index']);
        Route::patch('/account-translator/{id}', [App\Http\Controllers\Translator\AccountController::class, 'update']);
        Route::get('/activity-download/{id_fee}', [App\Http\Controllers\Translator\AccountController::class, 'downloadBukti']);
        
        //Find a Job
        Route::get('/find-a-job', [App\Http\Controllers\Translator\FindaJobController::class, 'index']);
        Route::resource('find-a-job', 'App\Http\Controllers\Translator\FindaJobController');
        Route::put('/find-a-job', 'App\Http\Controllers\Translator\FindaJobController@update');
        // Route::match(['get', 'post'],'/find-a-job/{id_order}', [App\Http\Controllers\Translator\FindaJobController::class, 'update']);

        //To Do List
        Route::get('/to-do-list', [App\Http\Controllers\Translator\ToDoController::class, 'index']);
        Route::post('/text-translator/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'text']);
        Route::get('/to-do-list-download/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'download']);
        Route::post('/tdl-upload-video/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadVideo']);
        Route::post('/tdl-upload-audio/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadAudio']);
        Route::post('/tdl-upload-dokumen/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadDokumen']);
        Route::post('/tdl-upload-offline/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadOffline']);

        //Review
        Route::get('/review', [App\Http\Controllers\Translator\ReviewController::class, 'index']);

        //Profile Certificate
        Route::post('/certificate-create', [App\Http\Controllers\Translator\ProfileController::class, 'createCertificate']); 
        Route::post('/certificate-update/{id_keahlian}', [App\Http\Controllers\Translator\ProfileController::class, 'updateCertificate']); 
        Route::get('/certificate/{id_keahlian}', [App\Http\Controllers\Translator\ProfileController::class, 'deleteCertificate']); 
    });
 
    //Route Admin
    Route::middleware(['admin'])->group(function () {

        Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin');
        Route::resource('users', 'App\Http\Controllers\Admin\UsersController');
        Route::get('/users/{user}/delete', 'App\Http\Controllers\Admin\UsersController@destroy');
        Route::get('/users/download/{id}', 'App\Http\Controllers\Admin\UsersController@download')->name('users.download');

        //Route Bank
        Route::resource('bank', 'App\Http\Controllers\Admin\BankController');
        Route::get('/bank/{bank}/delete', 'App\Http\Controllers\Admin\BankController@destroy');
        
        //Route Daftar Harga Teks
        Route::resource('daftar-harga-teks', 'App\Http\Controllers\Admin\HargaTeksController');
        Route::get('/daftar-harga-teks/{kata}/delete', 'App\Http\Controllers\Admin\HargaTeksController@destroy');

        //Route Daftar Harga Dokumen
        Route::resource('daftar-harga-dokumen', 'App\Http\Controllers\Admin\HargaDokumenController');
        Route::get('/daftar-harga-dokumen/{harga}/delete', 'App\Http\Controllers\Admin\HargaDokumenController@destroy');

        //Route Daftar Harga Subtitle
        Route::resource('daftar-harga-subtitle', 'App\Http\Controllers\Admin\HargaSubtitleController');
        Route::get('/daftar-harga-subtitle/{harga}/delete', 'App\Http\Controllers\Admin\HargaSubtitleController@destroy');

        //Route Daftar Harga Dubbing
        Route::resource('daftar-harga-dubbing', 'App\Http\Controllers\Admin\HargaDubbingController');
        Route::get('/daftar-harga-dubbing/{harga}/delete', 'App\Http\Controllers\Admin\HargaDubbingController@destroy');
        //Route Daftar Harga Dubber
        Route::post('/daftar-harga-dubbing.storeDubber', 'App\Http\Controllers\Admin\HargaDubbingController@storeDubber');
        Route::patch('daftar-harga-dubbing.updateDubber/{e}', 'App\Http\Controllers\Admin\HargaDubbingController@updateDubber')->name('update.dubber');
        Route::get('/daftar-harga-dubbing.destroyDubber/{dubber}/deleteDubber', 'App\Http\Controllers\Admin\HargaDubbingController@destroyDubber');
        
        Route::resource('daftar-harga-transkrip', 'App\Http\Controllers\Admin\HargaTranskripController');
        Route::get('/daftar-harga-transkrip/{harga}/delete', 'App\Http\Controllers\Admin\HargaTranskripController@destroy');

        //Route Daftar Harga Menu Offline
        Route::resource('daftar-harga-offline', 'App\Http\Controllers\Admin\HargaOfflineController');
        Route::get('/daftar-harga-offline/{harga}/delete', 'App\Http\Controllers\Admin\HargaOfflineController@destroy');

        //Route Daftar Harga Tambahan
        Route::resource('daftar-harga-tambahan', 'App\Http\Controllers\Admin\HargaTambahanController');
        Route::get('/daftar-harga-tambahan/{harga}/delete', 'App\Http\Controllers\Admin\HargaTambahanController@destroy');
        Route::post('/daftar-harga-tambahan.storeJenis', 'App\Http\Controllers\Admin\HargaTambahanController@storeJenis');
        Route::patch('daftar-harga-tambahan.updateJenis/{j}', 'App\Http\Controllers\Admin\HargaTambahanController@updateJenis')->name('update.jenis');
        Route::get('/daftar-harga-tambahan.destroyJenis/{jenis}/deleteJenis', 'App\Http\Controllers\Admin\HargaTambahanController@destroyJenis');

        
        //Route Daftar Admin, Klien, Translator
        Route::resource('daftar-admin', 'App\Http\Controllers\Admin\AdminController');
        Route::resource('daftar-klien', 'App\Http\Controllers\Admin\DaftarKlienController');
        Route::get('/klien/download/{id_klien}', 'App\Http\Controllers\Admin\DaftarKlienController@download')->name('klien.download');
        Route::resource('daftar-translator', 'App\Http\Controllers\Admin\DaftarTranslatorController');
        Route::get('/translator/download/{id_translator}', 'App\Http\Controllers\Admin\DaftarTranslatorController@download')->name('translator.download');

        //Route Frofile & Biodata Admin
        Route::resource('profile-admin', 'App\Http\Controllers\Admin\ProfileController');
        Route::patch('biodata-admin/{users}', 'App\Http\Controllers\Admin\ProfileController@updateBiodata');

        //Route Daftar Transaksi
        Route::resource('daftar-transaksi', 'App\Http\Controllers\Admin\DaftarTransaksiController');
        Route::get('/detail-transaksi-{id_transaksi}', 'App\Http\Controllers\Admin\DaftarTransaksiController@show')->name('detail-transaksi');
        Route::get('/bukti/download/{id_transaksi}', 'App\Http\Controllers\Admin\DaftarTransaksiController@download')->name('bukti.download');

        //Route Distribusi Fee
        Route::resource('distribusi-fee', 'App\Http\Controllers\Admin\DistribusiFeeController');
        Route::get('/fee/download/{id_fee}', 'App\Http\Controllers\Admin\DistribusiFeeController@download')->name('fee.download');

        
         //Hiring
         Route::get('/hire', [App\Http\Controllers\Admin\HiringController::class, 'index']);
         Route::get('/index-wawancara', [App\Http\Controllers\Admin\HiringController::class, 'indexWawancara']);
         Route::get('/wawancara-{id_translator}-{id_seleksi_berkas}', 'App\Http\Controllers\Admin\HiringController@showWawancara')->name('wawancara.show');
         Route::get('/{id_translator}', [App\Http\Controllers\Admin\HiringController::class, 'show'])->name('hire.show');
         Route::match(['get', 'post'],'/wawancara/{id_seleksi_berkas}', [App\Http\Controllers\Admin\HiringController::class, 'wawancara']);
         Route::match(['get', 'post'],'/berkas/{id_seleksi_berkas}', [App\Http\Controllers\Admin\HiringController::class, 'berkas']);
         Route::match(['get', 'post'], '/catatan-{id_seleksi_berkas}', [App\Http\Controllers\Admin\HiringController::class, 'catatan']);
         
        

        // Route::post('/users', [App\Http\Controllers\Admin\AdminController::class, 'storeUsers'])->name('users');
        // Route::delete('/users/{user}', [App\Http\Controllers\Admin\AdminController::class, 'destroyUsers'])->name('users');
        // Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\AdminController::class, 'editUsers'])->name('users');
        // Route::patch('/users/{user}', [App\Http\Controllers\Admin\AdminController::class, 'updateUsers'])->name('users');
    }); 

    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });

    Route::get('test', function() {
        Storage::disk('google')->put('test.txt', 'Hello World');
    dd('done');
    });

    });





Addchat::routes();
