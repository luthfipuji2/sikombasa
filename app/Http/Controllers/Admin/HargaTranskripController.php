<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Harga;
use App\Models\Admin\HistoryHarga;
use App\Models\Klien\ParameterOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaTranskripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transkrip = DB::table('parameter_order')
        ->whereNull('p_durasi_pertemuan')
        ->get();

        $riwayat = HistoryHarga::where('jenis_parameter', 'Transkrip')->get();

        return view('pages.admin.HargaTranskrip', compact('transkrip', 'riwayat'));
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
            'p_durasi_audio' => 'required',
            'p_jenis_layanan'=>'required',
            'p_harga' => 'required'
        ]);
        
        // if($request->min_durasi_audio < $request->max_durasi_audio)
        // {
            ParameterOrder::create([
                'p_durasi_audio' => $request->p_durasi_audio,
                'p_jenis_layanan' => $request->p_jenis_layanan,
                'p_harga' => $request->p_harga
            ]);

            $id = DB::getPdo()->lastInsertId();;

            HistoryHarga::create([
                'id_parameter_order' => $id,
                'jenis_parameter' => 'Transkrip',
                'harga_perubahan' => $request->p_harga,
                'deskripsi' => 'Harga awal'
            ]);

            return redirect('/daftar-harga-transkrip')->with('success', 'Parameter harga transkrip berhasil diubah');
        // }
        // else
        // {
        //     return redirect('/daftar-harga-transkrip')->with('failed', 'Parameter harga transkrip gagal diubah, cek kembali data Anda!');
        // }
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
            'p_durasi_audio' => 'required',
            'p_jenis_layanan'=>'required',
            'p_harga' => 'required',
            'deskripsi' => 'required'
        ]);

        $transkrip = ParameterOrder::find($id_parameter_order);
        
        // if($request->min_durasi_audio < $request->max_durasi_audio)
        // {
            ParameterOrder::where('id_parameter_order', $transkrip->id_parameter_order)
                    ->update([
                        'p_durasi_audio' => $request->p_durasi_audio,
                        'p_jenis_layanan' => $request->p_jenis_layanan,
                        'p_harga' => $request->p_harga
                    ]);

                    HistoryHarga::create([
                        'id_parameter_order' => $request->id_transkrip,
                        'jenis_parameter' => 'Transkrip',
                        'harga_perubahan' => $request->p_harga,
                        'deskripsi' => $request->deskripsi
                    ]);
            return redirect('/daftar-harga-transkrip')->with('success', 'Parameter harga transkrip berhasil diubah');
        // }
        // else
        // {
        //     return redirect('/daftar-harga-transkrip')->with('failed', 'Parameter harga transkrip gagal diubah, cek kembali data Anda!');
        // }
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
        return redirect('/daftar-harga-transkrip')->with('success', 'Parameter transkrip berhasil dihapus');
    }
}
