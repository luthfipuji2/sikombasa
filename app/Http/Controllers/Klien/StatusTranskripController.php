<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\ParameterOrder;
use App\Models\Klien\Revisi;
use App\Models\Admin\Transaksi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class StatusTranskripController extends Controller
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

            $status_transkrip=Order::
            join('transaksi', 'transaksi.id_order', '=', 'order.id_order')
            ->whereNotNull('durasi_audio')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'users.id', '=', 'klien.id')
            ->join('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
            ->where("users.id",$user->id)
            ->orderBy('order.id_order')
            ->get();
   
        return view('pages.klien.order.order_transkrip.status', [
            'user'=>$user,
            'status_transkrip'=>$status_transkrip
            ]);
    }

    public function store(Request $request, Revisi $id_revisi)
    {
        $this->validate($request,[
            'id_order' => 'required',
            'pesan_revisi' => 'required',
            'durasi_pengerjaan_revisi'=>'required'
        ]);

        Revisi::create([
            'id_order' => $request->id_order,
            'pesan_revisi' => $request->pesan_revisi,
            'durasi_pengerjaan_revisi'=>$request->durasi_pengerjaan_revisi
        ]);

        return redirect('/order-transkrip/status')->with('success', 'Pengajuan Revisi Anda berhasil diunggah');
    }

    public function downloadhasil($id_order)
    {
        $hasil = Order::find($id_order);

        $path_file_trans = $hasil->path_file_trans;
        
        return Storage::download($path_file_trans);
    }
    public function downloadrevisi($id_order)
    {
        $user = Auth::user();
        $order=Order::findOrFail($id_order);
        $file = Revisi::
        rightJoin('order', 'revisi.id_order', '=', 'order.id_order')
        ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        ->join('users', 'klien.id', '=', 'users.id')
        ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                'parameter_order.id_parameter_order')
        ->where("users.id",$user->id)
        ->where("order.id_order",$order->id_order)
        ->first();

        $path_file_revisi = $file->path_file_revisi;
        
        return Storage::download($path_file_revisi);
    }
    
    public function selesai_transkrip (Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('durasi_audio')->get();
        $order=Order::findOrFail($id_order)->select('id_order')->first();
        
        Order::where('id_order', $id_order)
        ->update([
            'status_at' => 'selesai',
            'is_status' => 'sudah bayar',
        ]);

        return redirect('/order-transkrip/status')->with('success', 'Terima Kasih Order Selesai');
    }
}
