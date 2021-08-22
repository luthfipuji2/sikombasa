<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\Models\Admin\ParameterJenisLayanan;
use App\Models\Admin\ParameterJenisTeks;
use App\Models\User;
use App\Models\Admin\ParameterOrderDurasi;
use App\Models\Klien\Review;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Admin\ParameterOrderHarga;
use App\Models\Admin\ParameterOrderTeks;
use App\Models\Admin\Transaksi;
use App\Models\Klien\ParameterOrder;
use App\Models\Translator;
use App\Models\Klien\Revisi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Mockery\Generator\Parameter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailTranslator;

class OrderTeksController extends Controller
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
        return view('pages.klien.order.order_teks.index', compact('menu', 'jenis_layanan', 'jenis_teks', 'durasi'));
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
    public function store(Request $request, Order $order_teks)
    {
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'id_parameter_jenis_teks' => 'required',
            'durasi_pengerjaan' => 'required',
            'text' => 'required',
            'jumlah_karakter' => 'required',
        ]);

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
        // return ($hasil_durasi);exit();

        $harga_teks=$request->jumlah_karakter;
        if($harga_teks >= 1 && $harga_teks <= 100)
        {
            // $harga=ParameterOrderTeks::select('id_parameter_order_teks')->first();
            $hasil = "1";
        }elseif($harga_teks >= 101 && $harga_teks <= 200){
            $hasil = "2";
        }elseif($harga_teks >= 201 && $harga_teks <= 300){
            $hasil = "3";
        }elseif($harga_teks >= 301 && $harga_teks <= 400){
            $hasil = "4";
        }elseif($harga_teks >= 401 && $harga_teks <= 500){
            $hasil = "5";
        }elseif($harga_teks >= 501 && $harga_teks <= 600){
            $hasil = "6";
        }elseif($harga_teks >= 601 && $harga_teks <= 700){
            $hasil = "7";
        }elseif($harga_teks >= 701 && $harga_teks <= 800){
            $hasil = "8";
        }elseif($harga_teks >= 801 && $harga_teks <= 900){
            $hasil = "9";
        }elseif($harga_teks >= 901 && $harga_teks <= 1000){
            $hasil = "10";
        }
        
        $order_teks=Order::create([
            'id_klien'=>$klien->id_klien,
            'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan, 
            'id_parameter_jenis_teks'=>$request->id_parameter_jenis_teks,
            'id_parameter_order_teks'=>$hasil,
            'id_parameter_order_durasi'=>$hasil_durasi,
            'text'=>$request->text,
            'jumlah_karakter'=>$request->jumlah_karakter,
            'durasi_pengerjaan'=>$request->durasi_pengerjaan,
            'tgl_order'=>Carbon::now(),
            'is_status'=>'belum dibayar',
            'menu'=>'Text',
        ]);
        $id_order=$order_teks->id_order;


        // return ($order_teks);
        return redirect(route('order-teks.show', $id_order))->with('success', 'Berhasil di upload!');
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

        if($order != null){
            $j_layanan = ParameterJenisLayanan::where('id_parameter_jenis_layanan', $order->id_parameter_jenis_layanan)->first();
            $j_teks = ParameterJenisTeks::where('id_parameter_jenis_teks', $order->id_parameter_jenis_teks)->first();
            $jml_karakter = ParameterOrderTeks::where('id_parameter_order_teks', $order->id_parameter_order_teks)->first();
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
            if($jml_karakter != null){
                $result_karakter = [
                    'harga' => $jml_karakter->harga
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
                'jml_karakter'=>$result_karakter,
                'durasi_pengerjaan'=>$result_durasi,
            ];
        }

        $harga = ($result_layanan['harga']) + ($result_teks['harga']) + ($result_karakter['harga']) + ($result_durasi['harga']);
        
        $save_harga = Order::where('id_order', $order->id_order)
                            ->update([
                                'harga'=>$harga
                            ]);
        // return ($save_harga);


        //return ($order);
        return view('pages.klien.order.order_teks.show', compact('order', 'user', 'klien', 'jenis_layanan', 'jenis_teks', 'save_harga'));
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

    public function update(Request $request, $id_order)
    {
        //dd($request);
        
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'id_parameter_jenis_teks' => 'required',
            'durasi_pengerjaan' => 'required',
            'text' => 'required',
            'jumlah_karakter' => 'required',
        ]);

        $order=Order::findOrFail($id_order);
        // return ($order);exit();

        $a=Order::where('id_order', $id_order)
            ->update([
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'id_parameter_jenis_teks'=>$request->id_parameter_jenis_teks,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'text'=>$request->text,
                'jumlah_karakter'=>$request->jumlah_karakter,
            ]);
        // return($a);exit();
        // dd($a);

        return redirect(route('order-teks.show', $id_order))->with('success', 'Berhasil di update!');
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
        return redirect(route('order-teks.index'))->with('success','Order berhasil di hapus');

    }

    function statusOrder(){
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();

        $status=Order::where('id_klien', $klien->id_klien)
                    ->whereNotNull('id_parameter_order_teks')
                    ->join('transaksi', 'order.id_order', '=', 'transaksi.id_order')
                    ->get();

        return view ('pages.klien.order.order_teks.status_order', compact('user', 'status'));
        
    }

    public function revisi(Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('id_parameter_order_teks')->get();
        $revisi = Revisi::create([
            'id_order'=>$request->id_order,
            'text_revisi'=>$request->text_revisi,
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
        return redirect(route('status-order-teks', $id_order))->with('success','Order teks berhasil di revisi');
    }

    public function finish (Request $request, $id_order){
        $user=Auth::user();
        $order_param=Order::whereNotNull('id_parameter_order_teks')->get();
        $order=Order::findOrFail($id_order)->select('id_order')->first();
        

        $test=Order::where('id_order', $id_order)
            ->update([
                'status_at' => 'selesai',
            ]);

            // return($test);exit();
        return redirect(route('review_order_teks', $id_order))->with('success', 'Order Finish!');
        
    }

    public function review(){
        $user = Auth::user();

        $klien=Klien::where('id', $user->id)->first();
        // $review = Order::whereNotNull('id_parameter_order_teks')->whereNotNull('text_trans')->where('status_at', 'selesai')->with('review')->get();
        
        $review = Order::where('id_klien', $klien->id_klien)
                        ->whereNotNull('id_parameter_order_teks')
                        ->whereNotNull('text_trans')
                        ->where('status_at', 'selesai')
                        // ->with('review')
                        ->get();
                        // return ($review);exit();
        // $data=$review[0];
        // $riwayat=Review::where('id_order', $data->id_order)->get();
        // return ($riwayat);exit();

        return view ('pages.klien.order.order_teks.review', compact('user', 'review'));
    }

    public function storeReview(Request $request, $id_order){
        $user=Auth::user();
        $order=Order::whereNotNull('id_parameter_order_teks')->whereNotNull('text_trans')->where('status_at', 'selesai')->get();
        $review = Review::create([
            'id_order'=>$request->id_order,
            'review_text'=>$request->review_text,
            'rating'=>$request->rating,
        ]);
        // return ($review);exit();
        return redirect(route('review_order_teks'))->with('success','Review Berhasil Di Tambahkan');
    }
}
