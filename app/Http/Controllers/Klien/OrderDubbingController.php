<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Order;
use App\Models\Klien;
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
    
    public function index()
    {
        $menu=Order::all();
        return view('pages.klien.menu_order', compact('menu'));
    }

    public function indexDubbing(){
        $menu=Order::all();
        return view('pages.klien.order.order_dubbing.index', compact('menu'));
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
    public function store(Request $request, Klien $klien)
    {
        if($request->hasFile('path_file')){
            $validate_data = $request->validate([
                'jenis_layanan'=>'required',
                'durasi_pengerjaan'=>'required',
                'jumlah_dubber'=>'required',
                'nama_dokumen'=>'required',
                'path_file'=>'required|file|max:10000',
            ]);

            $jenis_layanan = $validate_data['jenis_layanan'];
            $durasi = $validate_data['durasi_pengerjaan'];
            $jml_dubber = $validate_data['jumlah_dubber'];
            $ext_template = $validate_data['path_file']->extension();
            $size_template = $validate_data['path_file']->getSize();
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();
            $nama_dokumen = $validate_data['nama_dokumen'] . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_video/file_order_video', $request->file('path_file'), $nama_dokumen);

            $order_dokumen=Order::create([
                'id_klien'=>$klien->id_klien,
                'jenis_layanan'=>$jenis_layanan,
                'durasi_pengerjaan'=>$durasi,
                'jumlah_dubber'=>$jml_dubber,
                'nama_dokumen'=>$nama_dokumen,
                'path_file'=>$path_template,
                'ekstensi'=>$ext_template,
                'size'=>$size_template,
                'tgl_order'=>Carbon::now()->timestamp,
                'is_status'=>'belum dibayar',
            ]);

            return redirect('/show-order-dubbing')->with('success', 'Berhasil di upload!');
        } else {
            return redirect('/show-order-dubbing')->with('warning', 'Form tidak valid!');
        }
        } 
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrderDubbing(Klien $id_klien, Order $order)
    {
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $order=Order::all();
        //return ($klien);
        return view('pages.klien.order.order_dubbing.show', compact('order', 'user', 'klien'));
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
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id)
    {
        //
    }
}