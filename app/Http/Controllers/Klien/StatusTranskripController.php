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
        $status1 = Transaksi::where('status_transaksi', 'Berhasil')
            ->join('order', 'transaksi.id_order', '=', 'order.id_order')
            ->whereNull('id_translator')
            ->whereNotNull('durasi_audio')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'users.id', '=', 'klien.id')
            ->join('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
            ->get();

        $status2 = Transaksi::where('status_transaksi', 'Berhasil')
            ->join('order', 'transaksi.id_order', '=', 'order.id_order')
            ->whereNotNull('id_translator')
            ->whereNull('path_file_trans')
            ->whereNotNull('durasi_audio')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'users.id', '=', 'klien.id')
            ->join('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
            ->get();

        $status3 = Transaksi::where('status_transaksi', 'Berhasil')
            ->join('order', 'transaksi.id_order', '=', 'order.id_order')
            ->whereNotNull('id_translator')
            ->whereNotNull('path_file_trans')
            ->whereNotNull('durasi_audio')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'users.id', '=', 'klien.id')
            ->join('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
            ->get();

        return view('pages.klien.order.order_transkrip.status', [
            'user'=>$user,
            'status1'=>$status1,
            'status2'=>$status2,
            'status3'=>$status3
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $user = Auth::user();

            $revisi = Revisi:: 
                rightJoin('order', 'revisi.id_order', '=', 'order.id_order')
                ->whereNull('id_revisi')
                ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
                ->join('users', 'klien.id', '=', 'users.id')
                ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                        'parameter_order.id_parameter_order')
                ->where("users.id",$user->id)
                ->where('order.tgl_order', '>=', Carbon::now()->subDay()->toDateTimeString())
                ->orderBy('order.id_order')
                ->get();

            $revisi1 = Revisi:: 
                rightJoin('order', 'revisi.id_order', '=', 'order.id_order')
                ->whereNotNull('id_revisi')
                ->whereNull('path_file_revisi')
                ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
                ->join('users', 'klien.id', '=', 'users.id')
                ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                        'parameter_order.id_parameter_order')
                ->where("users.id",$user->id)
                ->where('order.tgl_order', '>=', Carbon::now()->subDay()->toDateTimeString())
                ->orderBy('order.id_order')
                ->get();
    
            $revisi2 = Revisi:: 
                rightJoin('order', 'revisi.id_order', '=', 'order.id_order')
                ->whereNotNull('id_revisi')
                ->whereNotNull('path_file_revisi')
                ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
                ->join('users', 'klien.id', '=', 'users.id')
                ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                        'parameter_order.id_parameter_order')
                ->where("users.id",$user->id)
                ->where('order.tgl_order', '>=', Carbon::now()->subDay()->toDateTimeString())
                ->orderBy('order.id_order')
                ->get();

        return view('pages.klien.order.order_transkrip.revisi', compact('user','revisi','revisi1','revisi2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'durasi_pengerjaan_revisi'=>$request->durasi_pengerjaan_revisi,
            'tgl_order'=>Carbon::now()->timestamp
        ]);

        return redirect('/order-transkrip/status')->with('success', 'Pengajuan Revisi Anda berhasil diunggah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function downloadhasil($id_order)
    {
        $hasil = Order::find($id_order);

        $path_file_trans = $hasil->path_file_trans;
        
        return Storage::download($path_file_trans);
    }
    public function downloadrevisi($id_order)
    {
        $file= Revisi::find($id_order);

        $path_file_revisi = $file->path_file_revisi;
        
        return Storage::download($path_file_revisi);
    }
    
}
