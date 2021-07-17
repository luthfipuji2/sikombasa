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
        return view('pages.admin.detail_order.index', compact('order', 'dubbing', 'dokumen', 'subtitle', 'teks'));
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
        // $user=User::all();
        
        // $klien=Klien::whereNotNull('id_klien')->with('user')->select('name')->get();
        // $translator=Translator::whereNotNull('id_translator')->get();

        // $id = Auth::user()->id;
        // $bea = PendaftarPenawaran::where('id_penawaran', '=', $id);
        // $user = PendaftarPenawaran::where('id_user', '=', $id);
        // $idpen = $Penawaran->id_penawaran;
        
        $order=Order::whereNotNull('id_parameter_order_dubbing')->with('klien')->with('translator')->get();
        $klien=Klien::whereNotNull('id_klien')->with('user')->get();
        $translator=Translator::whereNotNull('id_translator')->with('user')->get();
        // $data=User::where('id', 'id')
        // return ($klien );exit();
        return view('pages.admin.detail_order.detail_dubbing', compact('order', 'klien', 'translator'));
    }
    public function downloadDubbing($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;       
        return Storage::download($path_file);
    }
}
