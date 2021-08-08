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

class HargaTeksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Harga $h)
    {
        $harga = DB::table('parameter_order_teks')
        ->orderBy('jumlah_karakter_min')
        ->get();

        $jenis = DB::table('parameter_jenis_teks')
        ->get();

        $teks = HistoryHarga::where('jenis_parameter', 'Teks')->get();

        return view('pages.admin.HargaTeks', compact('harga', 'jenis', 'teks'));
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
            'jumlah_karakter_min' => 'required',
            'jumlah_karakter_max' => 'required',
            'harga' => 'required|integer'
        ]);

        if($request->jumlah_karakter_min < $request->jumlah_karakter_max){
            ParameterOrderTeks::create([
                'jumlah_karakter_min' => $request->jumlah_karakter_min,
                'jumlah_karakter_max' => $request->jumlah_karakter_max,
                'harga' => $request->harga
            ]);

            $id = DB::getPdo()->lastInsertId();;

            HistoryHarga::create([
                'id_parameter_order_teks' => $id,
                'jenis_parameter' => 'Teks',
                'harga_perubahan' => $request->harga,
                'deskripsi' => 'Harga awal'
            ]);
            return redirect('/daftar-harga-teks')->with('success', 'Parameter jumlah kata berhasil ditambahkan');
        }
        else {
            return redirect('/daftar-harga-teks')->with('failed', 'Parameter jumlah kata gagal ditambahkan');
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
    public function update(Request $request, $id_parameter_order_teks)
    {
        $this->validate($request,[
            'jumlah_karakter_min' => 'required|integer',
            'jumlah_karakter_max' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        $harga = ParameterOrderTeks::find($id_parameter_order_teks);

        if($request->jumlah_karakter_min < $request->jumlah_karakter_max){
                    ParameterOrderTeks::where('id_parameter_order_teks', $harga->id_parameter_order_teks)
                    ->update([
                        'jumlah_karakter_min' => $request->jumlah_karakter_min,
                        'jumlah_karakter_max' => $request->jumlah_karakter_max,
                        'harga' => $request->harga
                    ]);

                    HistoryHarga::create([
                        'id_parameter_order_teks' => $request->id_teks,
                        'jenis_parameter' => 'Teks',
                        'harga_perubahan' => $request->harga,
                        'deskripsi' => $request->deskripsi
                    ]);
            return redirect('/daftar-harga-teks')->with('success', 'Parameter jumlah kata berhasil diubah');
        }
        else{
            return redirect('/daftar-harga-teks')->with('failed', 'Parameter jumlah kata gagal diubah');
        }
        
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParameterOrderTeks $kata)
    {
        ParameterOrderTeks::destroy($kata->id_parameter_order_teks);
        return redirect('/daftar-harga-teks')->with('success', 'Parameter jumlah kata berhasil dihapus');
    }

    
}
