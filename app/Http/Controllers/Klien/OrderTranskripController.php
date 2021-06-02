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
       
        return view('pages.klien.order.order_transkrip.index',compact('menu')); 
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
        $order_transkrip = new Order;
        $order_transkrip->jenis_layanan=$request->jenis_layanan;
        $order_transkrip->tipe_transkrip=$request->tipe_transkrip;
        $order_transkrip->durasi_pengerjaan=$request->durasi_pengerjaan;
        $order_transkrip->durasi_audio=$request->durasi_audio;
        $order_transkrip->nama_dokumen=$request->nama_dokumen;
        // $order_transkrip->path_file=$request->path_template;
        // $order_transkrip->ekstensi=$request->ext_template;
        // $order_transkrip->size=$request->size_template;
        $order_transkrip->durasi_pertemuan=$request->durasi_pertemuan;
        $order_transkrip->lokasi=$request->lokasi;
        $order_transkrip->longitude=$request->longitude;
        $order_transkrip->latitude=$request->latitude;
        $order_transkrip->tanggal_pertemuan=$request->tanggal_pertemuan;
        $order_transkrip->waktu_pertemuan=$request->waktu_pertemuan;

        // $ext_template = $request['path_file']->extension();
        // $size_template = $request['path_file']->getSize();
        // $nama_dokumen = $request['nama_dokumen'] . "." . $ext_template;
        // $path_template = Storage::putFileAs('https://drive.google.com/drive/folders/1vk6P4Rpicf2NgN09eEVccpbMsL_WJc1z?usp=sharing', $request->file('path_file'), $nama_dokumen);

        $order_transkrip->save();
        $user = Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $order_transkrip->id_klien=$klien->id_klien;
        $id_order=$order_transkrip->id_order;
            return redirect()->route('order-transkrip.show', $id_order)->with('success', 'Berhasil di upload!');
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
        return view('pages.klien.order.order_transkrip.show', compact('order', 'user', 'klien'));
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
                'tanggal_pertemuan'=>$request->tanggal_pertemuan,
                'waktu_pertemuan'=>$request->waktu_pertemuan,
            ]);

        return redirect(route('order-transkrip.show', $id_order))->with('success', 'Berhasil di upload!');
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
        return redirect(route('order-transkrip.index'))->with('success','data berhasil di hapus');

    }

}
