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
use Illuminate\Support\Facades\DB;
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
        $menu=Order::with('parameter_order');

        $basic = ParameterOrder::where('p_jenis_layanan', 'Basic')
        ->whereNotNull('p_durasi_pertemuan')
        ->orderBy('p_durasi_pertemuan')
        ->get();

        $premium = ParameterOrder::where('p_jenis_layanan', 'Premium')
        ->whereNotNull('p_durasi_pertemuan')
        ->orderBy('p_durasi_pertemuan')
        ->get();
        
        return view('pages.klien.order.order_interpreter.index',compact('menu', 'basic', 'premium')); 
    }     

    public function create()
    {
        //
    }

    public function store(Request $request, Order $order_interpreter)
    {
        if(!empty($request->id_parameter_order && $request->p_jenis_layanan) && empty($request->id_parameter_order2 && $request->p_jenis_layanan2)){
            $validate_data=$request->validate([
                'tipe_offline'=>'required',
                'lokasi'=>'required',
                'longitude'=>'required',
                'latitude'=>'required',
                'tanggal_pertemuan'=> 'required',
                'waktu_pertemuan'=>'required',
            ]);
            $tipe_offline = $validate_data['tipe_offline'];
            $lokasi = $validate_data['lokasi'];
            $longitude = $validate_data['longitude'];
            $latitude = $validate_data['latitude'];
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();
            $tgl_order=Carbon::now();

            $order_interpreter=Order::create([
                'id_klien'=>$klien->id_klien,
                'id_parameter_order' => $request->id_parameter_order,
                'jenis_layanan' => $request->p_jenis_layanan,
                'tipe_offline'=>$request->tipe_offline,
                'lokasi'=>$request->lokasi,
                'longitude'=>$request->longitude,
                'latitude'=>$request->latitude,
                'jarak'=>$request->jarak,
                'tanggal_pertemuan'=> $request->tanggal_pertemuan,
                'waktu_pertemuan'=> $request->waktu_pertemuan,
                'is_status'=>$request->status_transaksi,
                'tgl_order'=>$tgl_order,
                'menu'=>'Interpreter'
            ]);
        };

       if(!empty($request->id_parameter_order2 && $request->p_jenis_layanan2) && empty($request->id_parameter_order && $request->p_jenis_layanan)){
            $validate_data=$request->validate([
                'tipe_offline'=>'required',
                'lokasi'=>'required',
                'longitude'=>'required',
                'latitude'=>'required',
                'tanggal_pertemuan'=> 'required',
                'waktu_pertemuan'=>'required',
            ]);
            $lokasi = $validate_data['lokasi'];
            $longitude = $validate_data['longitude'];
            $latitude = $validate_data['latitude'];
            $tipe_offline = $validate_data['tipe_offline'];
            $user=Auth::user();
            $klien=Klien::where('id', $user->id)->first();
            $tgl_order=Carbon::now();

            $order_interpreter=Order::create([
            
                'id_klien'=>$klien->id_klien,
                'id_parameter_order' => $request->id_parameter_order2,
                'jenis_layanan' => $request->p_jenis_layanan2,
                'tipe_offline'=>$request->tipe_offline,
                'lokasi'=>$request->lokasi,
                'longitude'=>$request->longitude,
                'latitude'=>$request->latitude,
                'jarak'=>$request->jarak,
                'tanggal_pertemuan'=> $request->tanggal_pertemuan,
                'waktu_pertemuan'=> $request->waktu_pertemuan,
                'tgl_order'=>$tgl_order,
                'menu'=>'Interpreter',
            ]);
        };

        $id_order=$order_interpreter->id_order;
        return redirect(route('order-interpreter.show', $id_order))->with('success', 'Data Order Anda Berhasil Tersimpan');
    } 
    

    public function show($id_order)
    {
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();

        $order=Order::findOrFail($id_order);

        $basic = ParameterOrder::where('p_jenis_layanan', 'Basic')
        ->whereNotNull('p_durasi_pertemuan')
        ->orderBy('p_durasi_pertemuan')
        ->get();

        $premium = ParameterOrder::where('p_jenis_layanan', 'Premium')
        ->whereNotNull('p_durasi_pertemuan')
        ->orderBy('p_durasi_pertemuan')
        ->get();

        return view('pages.klien.order.order_interpreter.show', compact('order', 'user', 'klien','basic', 'premium'));
    }

    
    function edit($id)
    {
        //
    }

    public function update(Request $request, $id_order)
    {
        if(!empty($request->id_parameter_order && $request->p_jenis_layanan) && empty($request->id_parameter_order2 && $request->p_jenis_layanan2)){
            $order=Order::findOrFail($id_order);

            Order::where('id_order', $id_order)
                ->update([
                    'id_parameter_order'=>$request->id_parameter_order,
                    'jenis_layanan' => $request->p_jenis_layanan,
                    'tipe_offline'=>$request->tipe_offline,
                    'durasi_pertemuan'=>$request->durasi_pertemuan,
                    'tipe_offline'=>$request->tipe_offline,
                    'lokasi'=>$request->lokasi,
                    'longitude'=>$request->longitude,
                    'latitude'=>$request->latitude,
                    'jarak'=>$request->jarak,
                    'tanggal_pertemuan'=>$request->tanggal_pertemuan,
                    'waktu_pertemuan'=>$request->waktu_pertemuan,
                ]);
        };

        if(!empty($request->id_parameter_order2 && $request->p_jenis_layanan2) && empty($request->id_parameter_order && $request->p_jenis_layanan)){
            $order=Order::findOrFail($id_order);

            Order::where('id_order', $id_order)
                ->update([
                    'id_parameter_order'=>$request->id_parameter_order2,
                    'jenis_layanan' => $request->p_jenis_layanan2,
                    'tipe_offline'=>$request->tipe_offline,
                    'lokasi'=>$request->lokasi,
                    'longitude'=>$request->longitude,
                    'latitude'=>$request->latitude,
                    'jarak'=>$request->jarak,
                    'tanggal_pertemuan'=>$request->tanggal_pertemuan,
                    'waktu_pertemuan'=>$request->waktu_pertemuan,
                ]);
        };
        return redirect(route('order-interpreter.show', $id_order))->with('success', 'Data Order Anda Berhasil Di Edit');
    }

    
    function destroy($id_order)
    {
        Order::destroy($id_order);
        return redirect(route('order-interpreter.index'))->with('success','Data Order Anda berhasil di hapus');

    }

}
