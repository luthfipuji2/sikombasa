<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klien\Order;
use App\Models\Klien\ParameterOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Klien\Klien;
use App\Models\User;
use App\Models\Klien\Revisi;
use App\Models\Translator;

class DetailOrderController extends Controller
{
    public function index()
    {
    
        $result = 0;
        $order = Order::all();
        $dubbing = Order::whereNotNull('id_parameter_order_dubbing')->count();
        $dokumen = Order::whereNotNull('id_parameter_order_dokumen')->count();
        $subtitle = Order::whereNotNull('id_parameter_order_subtitle')->count();
        $teks = Order::whereNotNull('id_parameter_order_teks')->count();
        $transkrip = Order::whereNotNull('durasi_audio')->count();
        $interpreter = Order::whereNotNull('longitude')->count();

        return view('pages.admin.detail_order.index', compact('order', 'dubbing', 'dokumen', 'subtitle', 'teks', 'transkrip', 'interpreter'));
    }

    // ------------------------------- Order Teks -----------------------------------

    public function detailTeks()
    {
        $translator=Translator::where('status','Aktif')->get();

        $order=Order::whereNotNull('id_parameter_order_teks')->get();

        return view('pages.admin.detail_order.detail_teks', compact('translator','order'));
    }

    public function updateTeks(Request $request, $id_order)
    {
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'id_parameter_jenis_teks' => 'required',
            'durasi_pengerjaan' => 'required',
            'text' => 'required'
        ]);

        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'id_translator'=>$request->id_translator,
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'id_parameter_jenis_teks'=>$request->id_parameter_jenis_teks,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'text'=>$request->text,
                'jumlah_karakter'=>$request->jumlah_karakter,
            ]);

        return redirect('/det-order-teks')->with('success', 'Data Order Berhasil Di Update!');
    }

    public function deleteTeks($id_order)
    {
        Order::destroy($id_order);

        return redirect('/det-order-teks')->with('success','Data Order Berhasil Di Hapus');

    }


    // ------------------------------- Order Dokumen -----------------------------------

    public function detailDokumen()
    {
        $translator=Translator::where('status','Aktif')->get();

        $order=Order::whereNotNull('id_parameter_order_dokumen')->get();
        
        return view('pages.admin.detail_order.detail_dokumen', compact('translator','order'));
    }

    public function downloadDokumenKlien($id_order)
    {
        $order = Order::find($id_order);
        $path_file = $order->path_file;   

        return Storage::download($path_file);
        
    }

    public function downloadDokumenTranslator($id_order)
    {
        $order = Order::find($id_order);
        $path_file_trans = $order->path_file_trans; 

        return Storage::download($path_file_trans);
    }

    public function downloadDokumenRevisi($id_order)
    {   
        $order=Order::find($id_order);

        $rev=Revisi::where('id_order', $order->id_order)->get();

        $result = $rev[0]->path_file_revisi;
       
        return Storage::download($result);
    }

    public function updateDokumen(Request $request, $id_order)
    {
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'id_parameter_jenis_teks' => 'required',
            'durasi_pengerjaan' => 'required',
            'nama_dokumen' => 'required',
            'path_file' => 'required',
            'jumlah_halaman' => 'required',
        ]);
        
        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'id_translator'=>$request->id_translator,
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'id_parameter_jenis_teks'=>$request->id_parameter_jenis_teks,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'nama_dokumen'=>$request->nama_dokumen,
                'path_file'=>$request->path_file,
                'jumlah_halaman'=>$request->jumlah_halaman,
            ]);

        return redirect('/det-order-dokumen')->with('success', 'Data Order Berhasil Di Update!');
    }

    public function deleteDokumen($id_order)
    {
        Order::destroy($id_order);

        return redirect('/det-order-dokumen')->with('success','Data Order Berhasil Di Hapus');

    }

    // ------------------------------- Order Subtitle -----------------------------------

    public function detailSubtitle()
    {
        $translator=Translator::where('status','Aktif')->get();

        $order=Order::whereNotNull('id_parameter_order_subtitle')->get();

        return view('pages.admin.detail_order.detail_subtitle', compact('translator','order'));
    }

    public function downloadSubtitleKlien($id_order)
    {
        $order = Order::find($id_order);

        $path_file = $order->path_file;    

        return Storage::download($path_file);
    }

    public function downloadSubtitleTranslator($id_order)
    {
        $order = Order::find($id_order);

        $path_file_trans = $order->path_file_trans; 

        return Storage::download($path_file_trans);
    }

    public function downloadSubtitleRevisi($id_order)
    {   
        $order=Order::find($id_order);

        $rev=Revisi::where('id_order', $order->id_order)->get();

        $result = $rev[0]->path_file_revisi;
        
        return Storage::download($result);
    }

    public function updateSubtitle(Request $request, $id_order)
    {
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'durasi_pengerjaan' => 'required',
            'nama_dokumen' => 'required',
            'path_file' => 'required'
        ]);

        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'id_translator'=>$request->id_translator,
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'nama_dokumen'=>$request->nama_dokumen,
                'path_file'=>$request->path_file,
                'durasi_video'=>$request->durasi_video,
            ]);

        return redirect('/det-order-subtitle')->with('success', 'Data Order Berhasil Di Update!');
    }

    public function deleteSubtitle($id_order)
    {
        Order::destroy($id_order);

        return redirect('/det-order-subtitle')->with('success','Data Order Berhasil Di Hapus');

    }

    // ------------------------------- Order Dubbing -----------------------------------

    public function detailDubbing()
    {        
        $translator=Translator::where('status','Aktif')->get();

        $order=Order::whereNotNull('id_parameter_order_dubbing')->with('klien')->with('translator')->get();

        return view('pages.admin.detail_order.detail_dubbing', compact('translator', 'order'));
    }

    public function downloadDubbingKlien($id_order)
    {
        $order = Order::find($id_order);

        $path_file = $order->path_file;  

        return Storage::download($path_file);
    }

    public function downloadDubbingTranslator($id_order)
    {
        $order = Order::find($id_order);

        $path_file_trans = $order->path_file_trans; 

        return Storage::download($path_file_trans);
    }

    public function downloadDubbingRevisi($id_order)
    {   
        $order=Order::find($id_order);

        $rev=Revisi::where('id_order', $order->id_order)->get();

        $result = $rev[0]->path_file_revisi;
      
        return Storage::download($result);
    }

    public function updateDubbing(Request $request, $id_order)
    {
        $this->validate($request, [
            'id_parameter_jenis_layanan' => 'required',
            'durasi_pengerjaan' => 'required',
            'jumlah_dubber' => 'required',
            'nama_dokumen' => 'required',
            'path_file' => 'required'
        ]);

        $order=Order::findOrFail($id_order);

        Order::where('id_order', $id_order)
            ->update([
                'id_translator'=>$request->id_translator,
                'id_parameter_jenis_layanan'=>$request->id_parameter_jenis_layanan,
                'durasi_pengerjaan'=>$request->durasi_pengerjaan,
                'jumlah_dubber'=>$request->jumlah_dubber,
                'nama_dokumen'=>$request->nama_dokumen,
                'path_file'=>$request->path_file,
                'durasi_video'=>$request->durasi_video,
            ]);
    
        return redirect('/det-order-dubbing')->with('success', 'Data Order Berhasil Di Update!');
    }

    public function deleteDubbing($id_order)
    {
        Order::destroy($id_order);

        return redirect('/det-order-dubbing')->with('success','Data Order Berhasil Di Hapus');

    }

    // ------------------------------- Order Transkrip -----------------------------------

    public function detailTranskrip()
    {
        $translator=Translator::where('status','Aktif')->get();

        $order=Order::whereNotNull('durasi_audio')->get();

        return view('pages.admin.detail_order.detail_transkrip', compact('translator','order'));
    }

    public function downloadTranskripKlien($id_order)
    {
        $order = Order::find($id_order);

        $path_file = $order->path_file;  

        return Storage::download($path_file);
    }

    public function downloadTranskripTranslator($id_order)
    {
        $order = Order::find($id_order);

        $path_file_trans = $order->path_file_trans; 

        return Storage::download($path_file_trans);
    }

    public function downloadTranskripRevisi($id_order)
    {   
        $order=Order::find($id_order);

        $rev=Revisi::where('id_order', $order->id_order)->get();

        $result = $rev[0]->path_file_revisi;

        return Storage::download($result);
    }

    public function updateTranskrip(Request $request, $id_order)
    {
        $order=Order::findOrFail($id_order);
        $durasi_audio=$request->durasi_audio;
        $jenis_layanan=$request->jenis_layanan;
        $durasi_pengerjaan=$request->durasi_pengerjaan;

        if($durasi_audio <= 300 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="1"){
            $biaya="1";
        }
        elseif($durasi_audio <= 300 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="2"){
            $biaya="2";
        }
        elseif($durasi_audio <= 300 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="3"){
            $biaya="3";
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="1"){
            $biaya="4";
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="2"){
            $biaya="5";
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="3"){
            $biaya="6";
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="1"){
            $biaya='7';
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="2"){
            $biaya='8';
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="3"){
            $biaya='9';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="1"){
            $biaya='10';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="2"){
            $biaya='11';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="3"){
            $biaya='12';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="1"){
            $biaya='13';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="2"){
            $biaya='14';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Basic" && $durasi_pengerjaan=="3"){
            $biaya='15';
        }
        elseif($durasi_audio <= 300 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="1"){
            $biaya='16';
        }
        elseif($durasi_audio <= 300 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="2"){
            $biaya='17';
        }
        elseif($durasi_audio <= 300 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="3"){
            $biaya='18';
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="1"){
            $biaya='19';
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="2"){
            $biaya='20';
        }
        elseif($durasi_audio <= 900 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="3"){
            $biaya='21';
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="1"){
            $biaya='22';
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="2"){
            $biaya='23';
        }
        elseif($durasi_audio <= 1800 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="3"){
            $biaya='24';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="1"){
            $biaya='25';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="2"){
            $biaya='26';
        }
        elseif($durasi_audio <= 3600 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="3"){
            $biaya='27';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="1"){
            $biaya='28';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="2"){
            $biaya='29';
        }
        elseif($durasi_audio <= 10800 && $jenis_layanan=="Premium" && $durasi_pengerjaan=="3"){
            $biaya='30';
        }

        Order::where('id_order', $id_order)
        ->update([
            'id_translator'=>$request->id_translator,
            'jenis_layanan' =>$request->jenis_layanan,
            'durasi_pengerjaan'=>$request->durasi_pengerjaan,
            'nama_dokumen'=>$request->nama_dokumen,
            'path_file'=>$request->path_file,
            'durasi_audio'=>$request->durasi_audio,
            'id_parameter_order' =>$biaya,
            
        ]);
        return redirect('/det-order-transkrip')->with('success', 'Data Order Berhasil Terupdate');
    }

    public function deleteTranskrip($id_order)
    {
        Order::destroy($id_order);

        return redirect('/det-order-transkrip')->with('success','Data Order Berhasil Di Hapus');

    }

    // ------------------------------- Order Interpreter -----------------------------------

    public function detailInterpreter()
    {
        $translator=Translator::where('status','Aktif')->get();

        $order=Order::whereNotNull('longitude')->get();

        $basic = ParameterOrder::where('p_jenis_layanan', 'Basic')
        ->whereNotNull('p_durasi_pertemuan')
        ->orderBy('p_durasi_pertemuan')
        ->get();

        $premium = ParameterOrder::where('p_jenis_layanan', 'Premium')
        ->whereNotNull('p_durasi_pertemuan')
        ->orderBy('p_durasi_pertemuan')
        ->get();

        return view('pages.admin.detail_order.detail_interpreter', compact('translator','order','basic','premium'));
    }

    public function updateInterpreter(Request $request, $id_order)
    {
        if(!empty($request->id_parameter_order && $request->p_jenis_layanan) && empty($request->id_parameter_order2 && $request->p_jenis_layanan2)){
            $order=Order::findOrFail($id_order);

            Order::where('id_order', $id_order)
                ->update([
                    'id_parameter_order'=>$request->id_parameter_order,
                    'id_translator'=>$request->id_translator,
                    'jenis_layanan' => $request->p_jenis_layanan,
                    'tipe_offline'=>$request->tipe_offline,
                    'tipe_offline'=>$request->tipe_offline,
                    'lokasi'=>$request->lokasi,
                    'longitude'=>$request->longitude,
                    'latitude'=>$request->latitude,
                    'tanggal_pertemuan'=>$request->tanggal_pertemuan,
                    'waktu_pertemuan'=>$request->waktu_pertemuan,
                ]);
        };

        if(!empty($request->id_parameter_order2 && $request->p_jenis_layanan2) && empty($request->id_parameter_order && $request->p_jenis_layanan)){
            $order=Order::findOrFail($id_order);

            Order::where('id_order', $id_order)
                ->update([
                    'id_parameter_order'=>$request->id_parameter_order2,
                    'id_translator'=>$request->id_translator,
                    'jenis_layanan' => $request->p_jenis_layanan2,
                    'tipe_offline'=>$request->tipe_offline,
                    'lokasi'=>$request->lokasi,
                    'longitude'=>$request->longitude,
                    'latitude'=>$request->latitude,
                    'tanggal_pertemuan'=>$request->tanggal_pertemuan,
                    'waktu_pertemuan'=>$request->waktu_pertemuan,
                ]);
        };
        return redirect('/det-order-interpreter')->with('success', 'Data Order Berhasil Di Edit');
    }

    public function downloadBuktiBertemu($id_order)
    {
        $order = Order::find($id_order);
        $path_file_trans = $order->path_file_trans; 

        return Storage::download($path_file_trans);
    }

    function deleteInterpreter($id_order)
    {
        Order::destroy($id_order);
        return redirect('/det-order-interpreter')->with('success','Data Order Berhasil Di Hapus');

    }
}