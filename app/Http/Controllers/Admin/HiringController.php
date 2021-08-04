<?php
namespace App\Http\Controllers\Admin;
use App\Models\Admin\Admin;
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

use Illuminate\Http\Request;
class HiringController extends Controller
{
    public function index(){
        $user = Auth::user();
        // $translator = Translator::all();

        $data = DB::table('translator') //join tabel users dan translator di mana antara id users dan translator adalah sama
            ->leftJoin('seleksi', 'translator.id_translator', '=', 'seleksi.id_translator')
            ->select('translator.id_translator','translator.updated_at','translator.nama', 'seleksi.id_seleksi_berkas', 'seleksi.penyeleksi', 'seleksi.nilai_berkas', 'seleksi.hasil')
            ->get();//load data

        return view('pages.admin.hiring', [
            'user'=>$user,
            'data'=>$data
            ]);
    }
    public function show($id_translator){

        $user = Auth::user();
        $translator = DB::table('translator')
                        ->where('id_translator', $id_translator)
                        ->first();

        $dokumen = DB::table('lamaran_kerja')
                        ->where('id_translator', $id_translator)
                        ->first();

        $skills = DB::table('keahlian')
                        ->join('master_keahlian', 'keahlian.id_keahlian', '=', 'master_keahlian.id_keahlian')
                        ->where('id_translator', $id_translator)
                        ->get();

        $seleksi = DB::table('seleksi')
                        ->where('id_translator', $id_translator)
                        ->first();

        return view('pages.admin.show', [
            'user'=>$user,
            'translator'=>$translator,
            'dokumen'=>$dokumen,
            'skills'=>$skills,
            'seleksi'=>$seleksi
            ]);

        // return $translator;
    }

    public function catatanBerkas(Request $request, $id_translator)
    {
        $user = Auth::user(); //user yang login
        
        if($request->isMethod('post')){
            $data = $request->all();

            Seleksi::where(['id_translator'=>$id_translator])->update([
                'nilai_video' => $request->nilai_video,
                'nilai_cv' => $request->nilai_cv,
                'nilai_portofolio' => $request->nilai_portofolio,
                'nilai_ijazah' => $request->nilai_ijazah,
                'nilai_sk_sehat' => $request->nilai_sk_sehat,
                'nilai_skck' => $request->nilai_skck,
                'nilai_sertifikat' => $request->nilai_sertifikat,
                'catatan_video' => $request->catatan_video,
                'catatan_cv' => $request->catatan_cv,
                'catatan_portofolio' => $request->catatan_portofolio,
                'catatan_ijazah' => $request->catatan_ijazah,
                'catatan_sk_sehat' => $request->catatan_sk_sehat,
                'catatan_skck' => $request->catatan_skck,
                'catatan_sertifikat' => $request->catatan_sertifikat
            ]);
        }

        $seleksi = Seleksi::where('id_translator', $id_translator)->first();

        $nilai = ($seleksi->nilai_video + $seleksi->nilai_cv + $seleksi->nilai_portofolio + $seleksi->nilai_ijazah + $seleksi->nilai_sk_sehat + $seleksi->nilai_skck + $seleksi->nilai_sertifikat)/7;

        if($request->isMethod('post')){
            $data = $request->all();

            Seleksi::where(['id_translator'=>$id_translator])->update([
                'penyeleksi' => $user->name,
                'nilai_berkas' => $nilai
            ]);
        }

        return redirect('/hire')->with('success', 'Nilai dan Catatan Berkas Berhasil Ditambahkan');
    }

    public function berkas(Request $request, $id_seleksi_berkas)
    {
        $user = Auth::user(); //user yang login

        if($request->isMethod('post')){
            $data = $request->all();

            Seleksi::where(['id_seleksi_berkas'=>$id_seleksi_berkas])->update([
                'hasil' => $request->hasil
            ]);
        }

        return redirect('/hire')->with('success', 'Nilai Berkas Berhasil Ditambahkan');
    }

    public function indexWawancara()
    {
        $user = Auth::user();
        // $translator = Translator::all();

        $data = DB::table('translator')
            ->leftJoin('seleksi', 'translator.id_translator', '=', 'seleksi.id_translator')
            ->select('translator.id_translator','translator.updated_at','translator.nama', 'seleksi.id_seleksi_berkas', 'seleksi.penyeleksi', 'seleksi.nilai_berkas', 'seleksi.hasil', 'seleksi.pewawancara', 'seleksi.catatan', 'seleksi.nilai_wawancara', 'seleksi.hasil_wawancara')
            ->where('seleksi.hasil', "lolos")
            ->get();//load data

        return view('pages.admin.hiring_wawancara', [
            'user'=>$user,
            'data'=>$data
            ]);
    }

    public function showWawancara($id_translator, $id_seleksi_berkas){

        $user = Auth::user();
        $translator = DB::table('translator')
                        ->where('id_translator', $id_translator)
                        ->first();

        $dokumen = DB::table('lamaran_kerja')
                    ->where('id_translator', $id_translator)
                    ->first();

        $skills = DB::table('keahlian')
                        ->join('master_keahlian', 'keahlian.id_keahlian', '=', 'master_keahlian.id_keahlian')
                        ->where('id_translator', $id_translator)
                        ->get();

        $catatan = DB::table('seleksi')
                    ->where('id_seleksi_berkas', $id_seleksi_berkas)
                    ->first();

        return view('pages.admin.show-wawancara', [
            'user'=>$user,
            'translator'=>$translator,
            'dokumen'=>$dokumen,
            'skills'=>$skills,
            'catatan'=>$catatan,
            ]);

        // return $translator;

        // dd($id_translator, $id_seleksi_berkas);
    }

    public function catatan(Request $request, $id_seleksi_berkas)
    {
        $user = Auth::user(); //user yang login
        
        if($request->isMethod('post')){
            $data = $request->all();

            Seleksi::where(['id_seleksi_berkas'=>$id_seleksi_berkas])->update([
                'pewawancara' => $user->name,
                'catatan' => $request->catatan
            ]);
        }
        return redirect('/index-wawancara')->with('success', 'Catatan Berhasil Ditambahkan');
    }

    public function wawancara(Request $request, $id_seleksi_berkas)
    {
        $user = Auth::user(); //user yang login

        $seleksi = Seleksi::where('id_seleksi_berkas', $id_seleksi_berkas)->first();

        if($request->isMethod('post')){
            $data = $request->all();

            Seleksi::where(['id_seleksi_berkas'=>$id_seleksi_berkas])->update([
                'penyeleksi' => $seleksi->penyeleksi,
                'nilai_berkas' => $seleksi->nilai_berkas,
                'hasil' => $seleksi->hasil,
                'nilai_wawancara' => $request->nilai_wawancara,
                'hasil_wawancara' => $request->hasil_wawancara
            ]);
        }

        return redirect('/index-wawancara')->with('success', 'Nilai Wawancara Berhasil Ditambahkan');
    }
}
?>