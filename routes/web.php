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
use App\Http\Controllers\Klien\ReviewInterpreterController;
use App\Http\Controllers\Klien\StatusTranskripController;
use App\Http\Controllers\Klien\ReviewTranskripController;
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
        Route::get('/list-keranjang', 'App\Http\Controllers\Klien\OrderMenuController@listKeranjang')->name('list_keranjang');

         //order menu dokumen
         Route::get('/order-dokumen', [App\Http\Controllers\Klien\OrderDokumenController::class, 'menuOrder'])->name('menu-order');
         Route::resource('order-dokumen', 'App\Http\Controllers\Klien\OrderDokumenController');
         Route::put('/order-dokumen/{id_order}', 'App\Http\Controllers\Klien\OrderDokumenController@update')->name('update_order_dokumen');
         Route::get('/status-order-dokumen', 'App\Http\Controllers\Klien\OrderDokumenController@statusOrder')->name('status-order-dokumen');
         Route::put('/revisi-dokumen/{id_order}', 'App\Http\Controllers\Klien\OrderDokumenController@revisi')->name('revisi_order_dokumen');
         Route::put('/finish-dokumen/{id_order}', 'App\Http\Controllers\Klien\OrderDokumenController@finish')->name('finish_order_dokumen');
         Route::get('/download-dokumen-klien/{id_order}', 'App\Http\Controllers\Klien\OrderDokumenController@downloadDokumenKlien');
         Route::get('/download-dokumen-translator/{id_order}', 'App\Http\Controllers\Klien\OrderDokumenController@downloadDokumenTranslator');
         Route::get('/download-dokumen-revisi/{id_order}', 'App\Http\Controllers\Klien\OrderDokumenController@downloadDokumenRevisi');
         Route::get('/review-dokumen', 'App\Http\Controllers\Klien\OrderDokumenController@review')->name('review_order_dokumen');
         Route::put('/review-dokumen/{id_order}', 'App\Http\Controllers\Klien\OrderDokumenController@storeReview')->name('tambah_review_dokumen');
        
         //order teks
        Route::get('/order-teks', [App\Http\Controllers\Klien\OrderTeksController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-teks', 'App\Http\Controllers\Klien\OrderTeksController');
        Route::put('/order-teks/{id_order}', 'App\Http\Controllers\Klien\OrderTeksController@update')->name('update_order_teks');
        Route::get('/status-order-teks', 'App\Http\Controllers\Klien\OrderTeksController@statusOrder')->name('status-order-teks');
        Route::put('/revisi-teks/{id_order}', 'App\Http\Controllers\Klien\OrderTeksController@revisi')->name('revisi_order_teks');
        Route::put('/finish-teks/{id_order}', 'App\Http\Controllers\Klien\OrderTeksController@finish')->name('finish_order_teks');
        Route::get('/review-teks', 'App\Http\Controllers\Klien\OrderTeksController@review')->name('review_order_teks');
        Route::put('/review-teks/{id_order}', 'App\Http\Controllers\Klien\OrderTeksController@storeReview')->name('tambah_review_teks');
 
         //order dubbing
        Route::get('/order-dubbing', [App\Http\Controllers\Klien\OrderDubbingController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-dubbing', 'App\Http\Controllers\Klien\OrderDubbingController');
        Route::put('/order-dubbing/{id_order}', 'App\Http\Controllers\Klien\OrderDubbingController@update')->name('update_order_dubbing');
        Route::get('/status-order-dubbing', 'App\Http\Controllers\Klien\OrderDubbingController@statusOrder')->name('status-order-dubbing');
        Route::put('/revisi-dubbing/{id_order}', 'App\Http\Controllers\Klien\OrderDubbingController@revisi')->name('revisi_order_dubbing');
        Route::put('/finish-dubbing/{id_order}', 'App\Http\Controllers\Klien\OrderDubbingController@finish')->name('finish_order_dubbing');
        Route::get('/download-dubbing-klien/{id_order}', 'App\Http\Controllers\Klien\OrderDubbingController@downloadDubbingKlien');
        Route::get('/download-dubbing-translator/{id_order}', 'App\Http\Controllers\Klien\OrderDubbingController@downloadDubbingTranslator');
        Route::get('/download-dubbing-revisi/{id_order}', 'App\Http\Controllers\Klien\OrderDubbingController@downloadDubbingRevisi');
        Route::get('/review-dubbing', 'App\Http\Controllers\Klien\OrderDubbingController@review')->name('review_order_dubbing');
        Route::put('/review-dubbing/{id_order}', 'App\Http\Controllers\Klien\OrderDubbingController@storeReview')->name('tambah_review_dubbing');
         
         //order subtitle
        Route::get('/order-subtitle', [App\Http\Controllers\Klien\OrderSubtitleController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-subtitle', 'App\Http\Controllers\Klien\OrderSubtitleController');
        Route::put('/order-subtitle/{id_order}', 'App\Http\Controllers\Klien\OrderSubtitleController@update')->name('update_order_subtitle');
        Route::get('/status-order-subtitle', 'App\Http\Controllers\Klien\OrderSubtitleController@statusOrder')->name('status-order-subtitle');
        Route::put('/revisi-subtitle/{id_order}', 'App\Http\Controllers\Klien\OrderSubtitleController@revisi')->name('revisi_order_subtitle');
        Route::put('/finish-subtitle/{id_order}', 'App\Http\Controllers\Klien\OrderSubtitleController@finish')->name('finish_order_subtitle');
        Route::get('/download-subtitle-klien/{id_order}', 'App\Http\Controllers\Klien\OrderSubtitleController@downloadSubtitleKlien');
        Route::get('/download-subtitle-translator/{id_order}', 'App\Http\Controllers\Klien\OrderSubtitleController@downloadSubtitleTranslator');
        Route::get('/download-subtitle-revisi/{id_order}', 'App\Http\Controllers\Klien\OrderSubtitleController@downloadSubtitleRevisi');
        Route::get('/review-subtitle', 'App\Http\Controllers\Klien\OrderSubtitleController@review')->name('review_order_subtitle');
        Route::put('/review-subtitle/{id_order}', 'App\Http\Controllers\Klien\OrderSubtitleController@storeReview')->name('tambah_review_subtitle');


        //Order Interpreter
        Route::resource('order-interpreter-review', 'App\Http\Controllers\Klien\ReviewInterpreterController');
        Route::resource('order-interpreter/status', 'App\Http\Controllers\Klien\StatusInterpreterController');
        Route::get('/order-interpreter-download/{id_order}', 'App\Http\Controllers\Klien\StatusInterpreterController@downloadbukti');
        Route::put('/order-interpreter-finish/{id_order}', 'App\Http\Controllers\Klien\StatusInterpreterController@selesai')->name('order-interpreter-selesai');
        Route::get('/order-interpreter', [App\Http\Controllers\Klien\OrderInterpreterController::class, 'menuOrder'])->name('menu-order');
        Route::resource('order-interpreter', 'App\Http\Controllers\Klien\OrderInterpreterController');
        Route::put('/order-interpreter/{id_order}', 'App\Http\Controllers\Klien\OrderInterpreterController@update')->name('update_order_interpreter');

        //Order Transkrip 
        Route::resource('order-transkrip-review', 'App\Http\Controllers\Klien\ReviewTranskripController');
        Route::resource('/order-transkrip/revisi', 'App\Http\Controllers\Klien\StatusTranskripController');
        Route::get('/order-transkrip/revisi', 'App\Http\Controllers\Klien\StatusTranskripController@store');
        Route::get('/order-transkrip/detail/{id_order}', 'App\Http\Controllers\Klien\StatusTranskripController@show')->name('detail-status-order');;
        Route::get('/order-transkrip/revisi-download/{id_order}', 'App\Http\Controllers\Klien\StatusTranskripController@downloadrevisi');
        Route::resource('order-transkrip/status', 'App\Http\Controllers\Klien\StatusTranskripController');
        Route::put('/order-transkrip-finish/{id_order}', 'App\Http\Controllers\Klien\StatusTranskripController@selesai_transkrip')->name('order-transkrip-selesai');
        Route::resource('order-transkrip', 'App\Http\Controllers\Klien\OrderTranskripController');
        Route::put('/order-transkrip/{id_order}', 'App\Http\Controllers\Klien\OrderTranskripController@update')->name('update_order_transkrip');
        Route::get('/order-transkrip-download/{id_order}', 'App\Http\Controllers\Klien\StatusTranskripController@downloadhasil');
        Route::resource('status-order', 'App\Http\Controllers\Klien\StatusOrderController');
        Route::resource('review-order', 'App\Http\Controllers\Klien\ReviewOrderController');
        
        //Route Transaksi
        Route::resource('menu-pembayaran', 'App\Http\Controllers\Klien\MenuPembayaranController');
        Route::get('/bukti/download/{id_transaksi}', 'App\Http\Controllers\Klien\MenuPembayaranController@download')->name('bukti.download');
        Route::get('/detail-order-{id_order}', 'App\Http\Controllers\Klien\MenuPembayaranController@show')->name('detail-order');
        Route::get('/invoice/download/{id_transaksi}', 'App\Http\Controllers\Klien\MenuPembayaranController@invoice')->name('pdf.download');


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

        //Profile
        Route::get('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'index']);
        Route::patch('/profile-translator', [App\Http\Controllers\Translator\ProfileController::class, 'update']);
        Route::get('/account-translator', [App\Http\Controllers\Translator\AccountController::class, 'index']);
        Route::patch('/account-translator/{id}', [App\Http\Controllers\Translator\AccountController::class, 'update']);
        Route::get('/activity-download/{id_fee}', [App\Http\Controllers\Translator\AccountController::class, 'downloadBukti']);
        
        //Find a Job
        Route::resource('/find-a-job', 'App\Http\Controllers\Translator\FindaJobController');
        Route::put('/find-a-job/{id_order}', 'App\Http\Controllers\Translator\FindaJobController@update')->name('update_find_a_job');
       
        //To Do List
        Route::get('/to-do-list', [App\Http\Controllers\Translator\ToDoController::class, 'index']);
        Route::post('/text-translator/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'text']);
        Route::get('/to-do-list-download/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'download']);
        Route::post('/tdl-upload-video/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadVideo']);
        Route::post('/tdl-upload-audio/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadAudio']);
        Route::post('/tdl-upload-dokumen/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadDokumen']);
        Route::post('/tdl-upload-offline/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadOffline']);
        Route::post('/textRevisi-translator/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'textRevisi']);
        Route::get('/to-do-list-downloadRevisi/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'downloadRevisi']);
        Route::post('/tdl-upload-videoRevisi/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadVideoRevisi']);
        Route::post('/tdl-upload-audioRevisi/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadAudioRevisi']);
        Route::post('/tdl-upload-dokumenRevisi/{id_order}', [App\Http\Controllers\Translator\ToDoController::class, 'uploadDokumenRevisi']);

        //Review
        Route::get('/review-translator', [App\Http\Controllers\Translator\ReviewController::class, 'index']);

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

        Route::resource('riwayat-perubahan-harga', 'App\Http\Controllers\Admin\RiwayatHargaController');

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
        Route::patch('daftar-transaksi.return/{n}', 'App\Http\Controllers\Admin\DaftarTransaksiController@return');
        Route::get('/detail-transaksi-{id_transaksi}', 'App\Http\Controllers\Admin\DaftarTransaksiController@show')->name('detail-transaksi');
        Route::get('/bukti/download/{id_transaksi}', 'App\Http\Controllers\Admin\DaftarTransaksiController@download')->name('bukti.download');

        //Route Distribusi Fee
        Route::resource('distribusi-fee', 'App\Http\Controllers\Admin\DistribusiFeeController');
        Route::get('/fee/download/{id_fee}', 'App\Http\Controllers\Admin\DistribusiFeeController@download')->name('fee.download');

        //menu detail order
        Route::get('daftar-order', 'App\Http\Controllers\Admin\DetailOrderController@index')->name('daftar-order');
        Route::get('det-order-teks', 'App\Http\Controllers\Admin\DetailOrderController@detailTeks')->name('det-order-teks');
        
        Route::get('det-order-dokumen', 'App\Http\Controllers\Admin\DetailOrderController@detailDokumen')->name('det-order-dokumen');
        Route::get('/download-dok-klien/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenKlien');
        Route::get('/download-dok-translator/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenTranslator');
        Route::get('/download-dok-revisi/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenRevisi');
        
        Route::get('det-order-subtitle', 'App\Http\Controllers\Admin\DetailOrderController@detailSubtitle')->name('det-order-subtitle');
        Route::get('/download-sub-klien/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenKlien');
        Route::get('/download-sub-translator/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenTranslator');
        Route::get('/download-sub-revisi/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenRevisi');
        
        Route::get('det-order-dubbing', 'App\Http\Controllers\Admin\DetailOrderController@detailDubbing')->name('det-order-dubbing');
        Route::get('/download-dub-klien/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenKlien');
        Route::get('/download-sub-translator/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenTranslator');
        Route::get('/download-sub-revisi/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadDokumenRevisi');
        
        Route::get('det-order-transkrip', 'App\Http\Controllers\Admin\DetailOrderController@detailTranskrip')->name('det-order-transkrip');
        Route::get('/download-trans-klien/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadTranskripKlien');
        Route::get('/download-trans-translator/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadTranskripTranslator');
        Route::get('/download-trans-revisi/{id_order}', 'App\Http\Controllers\Admin\DetailOrderController@downloadTranskripRevisi');

        Route::get('det-order-interpreter', 'App\Http\Controllers\Admin\DetailOrderController@detailInterpreter')->name('det-order-interpreter');



        
         //Hiring
         Route::get('/hire', [App\Http\Controllers\Admin\HiringController::class, 'index']);
         Route::get('/index-wawancara', [App\Http\Controllers\Admin\HiringController::class, 'indexWawancara']);
         Route::get('/wawancara-{id_translator}-{id_seleksi_berkas}', 'App\Http\Controllers\Admin\HiringController@showWawancara')->name('wawancara.show');
         Route::get('/{id_translator}', [App\Http\Controllers\Admin\HiringController::class, 'show'])->name('hire.show');
         Route::match(['get', 'post'],'/wawancara/{id_seleksi_berkas}', [App\Http\Controllers\Admin\HiringController::class, 'wawancara']);
         Route::match(['get', 'post'],'/berkas/{id_seleksi_berkas}', [App\Http\Controllers\Admin\HiringController::class, 'berkas']);
         Route::match(['get', 'post'], '/catatan-{id_seleksi_berkas}', [App\Http\Controllers\Admin\HiringController::class, 'catatan']);
         Route::match(['get', 'post'], '/berkas-{id_translator}', [App\Http\Controllers\Admin\HiringController::class, 'catatanBerkas']);
         
        

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
