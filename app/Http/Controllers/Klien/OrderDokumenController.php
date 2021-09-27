<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Translator;
use App\Models\Admin\ParameterJenisLayanan;
use App\Models\Admin\ParameterJenisTeks;
use App\Models\Admin\ParameterOrderDokumen;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\Revisi;
use App\Models\Admin\ParameterOrderDurasi;
use App\Models\Klien\Review;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailTranslator;

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
        $durasi=ParameterOrderDurasi::all();
        return view('pages.klien.order.order_dokumen.index', compact('menu', 'jenis_layanan', 'jenis_teks', 'durasi'));
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
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'id_parameter_jenis_teks' => 'required',
            'durasi_pengerjaan' => 'required',
            'nama_dokumen' => 'required',
            'path_file' => 'file:txt, pdf, pptx, docx|max:500000',
            'upload_dokumen'=>'',
            'jumlah_halaman' => 'required',
        ]);

        // return($request);exit();

        $jenis_layanan=ParameterJenisLayanan::all();
        $jenis_teks = ParameterJenisTeks::all();
        $durasi=ParameterOrderDurasi::all();
        $tgl_order=Carbon::now();
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();

        $durasi=$request->durasi_pengerjaan;
        if($durasi == 1 )
        {
            $hasil_durasi = "1";
        }elseif($durasi == 2){
            $hasil_durasi = "2";
        }elseif($durasi == 3){
            $hasil_durasi = "3";
        }elseif($durasi == 4){
            $hasil_durasi = "4";
        }elseif($durasi == 5){
            $hasil_durasi = "5";
        }elseif($durasi == 6){
            $hasil_durasi = "6";
        }elseif($durasi == 7){
            $hasil_durasi = "7";
        }

        $harga_dokumen=$request->jumlah_halaman;
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


        $messages = [
            'required' => ':wajib diisi ! ',
            'mimes'=>'upload dokumen dalam bentuk word/pdf/pptx'
        ];

        //jika pake upload file
        if ($request->hasFile('path_file')) {
            $validate_data = $request->validate([
                'path_file'=>'file:txt, pdf, pptx, docx|max:500000',
            ], $messages);

            $id_parameter_jenis_layanan = $request['id_parameter_jenis_layanan'];
            $id_parameter_jenis_teks = $request['id_parameter_jenis_teks'];
            $durasi = $request['durasi_pengerjaan'];
            $link=$request['upload_dokumen'];
            $jumlah_halaman = $request['jumlah_halaman'];
            $ext_template = $validate_data['path_file']->extension();
            $size_template = $validate_data['path_file']->getSize();
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();
            $nama_dokumen = $request['nama_dokumen'] . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_file/file_order_dokumen', $request->file('path_file'), $nama_dokumen);

            $order_dokumen=Order::create([
                'id_klien'=>$klien->id_klien,
                'id_parameter_jenis_layanan'=>$id_parameter_jenis_layanan,
                'id_parameter_jenis_teks'=>$id_parameter_jenis_teks,
                'id_parameter_order_dokumen'=>$hasil,
                'id_parameter_order_durasi'=>$hasil_durasi,
                'durasi_pengerjaan'=>$durasi,
                'upload_dokumen'=>$link,
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

        }else{
            //jika pake link
            $id_parameter_jenis_layanan = $request['id_parameter_jenis_layanan'];
            $id_parameter_jenis_teks = $request['id_parameter_jenis_teks'];
            $durasi = $request['durasi_pengerjaan'];
            $link=$request['upload_dokumen'];
            $jumlah_halaman = $request['jumlah_halaman'];
            $nama_dokumen = $request['nama_dokumen'];
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();

            $order_dokumen=Order::create([
                'id_klien'=>$klien->id_klien,
                'id_parameter_jenis_layanan'=>$id_parameter_jenis_layanan,
                'id_parameter_jenis_teks'=>$id_parameter_jenis_teks,
                'id_parameter_order_dokumen'=>$hasil,
                'id_parameter_order_durasi'=>$hasil_durasi,
                'durasi_pengerjaan'=>$durasi,
                'upload_dokumen'=>$link,
                'nama_dokumen'=>$nama_dokumen,
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
        $durasi=ParameterOrderDurasi::all();
        $order=Order::findOrFail($id_order);

        // return ($order);
        if($order != null){
            $j_layanan = ParameterJenisLayanan::where('id_parameter_jenis_layanan', $order->id_parameter_jenis_layanan)->first();
            $j_teks = ParameterJenisTeks::where('id_parameter_jenis_teks', $order->id_parameter_jenis_teks)->first();
            $jml_halaman = ParameterOrderDokumen::where('id_parameter_order_dokumen', $order->id_parameter_order_dokumen)->first();
            $durasi_pengerjaan = ParameterOrderDurasi::where('id_parameter_order_durasi', $order->id_parameter_order_durasi)->first();
    
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
            if($durasi_pengerjaan != null){
                $result_durasi = [
                    'harga' => $durasi_pengerjaan->harga
                ];
            }

            $result[] = [
                'j_layanan' => $result_layanan,
                'j_teks'=>$result_teks,
                'jml_halaman'=>$result_halaman,
                'durasi_pengerjaan'=>$result_durasi,
            ];
        }

        $harga = ($result_layanan['harga']) + ($result_teks['harga']) + ($result_halaman['harga']) + ($result_durasi['harga']);
        
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
            'path_file' => 'mimetypes:txt, pdf, pptx, docx|max:500000',
            'upload_dokumen'=>'',
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
                'upload_dokumen'=>$request->upload_dokumen,
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
        $klien=Klien::where('id', $user->id)->first();

        $status=Order::where('id_klien', $klien->id_klien)
                    ->whereNotNull('id_parameter_order_dokumen')
                    // ->whereNotNull('path_file_trans')
                    ->join('transaksi', 'order.id_order', '=', 'transaksi.id_order')
                    ->get();

        // return ($status);exit();
        return view ('pages.klien.order.order_dokumen.status_order', compact('user', 'status', 'klien'));
        
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

        //Notifikasi Email
        $o = Order::where('id_order', $id_order)->first();
        $translator = Translator::where('id_translator', $o->id_translator)->first();
        $user = User::where('id', $translator->id)->first();

        $email = $user->email;
        $data = [
            'title' => 'Ada Permintaan Revisi!',
            'url' => 'http://127.0.0.1:8000/login',
        ];

        Mail::to($email)->send(new SendMailTranslator($data));

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

    public function review(){
        $user = Auth::user();

        $klien=Klien::where('id', $user->id)->first();
        // $review = Order::whereNotNull('id_parameter_order_teks')->whereNotNull('text_trans')->where('status_at', 'selesai')->with('review')->get();
        
        $review = Order::where('id_klien', $klien->id_klien)
                        ->whereNotNull('id_parameter_order_dokumen')
                        ->whereNotNull('path_file_trans')
                        ->where('status_at', 'selesai')
                        // ->with('review')
                        ->get();
        // $data=$review[0];
        // $riwayat=Review::where('id_order', $data->id_order)->get();
        // return ($riwayat);exit();

        return view ('pages.klien.order.order_dokumen.review', compact('user', 'review'));
    }

    public function storeReview(Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('id_parameter_order_dokumen')->whereNotNull('path_file_trans')->where('status_at', 'selesai')->get();
        $review = Review::create([
            'id_order'=>$request->id_order,
            'review_text'=>$request->review_text,
            'rating'=>$request->rating,
        ]);
        // return ($review);exit();
        return redirect(route('review_order_dokumen'))->with('success','Review Berhasil Di Tambahkan');
    }
}
