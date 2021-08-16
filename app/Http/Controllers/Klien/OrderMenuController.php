<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\Models\Admin\Transaksi;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class OrderMenuController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        return view('pages.klien.home', compact('user'));
    }
    
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $klien=User::where('id', $user->id)->with('klien')->first();
        $menu=Order::all();
        return view('pages.klien.menu_order', compact('menu', 'klien'));
    }

    // public function indexDokumen(){
    //     $menu=Order::all();
    //     return view('pages.klien.order_dokumen', compact('menu'));
    // }

    // public function submitDokumen(Request $request, Klien $id_klien){
        
    //     if($request->hasFile('path_file')){
    //         $validate_data = $request->validate([
    //             'jenis_layanan'=>'required',
    //             'durasi_pengerjaan'=>'required',
    //             'nama_dokumen'=>'required',
    //             'path_file'=>'required|file|max:10000',
    //         ]);

    //         $jenis_layanan = $validate_data['jenis_layanan'];
    //         $durasi = $validate_data['durasi_pengerjaan'];
    //         $ext_template = $validate_data['path_file']->extension();
    //         $size_template = $validate_data['path_file']->getSize();
    //         $user=Auth::user();
    //         $klien=Klien::where('id', $user->id)->first();
    //         $nama_dokumen = $validate_data['nama_dokumen'] . "." . $ext_template;

    //         $path_template = Storage::putFileAs('public/data_file/file_order_dokumen', $request->file('path_file'), $nama_dokumen);

    //         $order_dokumen=Order::create([
    //             'id_klien'=>$klien->id_klien,
    //             'jenis_layanan'=>$jenis_layanan,
    //             'durasi_pengerjaan'=>$durasi,
    //             'nama_dokumen'=>$nama_dokumen,
    //             'path_file'=>$path_template,
    //             'ekstensi'=>$ext_template,
    //             'size'=>$size_template,
    //             'tgl_order'=>Carbon::now()->timestamp,
    //             'is_status'=>'belum dibayar',
    //         ]);

    //         return redirect('/show-order-dokumen')->with('success', 'Berhasil di upload!');
    //     } else {
    //         return redirect('/show-order-dokumen')->with('warning', 'Form tidak valid!');
    //     }
    // }

    // public function showOrderDokumen(Klien $id_klien, Order $order){
    //     $user=Auth::user();
    //     $klien=Klien::where('id', $user->id)->first();
    //     $order=Order::all();
    //     //return ($klien);
    //     return view('pages.klien.ShowOrderDokumen', compact('order', 'user', 'klien'));
    // }

    // public function updateDokumen(Request $request, Order $id_order){
    //     $this->validate($request, [
    //         'jenis_layanan'=>'required',
    //         'durasi_pengerjaan'=>'required',
    //         'nama_dokumen'=>'required',
    //         'path_file'=>'required|file|max:10000',
    //     ]);

    //     //$order=Order::find($id_order);
    //     Order::where('id_order', $id_order->id_order)
    //         ->update([
    //             'jenis_layanan'=>$request->jenis_layanan, 
    //             'durasi_pengerjaan'=>$request->durasi_pengerjaan,
    //             'nama_dokumen'=>$request->nama_dokumen,
    //             'path_file'=>$request->path_file,
    //         ]);
            
    //         return redirect('/show-order-dokumen')->with('success', 'Berhasil di update!');
    //     }
    

    // public function deleteOrderDokumen(Order $order){
    //     Order::destroy($order->id_order);
    //     return redirect('/order-dokumen')->with('success', 'Data harga berhasil dihapus');
    // }


    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $user=Auth::user();
    //     $klien=Klien::where('id_klien', $user->id)->first();
    //     Order::create([
    //         'id_klien'=>$klien->id_klien,
    //         'jenis_layanan'=>$request->jenis_layanan, 
    //         'text'=>$request->text
    //     ]);
    //     return redirect(route('menu-order.index'))->with('success', 'Data berhasil ditambahkan');
    // }
    

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // function show($id)
    // {
    //     //
    // }

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

    public function listKeranjang(){
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $list_order=Order::where('id_klien', $klien->id_klien)->with('transaksi')
                    ->get();
        // $trans=$status[2];
        // return ($status);exit();
        return view('pages.klien.list_keranjang', compact('list_order', 'user', 'klien'));
    }

}
