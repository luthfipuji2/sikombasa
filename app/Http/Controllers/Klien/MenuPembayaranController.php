<?php

namespace App\Http\Controllers\Klien;
use App\Models\User;
use App\Models\Klien\Order;
use App\Http\Controllers\Controller;
use App\Models\Admin\Bank;
use App\Models\Admin\Transaksi;
use Illuminate\Support\Facades\Auth;
use App\Models\Klien\Klien;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $order_pembayaran = DB::table('transaksi') //join table users and table user_details base from matched id;
                ->rightJoin('order', 'transaksi.id_order', '=', 'order.id_order')
                ->whereNull('id_transaksi')
                ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
                ->join('users', 'klien.id', '=', 'users.id')
                ->join('parameter_order', 'order.id_parameter_order', '=', 
                        'parameter_order.id_parameter_order')
                ->where("users.id",$user->id)
                ->get();
        
        $bank = Bank::all();

        $riwayat = DB::table('transaksi')
            ->join('order', 'order.id_order', '=', 'transaksi.id_order')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'klien.id', '=', 'users.id')
            ->join('parameter_order', 'order.id_parameter_order', '=', 
                    'parameter_order.id_parameter_order')
            ->where("users.id",$user->id)
            ->get();

        return view('pages.klien.menu_pembayaran', compact('order_pembayaran', 'bank', 'riwayat'));
        

        // return view('pages.klien.invoice_pdf', compact('invoice'));
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
    public function store(Request $request, Transaksi $transaksi)
    {
        $this->validate($request,[
            'id_order' => 'required',
            'id_bank' => 'required',
            'nominal_transaksi' => 'required'
        ]);

        $request->file('bukti_transaksi')->move('transaksi/',
            $request->file('bukti_transaksi')->getClientOriginalName()); //Memindahkan request photo ke folder image

            $bukti = $transaksi->bukti_transaksi;

            $bukti_transaksi = public_path('transaksi/').$bukti;
            if(file_exists($bukti_transaksi)){
                @unlink($bukti_transaksi);
        }

        Transaksi::create([
            'id_order' => $request->id_order,
            'id_bank' => $request->id_bank,
            'nominal_transaksi' => $request->nominal_transaksi,
            'bukti_transaksi'    => $request->file('bukti_transaksi')->getClientOriginalName()
        ]);

        return redirect('/menu-pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view ('pages.klien.detail_menu_pembayaran', compact('order'));
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
    public function update(Request $request, $id)
    {
        //
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

    public function download($id_transaksi)
    {
        $dl = Transaksi::find($id_transaksi);

        $bukti_transaksi = $dl->bukti_transaksi;

        $pathToFile = public_path('transaksi/').$bukti_transaksi;
        
        return response()->download($pathToFile);
    }

    public function invoice($id_transaksi)
    {
        $user = Auth::user();

        $transaksi= Transaksi::find($id_transaksi);

        $invoice = DB::table('transaksi')
            ->join('order', 'order.id_order', '=', 'transaksi.id_order')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'klien.id', '=', 'users.id')
            ->join('bank', 'bank.id_bank', '=', 'transaksi.id_bank')
            ->where("users.id",$user->id)
            ->where("transaksi.id_transaksi",$transaksi->id_transaksi)
            ->first();

        // return view ('pages.klien.invoice_pdf', compact('invoice'));

    
        $pdf = PDF::loadView('pages.klien.invoice_pdf', ['invoice'=>$invoice]);
        

    	return $pdf->download('invoice.pdf');
    }
}
