<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DistribusiFee;
use App\Models\Admin\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistribusiFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fee = Transaksi::where('status_transaksi', 'Berhasil')
            ->leftJoin('distribusi_fee', 'transaksi.id_transaksi', '=', 'distribusi_fee.id__transaksi')
            ->get();

        // $fee = DB::table('distribusi_fee')
            
        //     ->first();

        return view('pages.admin.DistribusiFee',  compact('fee'));
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
            'fee_translator' => 'required|integer',
            'fee_sistem' => 'required|integer'
        ]);

        if ($request->fee_translator + $request->fee_sistem == $request->nominal_transaksi){
            DistribusiFee::create([
                'id__transaksi'     => $request->id_transaksi,
                'fee_translator'    => $request->fee_translator,
                'fee_sistem'        => $request->fee_sistem,
            ]);
    
            return redirect('/distribusi-fee')->with('success', 'Nominal fee berhasil ditambahkan');
        }
        elseif ($request->fee_translator + $request->fee_sistem != $request->nominal_transaksi) {
            return redirect('/distribusi-fee')->with('failed', 'Pembagian fee tidak sesuai');
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
    public function update(Request $request, $id_transaksi)
    {
        $this->validate($request,[
            'fee_translator' => 'required|integer',
            'fee_sistem' => 'required|integer'
        ]);

        $t = Transaksi::find($id_transaksi);

        if ($request->fee_translator + $request->fee_sistem == $request->nominal_transaksi){
            DistribusiFee::where('id__transaksi', $t->id_transaksi)
                    ->update([
                        'fee_translator'    => $request->fee_translator,
                        'fee_sistem'        => $request->fee_sistem,
                    ]);

            return redirect('/distribusi-fee')->with('success', 'Nominal fee berhasil diubah');
        }
        elseif ($request->fee_translator + $request->fee_sistem != $request->nominal_transaksi) {
            return redirect('/distribusi-fee')->with('failed', 'Pembagian fee tidak sesuai');
        }
        
        
        
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
