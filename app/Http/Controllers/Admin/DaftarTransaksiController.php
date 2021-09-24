<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Transaksi;
use App\Models\Klien\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailOrder;

class DaftarTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = DB::table('transaksi')
            ->join('order', 'transaksi.id_order', '=', 'order.id_order')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'users.id', '=', 'klien.id')
            ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
            ->orderBy('id_transaksi', 'desc')
            ->get();
        return view('pages.admin.DaftarTransaksi',  ['transaksi' => $transaksi]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_transaksi)
    {
        $transaksi = Transaksi::find($id_transaksi);

        $detail = Transaksi::join('order', 'order.id_order', '=', 'transaksi.id_order')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'klien.id', '=', 'users.id')
            ->join('bank', 'bank.id_bank', '=', 'transaksi.id_bank')
            ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
            ->leftJoin('parameter_dubber', 'order.id_parameter_dubber', '=', 
                    'parameter_dubber.id_parameter_dubber')
            ->leftJoin('parameter_jenis_layanan', 'order.id_parameter_jenis_layanan', '=', 
                    'parameter_jenis_layanan.id_parameter_jenis_layanan')
            ->leftJoin('parameter_jenis_teks', 'order.id_parameter_jenis_teks', '=', 
                    'parameter_jenis_teks.id_parameter_jenis_teks')
            ->leftJoin('parameter_order_dokumen', 'order.id_parameter_order_dokumen', '=', 
                    'parameter_order_dokumen.id_parameter_order_dokumen')
            ->leftJoin('parameter_order_dubbing', 'order.id_parameter_order_dubbing', '=', 
                    'parameter_order_dubbing.id_parameter_order_dubbing')
            ->leftJoin('parameter_order_subtitle', 'order.id_parameter_order_subtitle', '=', 
                    'parameter_order_subtitle.id_parameter_order_subtitle')
            ->leftJoin('parameter_order_teks', 'order.id_parameter_order_teks', '=', 
                    'parameter_order_teks.id_parameter_order_teks')
            ->where("id_transaksi",$id_transaksi)
            ->first();

            return view('pages.admin.detail_transaksi', compact('detail'));
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
            'status_transaksi' => 'required'
        ]);

        $t = Transaksi::find($id_transaksi);
        
        Transaksi::where('id_transaksi', $t->id_transaksi)
                    ->update([
                        'status_transaksi'    => $request->status_transaksi,
                    ]);

        //Notifikasi Email Broadcast Pesanan Baru
        if($request->status_transaksi == 'Berhasil')
        {
            $user = User::where('role', 'translator')->get();
            foreach($user as $u)
            {
                $email = $u->email;
                $data = [
                    'title' => 'Ada Pesanan Baru!',
                    'url' => 'http://127.0.0.1:8000/login',
                ];
                Mail::to($email)->send(new SendMailOrder($data));
            }
        }
        return redirect('/daftar-transaksi')->with('success', 'Status transaksi berhasil diubah');
    }

    public function return(Request $request, Transaksi $transaksi, $id_transaksi)
    {
        $this->validate($request,[
            'no_rek_return' => 'required',
            'nominal_return' => 'required',
            'bukti_return' => 'required|mimes:jpeg,jpg,png|max:2000'
        ]);

        $request->file('bukti_return')->move('return/',
        $request->file('bukti_return')->getClientOriginalName()); //Memindahkan request photo ke folder image

        $bukti = $transaksi->bukti_return;

        $bukti_return = public_path('return/').$bukti;
        if(file_exists($bukti_return)){
            @unlink($bukti_return);
    }

        $t = Transaksi::find($id_transaksi);

        $hasil = Transaksi::where('id_transaksi', $t->id_transaksi)
                    ->update([
                        'no_rek_return'    => $request->no_rek_return,
                        'nominal_return'   => $request->nominal_return,
                        'bukti_return'     => $request->file('bukti_return')->getClientOriginalName()
                    ]);
        return redirect('/daftar-transaksi')->with('success', 'Status transaksi berhasil diubah');
    }

    
    public function download($id_transaksi)
    {
        $dl = Transaksi::find($id_transaksi);

        $bukti_transaksi = $dl->bukti_transaksi;

        $pathToFile = public_path('transaksi/').$bukti_transaksi;
        
        return response()->download($pathToFile);
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
