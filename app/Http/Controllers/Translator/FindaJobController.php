<?php

namespace App\Http\Controllers\Translator;

use App\Http\Controllers\Controller;
// use App\User;
use App\Models\Klien\Order;
// use App\Models\Klien\Klien;
// use App\Models\Klien\ParameterOrder;
use App\Models\Admin\Transaksi;
use App\Models\Translator\Translator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;



class FindaJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // $id_user = $user->id;

        $translator=Translator::
        join('users', 'users.id', '=', 'translator.id')
        ->where('users.id',$user->id)
        // ->join('order','order.id_translator','=','translator.id_translator')
        // ->whereNull('translator.id_translator')
        // ->join('transaksi','order.id_order','=','transaksi.id_order')
        ->get();

        // $order=Order::all();
        // $id_order=$order->id_order;

        $find = Transaksi::where('status_transaksi', 'Berhasil')
            ->join('order', 'transaksi.id_order', '=', 'order.id_order')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'users.id', '=', 'klien.id')
            ->join('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
            // ->join('parameter_dubber', 'order.id_parameter_dubber', '=', 
            //         'parameter_dubber.id_parameter_dubber')
            // ->join('parameter_jenis_layanan', 'order.id_parameter_jenis_layanan', '=', 
            //         'parameter_jenis_layanan.id_parameter_jenis_layanan')
            // ->join('parameter_jenis_teks', 'order.id_parameter_jenis_teks', '=', 
            //         'parameter_jenis_teks.id_parameter_jenis_teks')
            // ->join('parameter_order_dokumen', 'order.id_parameter_order_dokumen', '=', 
            //         'parameter_order_dokumen.id_parameter_order_dokumen')
            // ->join('parameter_order_dubbing', 'order.id_parameter_order_dubbing', '=', 
            //         'parameter_order_dubbing.id_parameter_order_dubbing')
            // ->join('parameter_order_subtitle', 'order.id_parameter_order_subtitle', '=', 
            //         'parameter_order_subtitle.id_parameter_order_subtitle')
            // ->join('parameter_order_teks', 'order.id_parameter_order_teks', '=', 
            //         'parameter_order_teks.id_parameter_order_teks')
            // ->join('translator', 'order.id_translator', '=', 'translator.id_translator')
            // ->join('users', 'users.id', '=', 'translator.id')
            ->get();

        // $data = DB::table('translator') //join tabel users dan translator di mana antara id users dan translator adalah sama
        //     ->leftJoin('order', 'translator.id_translator', '=', 'order.id_translator')
        //     ->select('translator.id_translator','order.id_order')
        //     ->get();//load data

        return view('pages.translator.find', (compact('find','user')));
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
    public function store(Request $request)
    {
        //
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request,Order $id_order)
    { 
        $this->validate($request,[
            'id_translator' => 'required',
        ]);

        $n=Order::find($id_order);

            Order::where('id_order',$n->id_order)
            ->update([
                'id_translator' => $request->id_translator,
            ]);
        
        

        // $order=Order::find($request->id_order);
        // if(empty($request->id_translator)){
        // $order->id_translator=$request->id_translator;
        // $order->save();

        return redirect('/find-a-job')->with('success', 'Order berhasil diambil');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
