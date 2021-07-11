<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DistribusiFee;
use App\Models\Admin\Transaksi;
use App\Models\Klien\Order;
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
        ->join('order', 'order.id_order', '=', 'transaksi.id_order')
        ->leftJoin('revisi', 'order.id_order', '=', 'revisi.id_order')  
        ->orderBy('id_transaksi')
        ->get();
        
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

        if($request->hasFile('bukti_fee_trans') && $request->fee_translator + $request->fee_sistem == $request->nominal_transaksi){
            
            // $request->file('bukti_fee_trans')->move('images/',
            // $request->file('bukti_fee_trans')->getClientOriginalName()); //Memindahkan request photo ke folder image

            $bukti_fee_trans = $request->bukti_fee_trans;
            $nm_bukti = $bukti_fee_trans->getClientOriginalName();
            $bukti = $bukti_fee_trans->move(public_path().'/fee', $nm_bukti);


            DistribusiFee::create([
                'id__transaksi'     => $request->id_transaksi,
                'fee_translator'    => $request->fee_translator,
                'fee_sistem'        => $request->fee_sistem,
                'bukti_fee_trans'   => $nm_bukti
            ]);

            return redirect('/distribusi-fee')->with('success', 'Nominal fee berhasil ditambahkan');
        }

        // $bukti_fee_trans = $request->bukti_fee_trans;
        // $nm_bukti = $bukti_fee_trans->getClientOriginalName();
        // $bukti = $bukti_fee_trans->move(public_path().'/fee', $nm_bukti);

        elseif ($request->fee_translator + $request->fee_sistem == $request->nominal_transaksi){
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
    public function update(Request $request, $id_fee)
    {
        $this->validate($request,[
            'fee_translator' => 'required|integer',
            'fee_sistem' => 'required|integer'
        ]);

        $t = DistribusiFee::find($id_fee);

        if($request->hasFile('bukti_fee_trans') && $request->fee_translator + $request->fee_sistem == $request->nominal_transaksi){
            
            // $request->file('bukti_fee_trans')->move('images/',
            // $request->file('bukti_fee_trans')->getClientOriginalName()); //Memindahkan request photo ke folder image

            $bukti_fee_trans = $request->bukti_fee_trans;
            $nm_bukti = $bukti_fee_trans->getClientOriginalName();
            $bukti = $bukti_fee_trans->move(public_path().'/fee', $nm_bukti);

            DistribusiFee::where('id_fee', $t->id_fee)
            ->update([
                'bukti_fee_trans'   => $nm_bukti
            ]);
        }

        if ($request->fee_translator + $request->fee_sistem == $request->nominal_transaksi){
            DistribusiFee::where('id_fee', $t->id_fee)
                    ->update([
                        'fee_translator'    => $request->fee_translator,
                        'fee_sistem'        => $request->fee_sistem,
                        // 'bukti_fee_trans'    => $request->file('bukti_fee_trans')->getClientOriginalName()
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

    public function download($id_fee)
    {
        $dl = DistribusiFee::find($id_fee);

        $bukti_fee = $dl->bukti_fee_trans;

        $pathToFile = public_path('fee/').$bukti_fee;
        
        return response()->download($pathToFile);
    }
}
