<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Harga;
use App\Models\Admin\HistoryHarga;
use App\Models\Admin\ParameterDubber;
use App\Models\Admin\ParameterOrderDubbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Param;

class HargaDubbingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dubbing = DB::table('parameter_order_dubbing')
        ->get();

        $dubber = DB::table('parameter_dubber')
        ->get();

        $riwayat_dubbing = HistoryHarga::where('jenis_parameter', 'Dubbing')->get();

        $riwayat_dubber = HistoryHarga::where('jenis_parameter', 'Dubber')->get();

        return view('pages.admin.HargaDubbing', compact('dubbing', 'dubber', 'riwayat_dubbing', 'riwayat_dubber'));
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
            ParameterOrderDubbing::create([
                'durasi_video_min' => $request->durasi_video_min,
                'durasi_video_max' => $request->durasi_video_max,
                'harga' => $request->harga
            ]);

            $id = DB::getPdo()->lastInsertId();;

            HistoryHarga::create([
                'id_parameter_order_dubbing' => $id,
                'jenis_parameter' => 'Dubbing',
                'harga_perubahan' => $request->harga,
                'deskripsi' => 'Harga awal'
            ]);
            return redirect('/daftar-harga-dubbing')->with('success', 'Parameter harga dubbing berhasil diubah');
        }
        else
        {
            return redirect('/daftar-harga-dubbing')->with('failed', 'Parameter harga dubbing gagal diubah, cek kembali data Anda!');
        }
    }

    public function storeDubber(Request $request)
    {
        $this->validate($request,[
            'p_jumlah_dubber' => 'required',
            'harga_dubber' => 'required|integer'
        ]);

        if (ParameterDubber::where('p_jumlah_dubber', '=', $request->p_jumlah_dubber)->exists()) {
            return redirect('/daftar-harga-dubbing')->with('failed', 'Parameter jumlah dubber sudah ada');
        }
        ParameterDubber::create([
                        'p_jumlah_dubber' => $request->p_jumlah_dubber,
                        'harga' => $request->harga_dubber
                    ]);

            $id = DB::getPdo()->lastInsertId();;

            HistoryHarga::create([
                'id_parameter_dubber' => $id,
                'jenis_parameter' => 'Dubber',
                'harga_perubahan' => $request->harga_dubber,
                'deskripsi' => 'Harga awal'
            ]);
        return redirect('/daftar-harga-dubbing')->with('success', 'Parameter dubber berhasil diubah');
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
    public function update(Request $request, $id_parameter_order_dubbing)
    {
        $this->validate($request,[
            'durasi_video_min' => 'required|integer',
            'durasi_video_max' => 'required|integer',
            'harga' => 'required|integer',
            'deskripsi' => 'required'
        ]);

        $dubbing = ParameterOrderDubbing::find($id_parameter_order_dubbing);
        
        if($request->durasi_video_min < $request->durasi_video_max)
        {
            ParameterOrderDubbing::where('id_parameter_order_dubbing', $dubbing->id_parameter_order_dubbing)
                    ->update([
                        'durasi_video_min' => $request->durasi_video_min,
                        'durasi_video_max' => $request->durasi_video_max,
                        'harga' => $request->harga
                    ]);

                    HistoryHarga::create([
                        'id_parameter_order_dubbing' => $request->id_dubbing,
                        'jenis_parameter' => 'Dubbing',
                        'harga_perubahan' => $request->harga,
                        'deskripsi' => $request->deskripsi
                    ]);
            return redirect('/daftar-harga-dubbing')->with('success', 'Parameter harga dubbing berhasil diubah');
        }
        else
        {
            return redirect('/daftar-harga-dubbing')->with('failed', 'Parameter harga dubbing gagal diubah, cek kembali data Anda!');
        }
    }

    public function updateDubber(Request $request, $id_parameter_dubber)
    {
        $this->validate($request,[
            'p_jumlah_dubber' => 'required',
            'harga_dubber' => 'required|integer',
            'deskripsi' => 'required'
        ]);

        $jenis = ParameterDubber::find($id_parameter_dubber);
        
                ParameterDubber::where('id_parameter_dubber', $jenis->id_parameter_dubber)
                    ->update([
                        'p_jumlah_dubber' => $request->p_jumlah_dubber,
                        'harga' => $request->harga_dubber
                    ]);

                    HistoryHarga::create([
                        'id_parameter_dubber' => $request->id_dubber,
                        'jenis_parameter' => 'Dubber',
                        'harga_perubahan' => $request->harga_dubber,
                        'deskripsi' => $request->deskripsi
                    ]);
        return redirect('/daftar-harga-dubbing')->with('success', 'Parameter dubber berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParameterOrderDubbing $harga)
    {
        ParameterOrderDubbing::destroy($harga->id_parameter_order_dubbing);
        return redirect('/daftar-harga-dubbing')->with('success', 'Parameter harga dubbing berhasil dihapus');
    }

    public function destroyDubber(ParameterDubber $dubber)
    {
        ParameterDubber::destroy($dubber->id_parameter_dubber);
        return redirect('/daftar-harga-dubbing')->with('success', 'Parameter jumlah dubber berhasil dihapus');
    }
}
