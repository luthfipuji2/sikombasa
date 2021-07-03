<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\ParameterOrder;
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
        $menu=Order::with('parameter_order');
        $durasi_audio=ParameterOrder::all();
        return view('pages.klien.order.order_transkrip.index',compact('menu','durasi_audio')); 
    }
    
    public function create()
    {
        //
    }

   
    public function store(Request $request, Order $order_transkrip)
    {
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $durasi_audio=$request->durasi_audio;
        $jenis_layanan=$request->jenis_layanan;
        
        if($durasi_audio <= 300 && $jenis_layanan=="Basic"){
            $biaya="1";
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Basic"){
            $biaya="2";
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Basic"){
            $biaya='3';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Basic"){
            $biaya='4';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Basic"){
            $biaya='5';
        }
        elseif($durasi_audio <= 300 && $jenis_layanan=="Premium"){
            $biaya='6';
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Premium"){
            $biaya='7';
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Premium"){
            $biaya='8';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Premium"){
            $biaya='9';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Premium"){
            $biaya='10';
        }
            if($request->hasFile('path_file')){
                $validate_data = $request->validate([
                    'durasi_pengerjaan'=>'required',
                    'nama_dokumen'=>'required',
                    'path_file'=>'required|file',
                    'durasi_audio'=>'required',
                    'jenis_layanan'=>'required'
                ]);
                $durasi_audio = $validate_data['durasi_audio'];
                $user=Auth::user();
                $klien=Klien::where('id', $user->id)->first();
                $ext_template = $validate_data['path_file']->extension();
                $size_template = $validate_data['path_file']->getSize();
                $nama_dokumen = $validate_data['nama_dokumen'] . "." . $ext_template;
                $path_template = Storage::putFileAs('public/order_transkrip(audio)', $request->file('path_file'), $nama_dokumen);
                $durasi = $validate_data['durasi_pengerjaan'];
                $jenis_layanan = $validate_data['jenis_layanan'];

             
                $order_transkrip=Order::create([
                    'id_klien'=>$klien->id_klien,
                    'jenis_layanan' =>$request->jenis_layanan,
                    'id_parameter_order' =>$biaya,
                    'harga' =>$request->harga,
                    'durasi_pengerjaan'=>$durasi,
                    'nama_dokumen'=>$nama_dokumen,
                    'path_file'=>$path_template,
                    'durasi_audio'=>$request->durasi_audio,
                    'ekstensi'=>$ext_template,
                    'size'=>$size_template,
                    'tgl_order'=>Carbon::now()->timestamp,
                ]);

                
            };
                $id_order=$order_transkrip->id_order;
                return redirect(route('order-transkrip.show', $id_order))->with('success', 'Data Order Anda Berhasil Tersimpan');
    } 
    

    public function show($id_order)
    {
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $durasi_audio=ParameterOrder::all();
        $order=Order::findOrFail($id_order);
        
        return view('pages.klien.order.order_transkrip.show', compact('order', 'user', 'klien','durasi_audio'));
    }

    function edit($id)
    {
        //
    }

    public function update(Request $request, $id_order)
    {

        $order=Order::findOrFail($id_order);
        $durasi_audio=$request->durasi_audio;
        $jenis_layanan=$request->jenis_layanan;
        
        if($durasi_audio <= 300 && $jenis_layanan=="Basic"){
            $biaya="1";
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Basic"){
            $biaya="2";
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Basic"){
            $biaya='3';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Basic"){
            $biaya='4';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Basic"){
            $biaya='5';
        }
        elseif($durasi_audio <= 300 && $jenis_layanan=="Premium"){
            $biaya='6';
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Premium"){
            $biaya='7';
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Premium"){
            $biaya='8';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Premium"){
            $biaya='9';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Premium"){
            $biaya='10';
        }

        Order::where('id_order', $id_order)
        ->update([
            'jenis_layanan' =>$request->jenis_layanan,
            'durasi_pengerjaan'=>$request->durasi_pengerjaan,
            'nama_dokumen'=>$request->nama_dokumen,
            'path_file'=>$request->path_file,
            'durasi_audio'=>$request->durasi_audio,
            'id_parameter_order' =>$biaya,
            
        ]);
        return redirect(route('order-transkrip.show', $id_order))->with('success', 'Data Order Anda Berhasil Terupdate');
    }

    
    function destroy($id_order)
    {
        Order::destroy($id_order);
        return redirect(route('order-transkrip.index'))->with('success','Data Order Anda Berhasil Terhapus');
    }
}