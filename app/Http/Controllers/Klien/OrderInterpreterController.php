<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\SearchLocation ;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class OrderInterpreterController extends Controller
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
       
        return view('pages.klien.order.order_interpreter.index',compact('menu')); 
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
    public function store(Request $request, Order $order_interpreter)
    {
        $validate_data=$request->validate([
            'jenis_layanan'=>'required',
            'durasi_pertemuan'=>'required',
            'lokasi'=>'required',
            'longitude'=>'required',
            'latitude'=>'required',
        ]);

        $jenis_layanan = $validate_data['jenis_layanan'];
        $durasi_pertemuan = $validate_data['durasi_pertemuan'];
        $lokasi = $validate_data['lokasi'];
        $longitude = $validate_data['longitude'];
        $latitude = $validate_data['latitude'];
        $tgl_order=Carbon::now()->timestamp;
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();

        $order_interpreter=Order::create([
            'id_klien'=>$klien->id_klien,
            'jenis_layanan'=>$jenis_layanan,
            'durasi_pertemuan'=>$durasi_pertemuan, 
            'lokasi'=>$lokasi,
            'longitude'=>$longitude,
            'latitude'=>$latitude,
            'tgl_order'=>$tgl_order,
            'is_status'=>'belum dibayar',
        ]);

        $id_order=$order_interpreter->id_order;
        return redirect(route('order-interpreter.show', $id_order))->with('success', 'Berhasil di upload!');
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
        return view('pages.klien.order.order_interpreter.show', compact('order', 'user', 'klien'));
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
                'durasi_pertemuan'=>$request->durasi_pertemuan,
                'lokasi'=>$request->lokasi,
                'longitude'=>$request->longitude,
                'latitude'=>$request->latitude,
            ]);

        return redirect(route('order-interpreter.show', $id_order))->with('success', 'Berhasil di upload!');
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
        return redirect(route('order-interpreter.index'))->with('success','data berhasil di hapus');

    }

}
