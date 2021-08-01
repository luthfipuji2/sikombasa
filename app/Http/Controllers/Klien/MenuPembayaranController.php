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

        $order_pembayaran = Transaksi:: //join table users and table user_details base from matched id;
                rightJoin('order', 'transaksi.id_order', '=', 'order.id_order')
                ->whereNull('id_transaksi')
                ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
                ->join('users', 'klien.id', '=', 'users.id')
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
                ->where("users.id",$user->id)
                ->where('order.tgl_order', '>=', Carbon::now()->subDay()->toDateTimeString())
                ->orderBy('order.id_order')
                ->get();
        
        $bank = Bank::all();

        $riwayat = DB::table('transaksi')
            ->join('order', 'order.id_order', '=', 'transaksi.id_order')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'klien.id', '=', 'users.id')
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
            ->where("users.id",$user->id)
            ->orderBy('order.id_order')
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
            'bukti_transaksi' => 'required|mimes:jpeg,jpg,png|max:2000'
        ]);

        $request->file('bukti_transaksi')->move('transaksi/',
            $request->file('bukti_transaksi')->getClientOriginalName()); //Memindahkan request photo ke folder image

            $bukti = $transaksi->bukti_transaksi;

            $bukti_transaksi = public_path('transaksi/').$bukti;
            if(file_exists($bukti_transaksi)){
                @unlink($bukti_transaksi);
        }

        if(!empty($request->nominal_transaksi)){
            Transaksi::create([
                'id_order' => $request->id_order,
                'id_bank' => $request->id_bank,
                'nominal_transaksi' => $request->nominal_transaksi,
                'harga_menu_lisan' => $request->harga_menu_lisan,
                'bukti_transaksi'    => $request->file('bukti_transaksi')->getClientOriginalName()
            ]);
    
            return redirect('/menu-pembayaran')->with('success', 'Bukti transaksi Anda berhasil diunggah');
        }
        elseif(!empty($request->nominal_transaksi_total)){
            Transaksi::create([
                'id_order' => $request->id_order,
                'id_bank' => $request->id_bank,
                'nominal_transaksi' => $request->nominal_transaksi_total,
                'harga_layanan' => $request->harga_layanan,
                'harga_jenis_teks' => $request->harga_jenis_teks,
                'harga_teks' => $request->harga_teks,
                'harga_dokumen' => $request->harga_dokumen,
                'harga_subtitle' => $request->harga_subtitle,
                'harga_dubbing' => $request->harga_dubbing,
                'harga_dubber' => $request->harga_dubber,
                'bukti_transaksi'    => $request->file('bukti_transaksi')->getClientOriginalName()
            ]);
    
            return redirect('/menu-pembayaran')->with('success', 'Bukti transaksi Anda berhasil diunggah');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_order)
    {
        $user = Auth::user();

        $order = Order::find($id_order);

        $detail = Transaksi:: //join table users and table user_details base from matched id;
                rightJoin('order', 'transaksi.id_order', '=', 'order.id_order')
                ->whereNull('id_transaksi')
                ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
                ->join('users', 'klien.id', '=', 'users.id')
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
                ->where("users.id",$user->id)
                ->where("order.id_order",$order->id_order)
                ->first();

        return view ('pages.klien.detail_menu_pembayaran', compact('detail'));
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

    public function invoice($id_transaksi)
    {
        $user = Auth::user();

        $transaksi= Transaksi::find($id_transaksi);

        $invoice = Transaksi::
            join('order', 'order.id_order', '=', 'transaksi.id_order')
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
            ->where("users.id",$user->id)
            ->where("id_transaksi",$id_transaksi)
            ->first();

        return view ('pages.klien.invoice_pdf', compact('invoice'));

    
        // $pdf = PDF::loadView('pages.klien.invoice_pdf', ['invoice'=>$invoice]);
        

    	// return $pdf->download('invoice.pdf');
    }
}
