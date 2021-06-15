<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\ParameterOrder;
use App\Models\Klien\SearchLocation ;
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
            'id_parameter_order'=>'required',
            'lokasi'=>'required',
            'longitude'=>'required',
            'latitude'=>'required',
            'tanggal_pertemuan'=> 'required',
            'waktu_pertemuan'=>'required',
        ]);
        // $id_parameter_order = $validate_data['id_parameter_order'];
        $lokasi = $validate_data['lokasi'];
        $longitude = $validate_data['longitude'];
        $latitude = $validate_data['latitude'];
        // $tanggal_pertemuan = $validate_data['tanggal_pertemuan'];
        // $waktu_pertemuan = $validate_data['waktu_pertemuan'];
        $user=Auth::user();
        $klien=Klien::where('id', $user->id)->first();
        $tgl_order=Carbon::now();
        // $parameterorder=ParameterOrder::where('id_parameter_order')->first();

        $order_interpreter=Order::create([
            
            'id_klien'=>$klien->id_klien,
            'id_parameter_order'=>$request->id_parameter_order, 
            'jenis_layanan'=> $request->p_jenis_layanan, 
            // 'durasi_pertemuan'=>$parameterorder->durasi_pertemuan,
            'lokasi'=>$lokasi,
            'longitude'=>$longitude,
            'latitude'=>$latitude,
            'tanggal_pertemuan'=> $request->tanggal_pertemuan,
            'waktu_pertemuan'=> $request->waktu_pertemuan,
            'is_status'=>'belum dibayar',
            'tgl_order'=>$tgl_order,
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
                'id_parameter_order'=>$request->id_parameter_order,
                'durasi_pertemuan'=>$request->durasi_pertemuan,
                'lokasi'=>$request->lokasi,
                'longitude'=>$request->longitude,
                'latitude'=>$request->latitude,
               'tanggal_pertemuan'=>$request->tanggal_pertemuan,
                'waktu_pertemuan'=>$request->waktu_pertemuan,
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
