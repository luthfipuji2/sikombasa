<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Harga;
use App\Models\Admin\HistoryHarga;
use App\Models\Admin\ParameterOrderSubtitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaSubtitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitle = DB::table('parameter_order_subtitle')
        ->get();

        $riwayat = HistoryHarga::where('jenis_parameter', 'Subtitle')->get();

        return view('pages.admin.HargaSubtitle', compact('subtitle', 'riwayat'));
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
            'durasi_video_min' => 'required|integer',
            'durasi_video_max' => 'required|integer',
            'harga' => 'required|integer'
        ]);
        
        if($request->durasi_video_min < $request->durasi_video_max)
        {
            ParameterOrderSubtitle::create([
                'durasi_video_min' => $request->durasi_video_min,
                'durasi_video_max' => $request->durasi_video_max,
                'harga' => $request->harga
            ]);

            $id = DB::getPdo()->lastInsertId();;

            HistoryHarga::create([
                'id_parameter_order_subtitle' => $id,
                'jenis_parameter' => 'Subtitle',
                'harga_perubahan' => $request->harga,
                'deskripsi' => 'Harga awal'
            ]);
            return redirect('/daftar-harga-subtitle')->with('success', 'Parameter harga subtitle berhasil diubah');
        }
        else
        {
            return redirect('/daftar-harga-subtitle')->with('failed', 'Parameter harga subtitle gagal diubah, cek kembali data Anda!');
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
    public function update(Request $request, $id_parameter_order_subtitle)
    {
        $this->validate($request,[
            'durasi_video_min' => 'required|integer',
            'durasi_video_max' => 'required|integer',
            'harga' => 'required|integer',
            'deskripsi' => 'required'
        ]);

        $subtitle = ParameterOrderSubtitle::find($id_parameter_order_subtitle);
        
        if($request->durasi_video_min < $request->durasi_video_max)
        {
            ParameterOrderSubtitle::where('id_parameter_order_subtitle', $subtitle->id_parameter_order_subtitle)
                    ->update([
                        'durasi_video_min' => $request->durasi_video_min,
                        'durasi_video_max' => $request->durasi_video_max,
                        'harga' => $request->harga
                    ]);

                    HistoryHarga::create([
                        'id_parameter_order_subtitle' => $request->id_subtitle,
                        'jenis_parameter' => 'Subtitle',
                        'harga_perubahan' => $request->harga,
                        'deskripsi' => $request->deskripsi
                    ]);

            return redirect('/daftar-harga-subtitle')->with('success', 'Parameter harga subtitle berhasil diubah');
        }
        else
        {
            return redirect('/daftar-harga-subtitle')->with('failed', 'Parameter harga subtitle gagal diubah, cek kembali data Anda!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParameterOrderSubtitle $harga)
    {
        ParameterOrderSubtitle::destroy($harga->id_parameter_order_subtitle);
        return redirect('/daftar-harga-subtitle')->with('success', 'Parameter harga subtitle berhasil dihapus');
    }
}
