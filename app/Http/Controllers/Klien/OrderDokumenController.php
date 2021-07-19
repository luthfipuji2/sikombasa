<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Admin\ParameterJenisLayanan;
use App\Models\Admin\ParameterJenisTeks;
use App\Models\Admin\ParameterOrderDokumen;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\Revisi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderDokumenController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        return view('pages.klien.home', compact('user'));
    }
    
    public function menuOrder()
    {
        $menu=Order::all();
        return view('pages.klien.menu_order', compact('menu'));
    }

    public function index(){
        $menu=Order::all();
        $jenis_layanan=ParameterJenisLayanan::all();
        $jenis_teks=ParameterJenisTeks::all();
        return view('pages.klien.order.order_dokumen.index', compact('menu', 'jenis_layanan', 'jenis_teks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order_dokumen)
    {
        $jenis_layanan=ParameterJenisLayanan::all();
        $jenis_teks = ParameterJenisTeks::all();
        $tgl_order=Carbon::now();
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $harga_dokumen=$request->jumlah_halaman;

        
        // return ($harga_dokumen);
        // exit();

        if($harga_dokumen >= 1 && $harga_dokumen <= 10)
        {
            // $harga=ParameterOrderTeks::select('id_parameter_order_teks')->first();
            $hasil = "1";
        }elseif($harga_dokumen >= 11 && $harga_dokumen <= 20){
            $hasil = "2";
        }elseif($harga_dokumen >= 21 && $harga_dokumen <= 30){
            $hasil = "3";
        }elseif($harga_dokumen >= 31 && $harga_dokumen <= 40){
            $hasil = "4";
        }elseif($harga_dokumen >= 41 && $harga_dokumen <= 50){
            $hasil = "5";
        }elseif($harga_dokumen >= 51 && $harga_dokumen <= 60){
            $hasil = "6";
        }elseif($harga_dokumen >= 61 && $harga_dokumen <= 70){
            $hasil = "7";
        }elseif($harga_dokumen >= 71 && $harga_dokumen <= 80){
            $hasil = "8";
        }elseif($harga_dokumen >= 81 && $harga_dokumen <= 90){
            $hasil = "9";
        }elseif($harga_dokumen >= 91 && $harga_dokumen <= 100){
            $hasil = "10";
        }


        if($request->hasFile('path_file')){
            $validate_data = $request->validate([
                'id_parameter_jenis_layanan'=>'required',
                'id_parameter_jenis_teks'=>'required',
                'durasi_pengerjaan'=>'required',
                'nama_dokumen'=>'required',
                'path_file'=>'required|file|max:500000',
                'jumlah_halaman'=>'required',
            ]);

            $id_parameter_jenis_layanan = $validate_data['id_parameter_jenis_layanan'];
            $id_parameter_jenis_teks = $validate_data['id_parameter_jenis_teks'];
            $durasi = $validate_data['durasi_pengerjaan'];
            $jumlah_halaman = $validate_data['jumlah_halaman'];
            $ext_template = $validate_data['path_file']->extension();
            $size_template = $validate_data['path_file']->getSize();
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();
            $nama_dokumen = $validate_data['nama_dokumen'] . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_file/file_order_dokumen', $request->file('path_file'), $nama_dokumen);

            $order_dokumen=Order::create([
                'id_klien'=>$klien->id_klien,
                'id_parameter_jenis_layanan'=>$id_parameter_jenis_layanan,
                'id_parameter_jenis_teks'=>$id_parameter_jenis_teks,
                'id_parameter_order_dokumen'=>$hasil,
                'durasi_pengerjaan'=>$durasi,
                'nama_dokumen'=>$nama_dokumen,
                'path_file'=>$path_template,
                'ekstensi'=>$ext_template,
                'size'=>$size_template,
                'jumlah_halaman'=>$jumlah_halaman,
                'tgl_order'=>Carbon::now()->timestamp,
                'is_status'=>'belum dibayar',
                'menu'=>'Dokumen',
            ]);

            $id_order=$order_dokumen->id_order;
            return redirect(route('order-dokumen.show', $id_order))->with('success', 'Berhasil di upload!');
        }

        } 
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_order)
    {
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $jenis_layanan=ParameterJenisLayanan::all();
        $jenis_teks=ParameterJenisTeks::all();
        $order=Order::findOrFail($id_order);

        // return ($order);
        if($order != null){
            $j_layanan = ParameterJenisLayanan::where('id_parameter_jenis_layanan', $order->id_parameter_jenis_layanan)->first();
            $j_teks = ParameterJenisTeks::where('id_parameter_jenis_teks', $order->id_parameter_jenis_teks)->first();
            $jml_halaman = ParameterOrderDokumen::where('id_parameter_order_dokumen', $order->id_parameter_order_dokumen)->first();
    
            if($j_layanan != null){
                $result_layanan = [
                    'harga' => $j_layanan->harga
                ];
            }
            if($j_teks != null){
                $result_teks = [
                    'harga' => $j_teks->harga
                ];
            }
            if($jml_halaman != null){
                $result_halaman = [
                    'harga' => $jml_halaman->harga
                ];
            }

            $result[] = [
                'j_layanan' => $result_layanan,
                'j_teks'=>$result_teks,
                'jml_halaman'=>$result_halaman
            ];
        }

        $harga = ($result_layanan['harga']) + ($result_teks['harga']) + ($result_halaman['harga']);
        
        $save_harga = Order::where('id_order', $order->id_order)
                            ->update([
                                'harga'=>$harga
                            ]);
        // return ($save_harga);
        //return ($klien);
        return view('pages.klien.order.order_dokumen.show', compact('order', 'user', 'klien', 'jenis_layanan', 'jenis_teks', 'save_harga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function edit($id)
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
    public function update(Request $request, $id_order)
    {
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'id_parameter_jenis_teks' => 'required',
            'durasi_pengerjaan' => 'required',
            'nama_dokumen' => 'required',
            'path_file' => 'required',
            'jumlah_halaman' => 'required',
        ]);
        
        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'id_parameter_jenis_teks'=>$request->id_parameter_jenis_teks,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'nama_dokumen'=>$request->nama_dokumen,
                'path_file'=>$request->path_file,
                'jumlah_halaman'=>$request->jumlah_halaman,
            ]);
        //return($order);
        //dd($order);

        return redirect(route('order-dokumen.show', $id_order))->with('success', 'Berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id_order)
    {
        Order::destroy($id_order);
        return redirect(route('order-dokumen.index'))->with('success','Order berhasil di hapus');
    }

    function statusOrder(){
        $user=Auth::user();

        // $transaksi=Transaksi::where('status_transaksi', 'Berhasil')->orWhere('status_transaksi', 'Pending')->orWhere('status_transaksi', 'Gagal')
        //                     ->join('order', 'transaksi.id_order', '=', 'order.id_order')
        //                     ->get();
        $status=Order::whereNotNull('id_parameter_order_dokumen')
                    ->join('transaksi', 'order.id_order', '=', 'transaksi.id_order')
                    ->get();
        
        // return ($status);exit();
        Order::where('id_order', $status)
            ->update([
                'status_at'=> 'selesai'
            ]);

        // return ($status);exit();
        return view ('pages.klien.order.order_dokumen.status_order', compact('user', 'status'));
        
    }

    public function revisi(Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('id_parameter_order_dokumen')->get();
        $revisi = Revisi::create([
            'id_order'=>$request->id_order,
            'path_file_revisi'=>$request->path_file_revisi,
            'pesan_revisi'=>$request->pesan_revisi,
            'tgl_pengajuan_revisi'=>Carbon::now(),
            'durasi_pengerjaan_revisi'=>$request->durasi_pengerjaan_revisi,
        ]);
        // return ($revisi);exit();
        return redirect(route('status-order-dokumen', $id_order))->with('success','Order dokumen berhasil di revisi');
    }

    public function finish (Request $request, $id_order){
        $user=Auth::user();
        $order_param=Order::whereNotNull('id_parameter_order_dokumen')->get();
        $order=Order::findOrFail($id_order)->select('id_order')->first();
        

        $test=Order::where('id_order', $id_order)
            ->update([
                'status_at' => 'selesai',
            ]);

            // return($test);exit();
        return redirect(route('status-order-dokumen', $id_order))->with('success', 'Order Finish!');
        
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
}
