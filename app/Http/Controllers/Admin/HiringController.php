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
            ->select('translator.id_translator','translator.updated_at','translator.nama', 'seleksi.penyeleksi', 'seleksi.nilai_berkas', 'seleksi.hasil')
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

        return view('pages.admin.show', [
            'user'=>$user,
            'translator'=>$translator,
            'dokumen'=>$dokumen,
            'skills'=>$skills
            ]);

        // return $translator;
    }

    public function berkas(Request $request, $id_translator)
    {
        $user = Auth::user(); //user yang login

        if($request->isMethod('post')){
            $data = $request->all();

            Seleksi::where(['id_translator'=>$id_translator])->update([
                'penyeleksi' => $user->name,
                'nilai_berkas' => $request->nilai_berkas,
                'hasil' => $request->hasil
            ]);
        }

        return redirect('/hire');
    }

    public function indexWawancara()
    {
        $user = Auth::user();
        // $translator = Translator::all();

        $data = DB::table('translator')
            ->leftJoin('seleksi', 'translator.id_translator', '=', 'seleksi.id_translator')
            ->select('translator.id_translator','translator.updated_at','translator.nama', 'seleksi.penyeleksi', 'seleksi.nilai_berkas', 'seleksi.hasil', 'seleksi.pewawancara', 'seleksi.catatan', 'seleksi.nilai_wawancara', 'seleksi.hasil_wawancara')
            ->where('seleksi.hasil', "lolos")
            ->get();//load data

        return view('pages.admin.hiring_wawancara', [
            'user'=>$user,
            'data'=>$data
            ]);
    }

    public function showWawancara($id_translator){

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
                    ->where('id_translator', $id_translator)
                    ->first();

        return view('pages.admin.show-wawancara', [
            'user'=>$user,
            'translator'=>$translator,
            'dokumen'=>$dokumen,
            'skills'=>$skills,
            'catatan'=>$catatan,
            ]);

        // return $translator;
    }

    public function catatan(Request $request, $id_translator)
    {
        $user = Auth::user(); //user yang login
        
        if($request->isMethod('post')){
            $data = $request->all();

            Seleksi::where(['id_translator'=>$id_translator])->update([
                'pewawancara' => $user->name,
                'catatan' => $request->catatan
            ]);
        }
        return redirect('/index-wawancara');
    }

    public function wawancara(Request $request, $id_translator)
    {
        $user = Auth::user(); //user yang login

        $seleksi = Seleksi::where('id_translator', $id_translator)->first();

        if($request->isMethod('post')){
            $data = $request->all();

            Seleksi::where(['id_translator'=>$id_translator])->update([
                'penyeleksi' => $seleksi->penyeleksi,
                'nilai_berkas' => $seleksi->nilai_berkas,
                'hasil' => $seleksi->hasil,
                'nilai_wawancara' => $request->nilai_wawancara,
                'hasil_wawancara' => $request->hasil_wawancara
            ]);
        }

        return redirect('/index-wawancara');
    }
}
?>