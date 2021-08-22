<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Harga;
use App\Models\Admin\HistoryHarga;
use App\Models\Admin\ParameterJenisLayanan;
use App\Models\Admin\ParameterJenisTeks;
use App\Models\Admin\ParameterOrderTeks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class HargaTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Harga $h)
    {
        $layanan = DB::table('parameter_jenis_layanan')
        ->get();

        $jenis = DB::table('parameter_jenis_teks')
        ->get();

        $riwayat_layanan = HistoryHarga::where('jenis_parameter', 'Jenis Layanan')->get();

        $riwayat_jenis = HistoryHarga::where('jenis_parameter', 'Jenis Teks')->get();

        return view('pages.admin.HargaTambahan', compact('layanan', 'jenis', 'riwayat_layanan', 'riwayat_jenis'));
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
            'harga' => 'required|integer'
        ]);

     
                ParameterJenisLayanan::create([
                    'p_jenis_layanan' => $request->p_jenis_layanan,
                    'harga' => $request->harga
                ]);

                $id = DB::getPdo()->lastInsertId();;

                HistoryHarga::create([
                    'id_parameter_jenis_layanan' => $id,
                    'jenis_parameter' => 'Jenis Layanan',
                    'harga_perubahan' => $request->harga,
                    'deskripsi' => 'Harga awal'
                ]);

                return redirect('/daftar-harga-tambahan')->with('success', 'Parameter jenis layanan berhasil ditambahkan');
            
    }

    public function storeJenis(Request $request)
    {
        $this->validate($request,[
            'p_jenis_teks' => 'required',
            'harga_jenis' => 'required|integer'
        ]);

        if (ParameterJenisTeks::where('p_jenis_teks', '=', $request->p_jenis_teks)->exists()) {
            return redirect('/daftar-harga-tambahan')->with('failed', 'Parameter jenis teks sudah ada');
        }
        else{
            ParameterJenisTeks::create([
                'p_jenis_teks' => $request->p_jenis_teks,
                'harga' => $request->harga_jenis
            ]);

            $id = DB::getPdo()->lastInsertId();;

            HistoryHarga::create([
                'id_parameter_jenis_teks' => $id,
                'jenis_parameter' => 'Jenis Teks',
                'harga_perubahan' => $request->harga_jenis,
                'deskripsi' => 'Harga awal'
            ]);
            return redirect('/daftar-harga-tambahan')->with('success', 'Parameter jenis teks berhasil ditambahkan');
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
    public function update(Request $request, $id_parameter_jenis_layanan)
    {
        $this->validate($request,[
            'p_jenis_layanan' => 'required',
            'harga' => 'required|integer',
            'deskripsi' => 'required'
        ]);

        $harga = ParameterJenisLayanan::find($id_parameter_jenis_layanan);
        
        ParameterJenisLayanan::where('id_parameter_jenis_layanan', $harga->id_parameter_jenis_layanan)
                    ->update([
                        'p_jenis_layanan' => $request->p_jenis_layanan,
                        'harga' => $request->harga
                    ]);

                    HistoryHarga::create([
                        'id_parameter_jenis_layanan' => $request->id_layanan,
                        'jenis_parameter' => 'Jenis Layanan',
                        'harga_perubahan' => $request->harga,
                        'deskripsi' => $request->deskripsi
                    ]);

        return redirect('/daftar-harga-tambahan')->with('success', 'Parameter jenis layanan berhasil diubah');
    }

    public function updateJenis(Request $request, $id_parameter_jenis_teks)
    {
        $this->validate($request,[
            'p_jenis_teks' => 'required',
            'harga_jenis' => 'required|integer',
            'deskripsi' => 'required'
        ]);

        $jenis = ParameterJenisTeks::find($id_parameter_jenis_teks);
        
        ParameterJenisTeks::where('id_parameter_jenis_teks', $jenis->id_parameter_jenis_teks)
                    ->update([
                        'p_jenis_teks' => $request->p_jenis_teks,
                        'harga' => $request->harga_jenis
                    ]);

                    HistoryHarga::create([
                        'id_parameter_jenis_teks' => $request->id_jenis_teks,
                        'jenis_parameter' => 'Jenis Teks',
                        'harga_perubahan' => $request->harga_jenis,
                        'deskripsi' => $request->deskripsi
                    ]);

        return redirect('/daftar-harga-tambahan')->with('success', 'Parameter jenis teks berhasil diubah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParameterJenisLayanan $harga)
    {
        ParameterJenisLayanan::destroy($harga->id_parameter_jenis_layanan);
        return redirect('/daftar-harga-tambahan')->with('success', 'Parameter jenis layanan berhasil dihapus');
    }

    public function destroyJenis(ParameterJenisTeks $jenis)
    {
        ParameterJenisTeks::destroy($jenis->id_parameter_jenis_teks);
        return redirect('/daftar-harga-tambahan')->with('success', 'Parameter jenis teks berhasil dihapus');
    }
}
