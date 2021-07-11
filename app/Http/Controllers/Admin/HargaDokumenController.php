<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Harga;
use App\Models\Admin\ParameterOrderDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = DB::table('parameter_order_dokumen')
        ->get();
        return view('pages.admin.HargaDokumen', compact('dokumen'));
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
            'jumlah_halaman_min' => 'required|integer',
            'jumlah_halaman_max' => 'required|integer',
            'harga' => 'required|integer'
        ]);
        
        if($request->jumlah_halaman_min < $request->jumlah_halaman_max)
        {
            ParameterOrderDokumen::create([
                'jumlah_halaman_min' => $request->jumlah_halaman_min,
                'jumlah_halaman_max' => $request->jumlah_halaman_max,
                'harga' => $request->harga
            ]);
            return redirect('/daftar-harga-dokumen')->with('success', 'Parameter harga dokumen berhasil ditambahkan');
        }
        else
        {
            return redirect('/daftar-harga-dokumen')->with('failed', 'Parameter harga dokumen gagal ditambahkan, cek kembali data Anda!');
        }
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
    public function update(Request $request, $id_parameter_order_dokumen)
    {
        $this->validate($request,[
            'jumlah_halaman_min' => 'required|integer',
            'jumlah_halaman_max' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        $dokumen = ParameterOrderDokumen::find($id_parameter_order_dokumen);
        
        if($request->jumlah_halaman_min < $request->jumlah_halaman_max)
        {
            ParameterOrderDokumen::where('id_parameter_order_dokumen', $dokumen->id_parameter_order_dokumen)
                    ->update([
                        'jumlah_halaman_min' => $request->jumlah_halaman_min,
                        'jumlah_halaman_max' => $request->jumlah_halaman_max,
                        'harga' => $request->harga
                    ]);
            return redirect('/daftar-harga-dokumen')->with('success', 'Parameter harga dokumen berhasil diubah');
        }
        else
        {
            return redirect('/daftar-harga-dokumen')->with('failed', 'Parameter harga dokumen gagal diubah, cek kembali data Anda!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParameterOrderDokumen $harga)
    {
        ParameterOrderDokumen::destroy($harga->id_parameter_order_dokumen);
        return redirect('/daftar-harga-dokumen')->with('success', 'Parameter harga dokumen berhasil dihapus');
    }
}
