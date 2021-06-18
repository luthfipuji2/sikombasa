<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Admin\ParameterJenisLayanan;
use App\Models\Admin\ParameterOrderAudio;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderTranskripController extends Controller
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
        return view('pages.klien.order.order_transkrip.index', compact('menu', 'jenis_layanan'));
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
    public function store(Request $request, Order $order_transkrip)
    {
        $jenis_layanan=ParameterJenisLayanan::all();
        $tgl_order=Carbon::now();
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $harga_audio=$request->durasi_audio;

        if($harga_audio >= 1 && $harga_audio <= 100)
        {
            $hasil = "1";
        }elseif($harga_audio >= 101 && $harga_audio <= 200){
            $hasil = "2";
        }elseif($harga_audio >= 201 && $harga_audio <= 300){
            $hasil = "3";
        }elseif($harga_audio >= 301 && $harga_audio <= 400){
            $hasil = "4";
        }elseif($harga_audio >= 401 && $harga_audio <= 500){
            $hasil = "5";
        }elseif($harga_audio >= 501 && $harga_audio <= 1000){
            $hasil = "6";
        }elseif($harga_audio >= 1001 && $harga_audio <= 3000){
            $hasil = "7";
        }elseif($harga_audio >= 3001 && $harga_audio <= 5000){
            $hasil = "8";
        }elseif($harga_audio >= 5001 && $harga_audio <= 7000){
            $hasil = "9";
        }elseif($harga_audio >= 7001 && $harga_audio <= 10000){
            $hasil = "10";
        }


        if($request->hasFile('path_file')){
            $validate_data = $request->validate([
                'id_parameter_jenis_layanan'=>'required',
                'durasi_pengerjaan'=>'required',
                'nama_dokumen'=>'required',
                'path_file'=>'required|file|max:100000',
                'durasi_audio'=>'required',
            ]);
        

            $id_parameter_jenis_layanan = $validate_data['id_parameter_jenis_layanan'];
            $durasi = $validate_data['durasi_pengerjaan'];
            $durasi_audio = $validate_data['durasi_audio'];
            $ext_template = $validate_data['path_file']->extension();
            $size_template = $validate_data['path_file']->getSize();
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();
            $nama_dokumen = $validate_data['nama_dokumen'] . "." . $ext_template;

            $path_template = Storage::putFileAs('public/order_transkrip(audio)', $request->file('path_file'), $nama_dokumen);

            $order_transkrip=Order::create([
                'id_klien'=>$klien->id_klien,
                'id_parameter_jenis_layanan'=>$id_parameter_jenis_layanan,
                'id_parameter_order_audio'=>$hasil,
                'durasi_pengerjaan'=>$durasi,
                'nama_dokumen'=>$nama_dokumen,
                'path_file'=>$path_template,
                'durasi_audio'=>$durasi_audio,
                'ekstensi'=>$ext_template,
                'size'=>$size_template,
                'tgl_order'=>Carbon::now()->timestamp,
                'is_status'=>'belum dibayar',
            ]);


            $id_order=$order_transkrip->id_order;
            return redirect(route('order-transkrip.show', $id_order))->with('success', 'Berhasil di upload!');
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
        $jenis_layanan=ParameterJenisLayanan::all();
        $klien=Klien::where('id', $user->id)->first();
       $order=Order::findOrFail($id_order); //dapat id order
        // return ($order);
        if($order != null){
            $j_layanan = ParameterJenisLayanan::where('id_parameter_jenis_layanan', $order->id_parameter_jenis_layanan)->first();
            $dr_audio = ParameterOrderAudio::where('id_parameter_order_audio', $order->id_parameter_order_audio)->first();
    
            if($j_layanan != null){
                $result_layanan = [
                    'harga' => $j_layanan->harga
                ];
            }

            if($dr_audio != null){
                $result_audio = [
                    'harga' => $dr_audio->harga
                ];
            }

            $result[] = [
                'j_layanan' => $result_layanan,
                'dr_audio'=>$result_audio
            ];
        }

        $harga = ($result_layanan['harga']) + ($result_audio['harga']);
        
        $save_harga = Order::where('id_order', $order->id_order)
                            ->update([
                                'harga'=>$harga
                            ]);
        // return ($save_harga);
        return view('pages.klien.order.order_transkrip.show', compact('order', 'user', 'klien', 'jenis_layanan', 'save_harga'));
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
            'durasi_pengerjaan' => 'required',
            'nama_dokumen' => 'required',
            'path_file' => 'required',
            'durasi_audio' => 'required',
        ]);

        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'nama_dokumen'=>$request->nama_dokumen,
                'path_file'=>$request->path_file,
                'durasi_audio'=>$request->durasi_audio,
            ]);
        return redirect(route('order-transkrip.show', $id_order))->with('success', 'Berhasil di update!');
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
        return redirect(route('order-transkrip.index'))->with('success','Order berhasil di hapus');
    }
}