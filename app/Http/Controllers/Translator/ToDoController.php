<?php
namespace App\Http\Controllers\Translator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\Translator\Translator;
use App\Models\Translator\Certificate;
use App\Models\Translator\Master_keahlian;
use App\Models\Translator\Document;
use App\Models\Admin\Seleksi;
use App\Models\Klien\Order;
use App\Models\Klien\Revisi;
use App\Models\User;

use Illuminate\Http\Request;
class ToDoController extends Controller
{
    public function index(){
        $user = Auth::user();
        $translator = Translator::where('id', $user->id)->first();
        $order = DB::table('order')
                ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
                ->join('users', 'klien.id', '=', 'users.id')
                ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 'parameter_order.id_parameter_order')
                ->leftJoin('parameter_jenis_layanan', 'order.id_parameter_jenis_layanan', '=', 'parameter_jenis_layanan.id_parameter_jenis_layanan')
                ->leftJoin('parameter_jenis_teks', 'order.id_parameter_jenis_teks', '=', 'parameter_jenis_teks.id_parameter_jenis_teks')
                ->where('id_translator', $translator->id_translator)
                ->whereNull('path_file_trans')
                ->whereNull('text_trans')
                ->get();

        $revisi = DB::table('order')
            ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
            ->join('users', 'klien.id', '=', 'users.id')
            ->leftJoin('revisi', 'order.id_order', '=', 'revisi.id_order')
            ->leftJoin('parameter_order', 'order.id_parameter_order', '=', 'parameter_order.id_parameter_order')
            ->leftJoin('parameter_jenis_layanan', 'order.id_parameter_jenis_layanan', '=', 'parameter_jenis_layanan.id_parameter_jenis_layanan')
            ->leftJoin('parameter_jenis_teks', 'order.id_parameter_jenis_teks', '=', 'parameter_jenis_teks.id_parameter_jenis_teks')
            ->where('id_translator', $translator->id_translator)
            ->whereNotNull('revisi.pesan_revisi')
            ->whereNull('revisi.path_file_revisi')
            ->whereNull('revisi.text_revisi')
            ->get();

        $today = date("Y-m-d");
        
