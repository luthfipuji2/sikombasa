<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klien\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Klien\Klien;
use App\Models\User;
use App\Models\Klien\Revisi;
use App\Models\Translator;

class DetailOrderController extends Controller
{
    public function index(){
        // return "hello";
        // exit();
        $result = 0;
        $order = Order::all();
        $dubbing = Order::whereNotNull('id_parameter_order_dubbing')->count();
        $dokumen = Order::whereNotNull('id_parameter_order_dokumen')->count();
        $subtitle = Order::whereNotNull('id_parameter_order_subtitle')->count();
        $teks = Order::whereNotNull('id_parameter_order_teks')->count();
        $transkrip = Order::whereNotNull('durasi_audio')->count();
        $interpreter = Order::whereNotNull('longitude')->count();
        return view('pages.admin.detail_order.index', compact('order', 'dubbing', 'dokumen', 'subtitle', 'teks', 'transkrip', 'interpreter'));
    }

    // ------------------------------- Order Teks -----------------------------------
    public function detailTeks(){
        $order=Order::whereNotNull('id_parameter_order_teks')->get();
        return view('pages.admin.detail_order.detail_teks', compact('order'));
    }

    // ------------------------------- Order Dokumen -----------------------------------
    public function detailDokumen(){
        $order=Order::whereNotNull('id_parameter_order_dokumen')->get();
        // $path_template = Storage::disk('public/data_file/file_order_dokumen')->get();
        return view('pages.admin.detail_order.detail_dokumen', compact('order'));
    }

    public function downloadDokumenKlien($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;       
        return Storage::download($path_file);
        // return ($path_file);exit();
    }

    public function downloadDokumenTranslator($id_order)
    {
        $order = Order::find($id_order);
        $path_file_trans = $order->path_file_trans;       
        return Storage::download($path_file_trans);
    }

    public function downloadDokumenRevisi($id_order)
    {   
        $order=Order::find($id_order);
        $rev=Revisi::where('id_order', $order->id_order)->get();

        //keluarin array
        $result = $rev[0]->path_file_revisi;
        // return ($result);exit();
        return Storage::download($result);
    }

    // ------------------------------- Order Subtitle -----------------------------------
    public function detailSubtitle(){
        $order=Order::whereNotNull('id_parameter_order_subtitle')->get();
        return view('pages.admin.detail_order.detail_subtitle', compact('order'));
    }
    public function downloadSubtitleKlien($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;       
        return Storage::download($path_file);
        // return ($path_file);exit();
    }

    public function downloadSubtitleTranslator($id_order)
    {
        $order = Order::find($id_order);
        $path_file_trans = $order->path_file_trans;       
        return Storage::download($path_file_trans);
    }

    public function downloadSubtitleRevisi($id_order)
    {   
        $order=Order::find($id_order);
        $rev=Revisi::where('id_order', $order->id_order)->get();

        //keluarin array
        $result = $rev[0]->path_file_revisi;
        // return ($result);exit();
        return Storage::download($result);
    }

    // ------------------------------- Order Dubbing -----------------------------------
    public function detailDubbing(){        
        $order=Order::whereNotNull('id_parameter_order_dubbing')->with('klien')->with('translator')->get();
        return view('pages.admin.detail_order.detail_dubbing', compact('order'));
    }
    public function downloadDubbingKlien($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;       
        return Storage::download($path_file);
        // return ($path_file);exit();
    }

    public function downloadDubbingTranslator($id_order)
    {
        $order = Order::find($id_order);
        $path_file_trans = $order->path_file_trans;       
        return Storage::download($path_file_trans);
    }

    public function downloadDubbingRevisi($id_order)
    {   
        $order=Order::find($id_order);
        $rev=Revisi::where('id_order', $order->id_order)->get();

        //keluarin array
        $result = $rev[0]->path_file_revisi;
        // return ($result);exit();
        return Storage::download($result);
    }

    // ------------------------------- Order Transkrip -----------------------------------
    public function detailTranskrip(){
        $order=Order::whereNotNull('durasi_audio')->get();
        return view('pages.admin.detail_order.detail_transkrip', compact('order'));
    }
    public function downloadTranskripKlien($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;       
        return Storage::download($path_file);
        // return ($path_file);exit();
    }

    public function downloadTranskripTranslator($id_order)
    {
        $order = Order::find($id_order);
        $path_file_trans = $order->path_file_trans;       
        return Storage::download($path_file_trans);
    }

    public function downloadTranskripRevisi($id_order)
    {   
        $order=Order::find($id_order);
        $rev=Revisi::where('id_order', $order->id_order)->get();

        //keluarin array
        $result = $rev[0]->path_file_revisi;
        // return ($result);exit();
        return Storage::download($result);
    }

    // ------------------------------- Order Interpreter -----------------------------------
    public function detailInterpreter(){
        $order=Order::whereNotNull('longitude')->get();
        return view('pages.admin.detail_order.detail_interpreter', compact('order'));
    }
}
