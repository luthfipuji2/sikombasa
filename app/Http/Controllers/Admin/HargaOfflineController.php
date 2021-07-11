<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Harga;
use App\Models\Klien\ParameterOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaOfflineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offline = DB::table('parameter_order')
        ->whereNotNull('p_durasi_pertemuan')
        ->get();
        return view('pages.admin.HargaOffline', compact('offline'));
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
        $this->validate($request,[
            'p_jenis_layanan' => 'required',
            'p_durasi_pertemuan' => 'required',
            'p_harga' => 'required|integer'
        ]);

        ParameterOrder::create([
            'p_jenis_layanan' => $request->p_jenis_layanan,
            'p_durasi_pertemuan' => $request->p_durasi_pertemuan,
            'p_harga' => $request->p_harga
        ]);

        return redirect('/daftar-harga-offline')->with('success', 'Parameter menu offline berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id_parameter_order)
    {
        $this->validate($request,[
            'p_jenis_layanan' => 'required',
            'p_durasi_pertemuan' => 'required',
            'p_harga' => 'required'
        ]);

        $harga = ParameterOrder::find($id_parameter_order);
        
        ParameterOrder::where('id_parameter_order', $harga->id_parameter_order)
                    ->update([
                        'p_jenis_layanan' => $request->p_jenis_layanan,
                        'p_durasi_pertemuan' => $request->p_durasi_pertemuan,
                        'p_harga' => $request->p_harga
                    ]);
        return redirect('/daftar-harga-offline')->with('success', 'Parameter menu offline berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParameterOrder $harga)
    {
        ParameterOrder::destroy($harga->id_parameter_order);
        return redirect('/daftar-harga-offline')->with('success', 'Parameter menu offline berhasil dihapus');
    }
}