        return view('pages.translator.todo', [
            'order'=>$order,
            'today'=>$today,
            'revisi'=>$revisi
        ]);
    }

    public function text(Request $request, $id_order)
    {
        $user = Auth::user(); //user yang login
        
        if($request->isMethod('post')){
            $data = $request->all();

            Order::where(['id_order'=>$id_order])->update([
                'text_trans' => $request->text_trans
            ]);
        }
        return redirect('/to-do-list')->with('success', 'Teks telah selesai diterjemahkan');
    }

    public function textRevisi(Request $request, $id_order)
    {
        $user = Auth::user(); //user yang login
        
        if($request->isMethod('post')){
            $data = $request->all();

            Revisi::where(['id_order'=>$id_order])->update([
                'text_revisi' => $request->text_revisi
            ]);
        }
        return redirect('/to-do-list')->with('success', 'Teks telah selesai diterjemahkan');
    }

    public function download($id_order)
    {
        $order = Order::find($id_order);

        $path_file = $order->path_file;

        // $pathToFile = public_path('storage/data_video/file_order_video/').$order->nama_dokumen;
        
        return Storage::download($path_file);
    }

    public function downloadRevisi($id_order)
    {
        $order = Order::find($id_order);

        $path_file_trans = $order->path_file_trans;

        // $pathToFile = public_path('storage/data_video/file_order_video/').$order->nama_dokumen;
        
        return Storage::download($path_file_trans);
    }

    public function uploadVideo(Request $request, $id_order)
    {
        $order = Order::find($id_order);

        if($request->hasFile('path_file_trans')){

            $ext_template = $request->file('path_file_trans')->extension();
            $nama_file = $request->file('path_file_trans')->getClientOriginalName();
            $file = $nama_file . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_video/file_video_trans', $request->file('path_file_trans'), $file);
            

            Order::where('id_order', $order->id_order)
                        ->update([
                            'path_file_trans'    => $path_template
                ]);
        }

        return redirect('/to-do-list')->with('success', 'File telah selesai dikerjakan');

    }

    public function uploadAudio(Request $request, $id_order)
    {
        $order = Order::find($id_order);

        if($request->hasFile('path_file_trans')){

            $ext_template = $request->file('path_file_trans')->extension();
            $nama_file = $request->file('path_file_trans')->getClientOriginalName();
            $file = $nama_file . "." . $ext_template;

            $path_template = Storage::putFileAs('public/order_transkrip(audio)/audio_transkrip_trans', $request->file('path_file_trans'), $file);
            

            Order::where('id_order', $order->id_order)
                        ->update([
                            'path_file_trans'    => $path_template
                ]);
        }

        return redirect('/to-do-list')->with('success', 'File telah selesai dikerjakan');

    }

    public function uploadDokumen(Request $request, $id_order)
    {
        $order = Order::find($id_order);

        if($request->hasFile('path_file_trans')){

            $ext_template = $request->file('path_file_trans')->extension();
            $nama_file = $request->file('path_file_trans')->getClientOriginalName();
            $file = $nama_file . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_file/file_dokumen_trans', $request->file('path_file_trans'), $file);
            

            Order::where('id_order', $order->id_order)
                        ->update([
                            'path_file_trans'    => $path_template
                ]);
        }

        return redirect('/to-do-list')->with('success', 'File telah selesai dikerjakan');

    }

    public function uploadOffline(Request $request, $id_order)
    {
        $order = Order::find($id_order);

        if($request->hasFile('path_file_trans')){

            $ext_template = $request->file('path_file_trans')->extension();
            $nama_file = $request->file('path_file_trans')->getClientOriginalName();
            $file = $nama_file . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_bertemu', $request->file('path_file_trans'), $file);
            

            Order::where('id_order', $order->id_order)
                        ->update([
                            'path_file_trans'    => $path_template
                ]);
        }

        return redirect('/to-do-list')->with('success', 'Pertemuan telah selesai');
    }

    public function uploadVideoRevisi(Request $request, $id_order)
    {
        $revisi = Revisi::find($id_order);

        if($request->hasFile('path_file_revisi')){

            $ext_template = $request->file('path_file_revisi')->extension();
            $nama_file = $request->file('path_file_revisi')->getClientOriginalName();
            $file = $nama_file . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_video/file_video_trans', $request->file('path_file_revisi'), $file);
            

            Revisi::where('id_order', $revisi->id_order)
                        ->update([
                            'path_file_revisi'    => $path_template
                ]);
        }

        return redirect('/to-do-list')->with('success', 'File telah selesai dikerjakan');

    }

    public function uploadAudioRevisi(Request $request, $id_order)
    {
        $revisi = Revisi::find($id_order);

        if($request->hasFile('path_file_revisi')){

            $ext_template = $request->file('path_file_revisi')->extension();
            $nama_file = $request->file('path_file_revisi')->getClientOriginalName();
            $file = $nama_file . "." . $ext_template;

            $path_template = Storage::putFileAs('public/order_transkrip(audio)/audio_transkrip_trans', $request->file('path_file_revisi'), $file);
            

            Revisi::where('id_order', $revisi->id_order)
                        ->update([
                            'path_file_revisi'    => $path_template
                ]);
        }

        return redirect('/to-do-list')->with('success', 'File telah selesai dikerjakan');

    }

    public function uploadDokumenRevisi(Request $request, $id_order)
    {
        $revisi = Revisi::find($id_order);

        if($request->hasFile('path_file_revisi')){

            $ext_template = $request->file('path_file_revisi')->extension();
            $nama_file = $request->file('path_file_revisi')->getClientOriginalName();
            $file = $nama_file . "." . $ext_template;

            $path_template = Storage::putFileAs('public/data_file/file_dokumen_trans', $request->file('path_file_revisi'), $file);
            

            Revisi::where('id_order', $revisi->id_order)
                        ->update([
                            'path_file_revisi'    => $path_template
                ]);
        }

        return redirect('/to-do-list')->with('success', 'File telah selesai dikerjakan');

    }
}
?>