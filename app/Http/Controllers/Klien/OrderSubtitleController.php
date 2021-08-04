<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Admin\ParameterJenisLayanan;
use App\Models\Admin\ParameterJenisTeks;
use App\Models\Admin\ParameterOrderSubtitle;
use App\Models\Admin\ParameterOrderDurasi;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\Revisi;
use App\Models\Klien\Review;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderSubtitleController extends Controller
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
        $durasi=ParameterOrderDurasi::all();
        return view('pages.klien.order.order_subtitle.index', compact('menu', 'jenis_layanan', 'durasi'));
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
    public function store(Request $request, Order $order_subtitle)
    {
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'durasi_pengerjaan' => 'required',
            'nama_dokumen' => 'required',
            'path_file' => 'mimetypes:video/avi,video/mpeg,video/mp4,video/quicktime|max:5000000',
            'upload_dokumen'=>'',
            'durasi_video' => '',
        ]);

        $jenis_layanan=ParameterJenisLayanan::all();
        $jenis_teks = ParameterJenisTeks::all();
        $durasi=ParameterOrderDurasi::all();
        $tgl_order=Carbon::now();
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();

        $durasi=$request->durasi_pengerjaan;
        if ($durasi == 1) {
            $hasil_durasi = "1";
        } elseif ($durasi == 2) {
            $hasil_durasi = "2";
        } elseif ($durasi == 3) {
            $hasil_durasi = "3";
        } elseif ($durasi == 4) {
            $hasil_durasi = "4";
        } elseif ($durasi == 5) {
            $hasil_durasi = "5";
        } elseif ($durasi == 6) {
            $hasil_durasi = "6";
        } elseif ($durasi == 7) {
            $hasil_durasi = "7";
        }

        $harga_video=$request->durasi_video;
        if ($harga_video >= 1 && $harga_video <= 100) {
            // $harga=ParameterOrderTeks::select('id_parameter_order_teks')->first();
            $hasil = "1";
        } elseif ($harga_video >= 101 && $harga_video <= 200) {
            $hasil = "2";
        } elseif ($harga_video >= 201 && $harga_video <= 300) {
            $hasil = "3";
        } elseif ($harga_video >= 301 && $harga_video <= 400) {
            $hasil = "4";
        } elseif ($harga_video >= 401 && $harga_video <= 500) {
            $hasil = "5";
        } elseif ($harga_video >= 501 && $harga_video <= 600) {
            $hasil = "6";
        } elseif ($harga_video >= 601 && $harga_video <= 700) {
            $hasil = "7";
        } elseif ($harga_video >= 701 && $harga_video <= 800) {
            $hasil = "8";
        } elseif ($harga_video >= 801 && $harga_video <= 900) {
            $hasil = "9";
        } elseif ($harga_video >= 901 && $harga_video <= 1000) {
            $hasil = "10";
        }

        $messages = [
            'required' => ':wajib diisi ! ',
            'mimes'=>'upload dokumen dalam bentuk avi/mpeg/mp4'
        ];

        //jika pake upload file
        if ($request->hasFile('path_file')) {
            $validate_data = $request->validate([
                'path_file'=>'mimetypes:video/avi,video/mpeg,video/mp4,video/quicktime|max:5000000',
            ], $messages);

            $id_parameter_jenis_layanan = $request['id_parameter_jenis_layanan'];
            $durasi = $request['durasi_pengerjaan'];
            $durasi_video = $request['durasi_video'];
            $ext_template = $request['path_file']->extension();
            $size_template = $request['path_file']->getSize();
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();
            $nama_dokumen = $request['nama_dokumen'] . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_video/file_order_video', $request->file('path_file'), $nama_dokumen);

            $order_subtitle=Order::updateOrCreate([
                'id_klien'=>$klien->id_klien,
                'id_parameter_jenis_layanan'=>$id_parameter_jenis_layanan,
                'id_parameter_order_subtitle'=>$hasil,
                'id_parameter_order_durasi'=>$hasil_durasi,
                'durasi_pengerjaan'=>$durasi,
                'nama_dokumen'=>$nama_dokumen,
                'path_file'=>$path_template,
                'durasi_video'=>$durasi_video,
                'ekstensi'=>$ext_template,
                'size'=>$size_template,
                'tgl_order'=>Carbon::now()->timestamp,
                'is_status'=>'belum dibayar',
                'menu'=>'Subtitle',
            ]);


            $id_order=$order_subtitle->id_order;
            return redirect(route('order-subtitle.show', $id_order))->with('success', 'Berhasil di upload!');
        }else{
            $id_parameter_jenis_layanan = $request['id_parameter_jenis_layanan'];
            $durasi = $request['durasi_pengerjaan'];
            $nama_dokumen = $request['nama_dokumen'];
            $link=$request['upload_dokumen'];
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();

            $order_subtitle=Order::updateOrCreate([
                'id_klien'=>$klien->id_klien,
                'id_parameter_jenis_layanan'=>$id_parameter_jenis_layanan,
                'id_parameter_order_durasi'=>$hasil_durasi,
                'durasi_pengerjaan'=>$durasi,
                'nama_dokumen'=>$nama_dokumen,
                'upload_dokumen'=>$link,
                'tgl_order'=>Carbon::now()->timestamp,
                'is_status'=>'belum dibayar',
                'menu'=>'Dubbing',
            ]);

            $id_order=$order_subtitle->id_order;
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
        $jenis_layanan=ParameterJenisLayanan::all();
        $klien=Klien::where('id', $user->id)->first();
        $durasi=ParameterOrderDurasi::all();
       $order=Order::findOrFail($id_order); //dapat id order
        // return ($order);
        if($order != null && !empty($order->durasi_video)){
            $j_layanan = ParameterJenisLayanan::where('id_parameter_jenis_layanan', $order->id_parameter_jenis_layanan)->first();
            $dr_video = ParameterOrderSubtitle::where('id_parameter_order_subtitle', $order->id_parameter_order_subtitle)->first();
            $durasi_pengerjaan = ParameterOrderDurasi::where('id_parameter_order_durasi', $order->id_parameter_order_durasi)->first();
    
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
            if($durasi_pengerjaan != null){
                $result_durasi = [
                    'harga' => $durasi_pengerjaan->harga
                ];
            }

            $result[] = [
                'j_layanan' => $result_layanan,
                'dr_video'=>$result_video,
                'durasi_pengerjaan'=>$result_durasi,
            ];

        $harga = ($result_layanan['harga']) + ($result_video['harga']) + ($result_durasi['harga']);
        
        $save_harga = Order::where('id_order', $order->id_order)
                            ->update([
                                'harga'=>$harga
                            ]);
        // return ($save_harga);
        return view('pages.klien.order.order_subtitle.show', compact('order', 'user', 'klien', 'jenis_layanan', 'save_harga'));
        }elseif($order != null && empty($order->durasi_video)){
            $j_layanan = ParameterJenisLayanan::where('id_parameter_jenis_layanan', $order->id_parameter_jenis_layanan)->first();
            $durasi_pengerjaan = ParameterOrderDurasi::where('id_parameter_order_durasi', $order->id_parameter_order_durasi)->first();
            return view('pages.klien.order.order_subtitle.show', compact('order', 'user', 'klien'));
        }

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
            'path_file' => 'required|mimetypes:video/avi,video/mpeg,video/mp4,video/quicktime|max:5000000',
            'durasi_video' => 'required',
        ]);

        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'nama_dokumen'=>$request->nama_dokumen,
                'path_file'=>$request->path_file,
                'durasi_video'=>$request->durasi_video,
            ]);
        //return($order);
        //dd($order);

        return redirect(route('order-subtitle.show', $id_order))->with('success', 'Berhasil di update!');
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
        return redirect(route('order-subtitle.index'))->with('success','Order berhasil di hapus');
    }

    function statusOrder(){
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();

        // $transaksi=Transaksi::where('status_transaksi', 'Berhasil')->orWhere('status_transaksi', 'Pending')->orWhere('status_transaksi', 'Gagal')
        //                     ->join('order', 'transaksi.id_order', '=', 'order.id_order')
        //                     ->get();
        $status=Order::where('id_klien', $klien->id_klien)
                    ->whereNotNull('id_parameter_order_subtitle')
                    ->join('transaksi', 'order.id_order', '=', 'transaksi.id_order')
                    ->get();
        
        // return ($status);exit();
        Order::where('id_order', $status)
            ->update([
                'status_at'=> 'selesai'
            ]);

        // return ($status);exit();
        return view ('pages.klien.order.order_subtitle.status_order', compact('user', 'status', 'klien'));
        
    }

    public function revisi(Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('id_parameter_order_subtitle')->get();
        $revisi = Revisi::create([
            'id_order'=>$request->id_order,
            'path_file_revisi'=>$request->path_file_revisi,
            'pesan_revisi'=>$request->pesan_revisi,
            'tgl_pengajuan_revisi'=>Carbon::now(),
            'durasi_pengerjaan_revisi'=>$request->durasi_pengerjaan_revisi,
        ]);
        // return ($revisi);exit();
        return redirect(route('status-order-subtitle', $id_order))->with('success','Order subtitle berhasil di revisi');
    }

    public function finish (Request $request, $id_order){
        $user=Auth::user();
        $order_param=Order::whereNotNull('id_parameter_order_subtitle')->get();
        $order=Order::findOrFail($id_order)->select('id_order')->first();
        

        $test=Order::where('id_order', $id_order)
            ->update([
                'status_at' => 'selesai',
            ]);

            // return($test);exit();
        return redirect(route('status-order-subtitle', $id_order))->with('success', 'Order Finish!');
        
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

    public function review(){
        $user = Auth::user();

        $klien=Klien::where('id', $user->id)->first();
        // $review = Order::whereNotNull('id_parameter_order_teks')->whereNotNull('text_trans')->where('status_at', 'selesai')->with('review')->get();
        
        $review = Order::where('id_klien', $klien->id_klien)
                        ->whereNotNull('id_parameter_order_subtitle')
                        ->whereNotNull('path_file_trans')
                        ->where('status_at', 'selesai')
                        // ->with('review')
                        ->get();
        // $data=$review[0];
        // $riwayat=Review::where('id_order', $data->id_order)->get();
        // return ($riwayat);exit();

        return view ('pages.klien.order.order_subtitle.review', compact('user', 'review'));
    }

    public function storeReview(Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('id_parameter_order_subtitle')->whereNotNull('path_file_trans')->where('status_at', 'selesai')->get();
        $review = Review::create([
            'id_order'=>$request->id_order,
            'review_text'=>$request->review_text,
            'rating'=>$request->rating,
        ]);
        // return ($review);exit();
        return redirect(route('review_order_subtitle'))->with('success','Review Berhasil Di Tambahkan');
    }
}
