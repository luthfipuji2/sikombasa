<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Admin\Transaksi;
use App\Models\Klien\ParameterOrder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class StatusInterpreterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('pages.klien.home', compact('user'));
    }
    
    public function index()
    {
        $user = Auth::user();
        // $status1 = Transaksi::
        //     join('order', 'transaksi.id_order', '=', 'order.id_order')
        //     // ->whereNull('id_translator')
        //     ->whereNotNull('lokasi')
        //     ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        //     ->join('users', 'users.id', '=', 'klien.id')
        //     ->join('parameter_order', 'order.id_parameter_order', '=', 
        //             'parameter_order.id_parameter_order')
        //     ->where("users.id",$user->id)
        //     ->orderBy('order.id_order')
        //     ->get();

        $status1=Order::
        join('transaksi', 'transaksi.id_order', '=', 'order.id_order')
        ->whereNotNull('lokasi')
        ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        ->join('users', 'users.id', '=', 'klien.id')
        ->join('parameter_order', 'order.id_parameter_order', '=', 
                'parameter_order.id_parameter_order')
        ->where("users.id",$user->id)
        ->orderBy('order.id_order')
        ->get();

        // $status2 = Transaksi::where('status_transaksi', 'Berhasil')
        //     ->join('order', 'transaksi.id_order', '=', 'order.id_order')
        //     ->whereNotNull('id_translator')
        //     ->whereNull('path_file_trans')
        //     ->whereNotNull('lokasi')
        //     ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        //     ->join('users', 'users.id', '=', 'klien.id')
        //     ->join('parameter_order', 'order.id_parameter_order', '=', 
        //             'parameter_order.id_parameter_order')
        //     ->where("users.id",$user->id)
        //     ->orderBy('order.id_order')
        //     ->get();

        // $status3 = Transaksi::where('status_transaksi', 'Berhasil')
        //     ->join('order', 'transaksi.id_order', '=', 'order.id_order')
        //     ->whereNotNull('id_translator')
        //     ->whereNotNull('path_file_trans')
        //     ->whereNotNull('lokasi')
        //     ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        //     ->join('users', 'users.id', '=', 'klien.id')
        //     ->join('parameter_order', 'order.id_parameter_order', '=', 
        //             'parameter_order.id_parameter_order')
        //     ->where("users.id",$user->id)
        //     ->orderBy('order.id_order')
        //     ->get();

        return view('pages.klien.order.order_interpreter.status', [
            'status1'=>$status1,
            // 'status2'=>$status2,
            // 'status3'=>$status3
            ]);
    }

    public function selesai (Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('lokasi')->get();
        $order=Order::findOrFail($id_order)->select('id_order')->first();
        
        Order::where('id_order', $id_order)
        ->update([
            'status_at' => 'selesai',
            'is_status' => 'sudah bayar',
        ]);

        return redirect('/order-interpreter/status')->with('success', 'Terima Kasih Order Selesai');
    }

    public function downloadbukti($id_order)
    {
        $bukti = Order::find($id_order);

        $path_file_trans = $bukti->path_file_trans;
        
        return Storage::download($path_file_trans);
    }
}
