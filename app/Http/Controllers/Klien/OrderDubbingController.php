<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Review;
use App\Models\Admin\ParameterJenisLayanan;
use App\Models\Admin\ParameterDubber;
use App\Models\Admin\ParameterOrderSubtitle;
use App\Models\Admin\Transaksi;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\Revisi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderDubbingController extends Controller
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
        $jml_dubber=ParameterDubber::all();
        return view('pages.klien.order.order_dubbing.index', compact('menu', 'jenis_layanan', 'jml_dubber'));
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
    public function store(Request $request, Order $order_dubbing)
    {

        $jenis_layanan=ParameterJenisLayanan::all();
        $jml_dubber = ParameterDubber::all();
        $tgl_order=Carbon::now();
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $jml_dubber=$request->jumlah_dubber;
        $harga_video=$request->durasi_video;
        // return ($harga_video);
        // exit();

        if($jml_dubber = 1 )
        {
            // $harga=ParameterOrderTeks::select('id_parameter_order_teks')->first();
            $hasil_dubber = "1";
        }elseif($jml_dubber = 2){
            $hasil_dubber = "2";
        }elseif($jml_dubber = 3){
            $hasil_dubber = "3";
        }elseif($jml_dubber = 4){
            $hasil_dubber = "4";
        }elseif($jml_dubber = 5){
            $hasil_dubber = "5";
        }


        if($harga_video >= 1 && $harga_video <= 100)
        {
            // $harga=ParameterOrderTeks::select('id_parameter_order_teks')->first();
            $hasil = "1";
        }elseif($harga_video >= 101 && $harga_video <= 200){
            $hasil = "2";
        }elseif($harga_video >= 201 && $harga_video <= 300){
            $hasil = "3";
        }elseif($harga_video >= 301 && $harga_video <= 400){
            $hasil = "4";
        }elseif($harga_video >= 401 && $harga_video <= 500){
            $hasil = "5";
        }elseif($harga_video >= 501 && $harga_video <= 600){
            $hasil = "6";
        }elseif($harga_video >= 601 && $harga_video <= 700){
            $hasil = "7";
        }elseif($harga_video >= 701 && $harga_video <= 800){
            $hasil = "8";
        }elseif($harga_video >= 801 && $harga_video <= 900){
            $hasil = "9";
        }elseif($harga_video >= 901 && $harga_video <= 1000){
            $hasil = "10";
        }


        //return($request);
        if($request->hasFile('path_file')){
            $validate_data = $request->validate([
                'id_parameter_jenis_layanan'=>'required',
                'durasi_pengerjaan'=>'required',
                'jumlah_dubber'=>'required',
                'nama_dokumen'=>'required',
                'path_file'=>'required|file|max:5000000',
                'durasi_video'=>'required',
            ]);

            $id_parameter_jenis_layanan = $validate_data['id_parameter_jenis_layanan'];
            $durasi = $validate_data['durasi_pengerjaan'];
            $jml_dubber = $validate_data['jumlah_dubber'];
            $durasi_video = $validate_data['durasi_video'];
            $ext_template = $validate_data['path_file']->extension();
            $size_template = $validate_data['path_file']->getSize();
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();
            $nama_dokumen = $validate_data['nama_dokumen'] . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_video/file_order_video', $request->file('path_file'), $nama_dokumen);

            $order_dubbing=Order::create([
                'id_klien'=>$klien->id_klien,
                'id_parameter_jenis_layanan'=>$id_parameter_jenis_layanan,
                'id_parameter_dubber'=>$hasil_dubber,
                'id_parameter_order_dubbing'=>$hasil,
                'durasi_pengerjaan'=>$durasi,
                'jumlah_dubber'=>$jml_dubber,
                'nama_dokumen'=>$nama_dokumen,
                'durasi_video'=>$durasi_video,
                'path_file'=>$path_template,
                'ekstensi'=>$ext_template,
                'size'=>$size_template,
                'tgl_order'=>Carbon::now()->timestamp,
                'is_status'=>'belum dibayar',
                'menu'=>'Dubbing',
            ]);

            $id_order=$order_dubbing->id_order;
            return redirect(route('order-dubbing.show', $id_order))->with('success', 'Berhasil di upload!');
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
        $order=Order::findOrFail($id_order); //dapat id order
        // return ($order);
        if($order != null){
            $j_layanan = ParameterJenisLayanan::where('id_parameter_jenis_layanan', $order->id_parameter_jenis_layanan)->first();
            $dr_video = ParameterOrderSubtitle::where('id_parameter_order_subtitle', $order->id_parameter_order_dubbing)->first();
            $jml_dubber = ParameterDubber::where('id_parameter_dubber', $order->id_parameter_dubber)->first();
    
            if($j_layanan != null){
                $result_layanan = [
                    'harga' => $j_layanan->harga
                ];
            }

            if($dr_video != null){
                $result_video = [
                    'harga' => $dr_video->harga
                ];
            }

            if($jml_dubber != null){
                $result_dubber = [
                    'harga' => $jml_dubber->harga
                ];
            }

            $result[] = [
                'j_layanan' => $result_layanan,
                'dr_video'=>$result_video,
                'jml_dubber'=>$result_dubber,
            ];
        }

        $harga = ($result_layanan['harga']) + ($result_video['harga']) + ($result_dubber['harga']);
        
        $save_harga = Order::where('id_order', $order->id_order)
                            ->update([
                                'harga'=>$harga
                            ]);
        // return ($save_harga);

        return view('pages.klien.order.order_dubbing.show', compact('order', 'user', 'klien', 'save_harga'));
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
            'jumlah_dubber' => 'required',
            'nama_dokumen' => 'required',
            'path_file' => 'required',
            'durasi_video' => 'required',
        ]);

        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'jumlah_dubber'=>$request->jumlah_dubber,
                'nama_dokumen'=>$request->nama_dokumen,
                'path_file'=>$request->path_file,
                'durasi_video'=>$request->durasi_video,
            ]);
        //return($order);
        //dd($order);

        return redirect(route('order-dubbing.show', $id_order))->with('success', 'Berhasil di update!');
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
        return redirect(route('order-dubbing.index'))->with('success','Order berhasil di hapus');
    }

    function statusOrder(){
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        // $transaksi=Transaksi::where('status_transaksi', 'Berhasil')->orWhere('status_transaksi', 'Pending')->orWhere('status_transaksi', 'Gagal')
        //                     ->join('order', 'transaksi.id_order', '=', 'order.id_order')
        //                     ->get();
        $status=Order::where('id_klien', $klien->id_klien)
                    ->whereNotNull('id_parameter_order_dubbing')
                    ->join('transaksi', 'order.id_order', '=', 'transaksi.id_order')
                    ->get();
        
        // return ($status);exit();
        Order::where('id_order', $status)
            ->update([
                'status_at'=> 'selesai'
            ]);

        // return ($status);exit();
        return view ('pages.klien.order.order_dubbing.status_order', compact('user', 'status'));
        
    }

    public function revisi(Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('id_parameter_order_dubbing')->get();
        $revisi = Revisi::create([
            'id_order'=>$request->id_order,
            'path_file_revisi'=>$request->path_file_revisi,
            'pesan_revisi'=>$request->pesan_revisi,
            'tgl_pengajuan_revisi'=>Carbon::now(),
            'durasi_pengerjaan_revisi'=>$request->durasi_pengerjaan_revisi,
        ]);
        // return ($revisi);exit();
        return redirect(route('status-order-dubbing', $id_order))->with('success','Order dubbing berhasil di revisi');
    }

    public function finish (Request $request, $id_order){
        $user=Auth::user();
        $order_param=Order::whereNotNull('id_parameter_order_dubbing')->get();
        $order=Order::findOrFail($id_order)->select('id_order')->first();
        

        $test=Order::where('id_order', $id_order)
            ->update([
                'status_at' => 'selesai',
            ]);

            // return($test);exit();
        return redirect(route('status-order-dubbing', $id_order))->with('success', 'Order Finish!');
        
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

    public function review(){
        $user = Auth::user();

        $klien=Klien::where('id', $user->id)->first();
        // $review = Order::whereNotNull('id_parameter_order_teks')->whereNotNull('text_trans')->where('status_at', 'selesai')->with('review')->get();
        
        $review = Order::where('id_klien', $klien->id_klien)
                        ->whereNotNull('id_parameter_order_dubbing')
                        ->whereNotNull('path_file_trans')
                        ->where('status_at', 'selesai')
                        // ->with('review')
                        ->get();
        $data=$review[0];
        $riwayat=Review::where('id_order', $data->id_order)->get();
        // return ($riwayat);exit();

        return view ('pages.klien.order.order_dubbing.review', compact('user', 'review', 'riwayat'));
    }

    public function storeReview(Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('id_parameter_order_dubbing')->whereNotNull('path_file_trans')->where('status_at', 'selesai')->get();
        $review = Review::create([
            'id_order'=>$request->id_order,
            'review_text'=>$request->review_text,
            'rating'=>$request->rating,
        ]);
        // return ($review);exit();
        return redirect(route('review_order_dubbing'))->with('success','Review Berhasil Di Tambahkan');
    }
}
