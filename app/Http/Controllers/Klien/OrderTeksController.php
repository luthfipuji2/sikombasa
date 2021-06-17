<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

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
        return view('pages.klien.order.order_teks.index', compact('menu'));
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
        // return($request);
        
        $validate_data=$request->validate([
            'jenis_layanan'=>'required',
            'jenis_teks'=>'required',
            'durasi_pengerjaan'=>'required',
            'text'=>'required',
            'jumlah_karakter'=>'required',
        ]);
        
        
        $jenis_layanan = $validate_data['jenis_layanan'];
        $jenis_teks = $validate_data['jenis_teks'];
        $durasi = $validate_data['durasi_pengerjaan'];
        $text = $validate_data['text'];
        $jumlah_karakter = $validate_data['jumlah_karakter'];
        $tgl_order=Carbon::now()->timestamp;
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        

        $order_teks=Order::create([
            'id_klien'=>$klien->id_klien,
            'jenis_layanan'=>$jenis_layanan, 
            'jenis_teks'=>$jenis_teks,
            'text'=>$text,
            'jumlah_karakter'=>$jumlah_karakter,
            'durasi_pengerjaan'=>$durasi,
            'tgl_order'=>$tgl_order,
            'is_status'=>'belum dibayar',
            'menu'=>'teks',
        ]);
        

        $id_order=$order_teks->id_order;
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

        $order=Order::findOrFail($id_order);
       // return ($order);
        return view('pages.klien.order.order_teks.show', compact('order', 'user', 'klien'));
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
        //dd($order);
        
        // $this->validate($request, [
        //     'jenis_layanan' => 'required',
        //     'durasi_pengerjaan' => 'required',
        //     'text' => 'required',
        // ]);

        // $order=Order::find($id_order);
        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'jenis_layanan'=>$request->jenis_layanan,
                'jenis_teks'=>$request->jenis_teks,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'text'=>$request->text,
                'jumlah_karakter'=>$request->jumlah_karakter,
            ]);
        //return($order);
        //dd($order);

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
}
