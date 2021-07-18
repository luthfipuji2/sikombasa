<?php

namespace App\Http\Controllers\Translator;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Models\Klien\ParameterOrder;
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
        $translator = Translator::where('id', $user->id)->first();

        $detail = Transaksi::where('status_transaksi', 'Berhasil')
        ->rightJoin('order', 'transaksi.id_order', '=', 'order.id_order')
        ->whereNull('id_translator')
        ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        ->join('users', 'users.id', '=', 'klien.id')
        ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
        ->leftJoin('parameter_dubber', 'order.id_parameter_dubber', '=', 
                'parameter_dubber.id_parameter_dubber')
        ->leftJoin('parameter_jenis_layanan', 'order.id_parameter_jenis_layanan', '=', 
                'parameter_jenis_layanan.id_parameter_jenis_layanan')
        ->leftJoin('parameter_jenis_teks', 'order.id_parameter_jenis_teks', '=', 
                'parameter_jenis_teks.id_parameter_jenis_teks')
        ->leftJoin('parameter_order_dokumen', 'order.id_parameter_order_dokumen', '=', 
                'parameter_order_dokumen.id_parameter_order_dokumen')
        ->leftJoin('parameter_order_dubbing', 'order.id_parameter_order_dubbing', '=', 
                'parameter_order_dubbing.id_parameter_order_dubbing')
        ->leftJoin('parameter_order_subtitle', 'order.id_parameter_order_subtitle', '=', 
                'parameter_order_subtitle.id_parameter_order_subtitle')
        ->leftJoin('parameter_order_teks', 'order.id_parameter_order_teks', '=', 
                'parameter_order_teks.id_parameter_order_teks')
        ->orderBy('order.id_order')
        ->get();
        

        return view('pages.translator.find', (compact('user','translator','detail')));
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

    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $user = Auth::user();
        $translator = Translator::where('id', $user->id)->first();

        $detail = Transaksi::where('status_transaksi', 'Berhasil')
        ->join('order', 'transaksi.id_order', '=', 'order.id_order')
        ->whereNull('id_translator')
        ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        ->join('users', 'users.id', '=', 'klien.id')
        ->join('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
        ->leftJoin('parameter_dubber', 'order.id_parameter_dubber', '=', 
                'parameter_dubber.id_parameter_dubber')
        ->leftJoin('parameter_jenis_layanan', 'order.id_parameter_jenis_layanan', '=', 
                'parameter_jenis_layanan.id_parameter_jenis_layanan')
        ->leftJoin('parameter_jenis_teks', 'order.id_parameter_jenis_teks', '=', 
                'parameter_jenis_teks.id_parameter_jenis_teks')
        ->leftJoin('parameter_order_dokumen', 'order.id_parameter_order_dokumen', '=', 
                'parameter_order_dokumen.id_parameter_order_dokumen')
        ->leftJoin('parameter_order_dubbing', 'order.id_parameter_order_dubbing', '=', 
                'parameter_order_dubbing.id_parameter_order_dubbing')
        ->leftJoin('parameter_order_subtitle', 'order.id_parameter_order_subtitle', '=', 
                'parameter_order_subtitle.id_parameter_order_subtitle')
        ->leftJoin('parameter_order_teks', 'order.id_parameter_order_teks', '=', 
                'parameter_order_teks.id_parameter_order_teks')
        ->get();

        return view('pages.translator.find', (compact('user','translator','detail')));
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
    public function update(Request $request, $id_order)
    { 
        $user = Auth::user();
        $translator = Translator::where('id', $user->id)->first();

        $this->validate($request, [
                'id_translator' => 'required'
        ]);
        
        $order=Order::findOrFail($id_order);
                
        Order::where('id_order', $id_order)
                ->update([
                'id_translator' => $request-> id_translator
        ]);
        
        return redirect('/find-a-job')->with('success', 'Order berhasil diambil');

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
