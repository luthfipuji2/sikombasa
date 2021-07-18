<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klien\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Klien\Klien;
use App\Models\User;
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

    public function detailTeks(){
        $order=Order::whereNotNull('id_parameter_order_teks')->get();
        return view('pages.admin.detail_order.detail_teks', compact('order'));
    }

    public function detailDokumen(){
        $order=Order::whereNotNull('id_parameter_order_dokumen')->get();
        // $path_template = Storage::disk('public/data_file/file_order_dokumen')->get();
        return view('pages.admin.detail_order.detail_dokumen', compact('order'));
    }
    public function downloadDokumen($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file; 
        return Storage::download($path_file);
    }

    public function detailSubtitle(){
        $order=Order::whereNotNull('id_parameter_order_subtitle')->get();
        return view('pages.admin.detail_order.detail_subtitle', compact('order'));
    }
    public function downloadSubtitle($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;       
        return Storage::download($path_file);
    }

    public function detailDubbing(){        
        $order=Order::whereNotNull('id_parameter_order_dubbing')->with('klien')->with('translator')->get();
        // $klien=Klien::whereNotNull('id_klien')->with('user')->get();
        // $translator=Translator::whereNotNull('id_translator')->with('user')->get();
        // $data=User::where('id', 'id')
        // return ($klien );exit();
        return view('pages.admin.detail_order.detail_dubbing', compact('order'));
    }
    public function downloadDubbing($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;       
        return Storage::download($path_file);
    }

    public function detailTranskrip(){
        $order=Order::whereNotNull('durasi_audio')->get();
        return view('pages.admin.detail_order.detail_transkrip', compact('order'));
    }
    public function downloadTranskrip($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;       
        return Storage::download($path_file);
    }

    public function detailInterpreter(){
        $order=Order::whereNotNull('longitude')->get();
        return view('pages.admin.detail_order.detail_interpreter', compact('order'));
    }
}
