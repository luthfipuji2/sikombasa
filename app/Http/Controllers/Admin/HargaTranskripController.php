<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Harga;
use App\Models\Admin\ParameterOrderAudio;
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
        $transkrip = DB::table('parameter_order_audio')
        ->get();
        return view('pages.admin.HargaTranskrip', ['transkrip' => $transkrip]);
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
            'min_durasi_audio' => 'required|integer',
            'max_durasi_audio' => 'required|integer',
            'harga' => 'required|integer'
        ]);
        
        if($request->min_durasi_audio < $request->max_durasi_audio)
        {
            ParameterOrderAudio::create([
                'min_durasi_audio' => $request->min_durasi_audio,
                'max_durasi_audio' => $request->max_durasi_audio,
                'harga' => $request->harga
            ]);
            return redirect('/daftar-harga-transkrip')->with('success', 'Parameter harga transkrip berhasil diubah');
        }
        else
        {
            return redirect('/daftar-harga-transkrip')->with('failed', 'Parameter harga transkrip gagal diubah, cek kembali data Anda!');
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
    public function update(Request $request, $id_parameter_order_audio)
    {
        $this->validate($request,[
            'min_durasi_audio' => 'required|integer',
            'max_durasi_audio' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        $transkrip = ParameterOrderAudio::find($id_parameter_order_audio);
        
        if($request->min_durasi_audio < $request->max_durasi_audio)
        {
            ParameterOrderAudio::where('id_parameter_order_audio', $transkrip->id_parameter_order_audio)
                    ->update([
                        'min_durasi_audio' => $request->min_durasi_audio,
                        'max_durasi_audio' => $request->max_durasi_audio,
                        'harga' => $request->harga
                    ]);
            return redirect('/daftar-harga-transkrip')->with('success', 'Parameter harga transkrip berhasil diubah');
        }
        else
        {
            return redirect('/daftar-harga-transkrip')->with('failed', 'Parameter harga transkrip gagal diubah, cek kembali data Anda!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParameterOrderAudio $harga)
    {
        ParameterOrderAudio::destroy($harga->id_parameter_order_audio);
        return redirect('/daftar-harga-transkrip')->with('success', 'Parameter transkrip berhasil dihapus');
    }
}
