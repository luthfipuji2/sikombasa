<?php
namespace App\Http\Controllers\Klien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use App\Models\Translator\Translator;
use App\Models\Translator\Certificate;
use App\Models\Translator\Master_keahlian;
use App\Models\Translator\Document;
use App\Models\Admin\Seleksi;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user(); //user yang login
        $translator = Translator::where('id', $user->id)->first();

        return view('pages.klien.post-biodata', [
            'user'=>$user,
            'translator'=>$translator
            ]);

    }
    public function updateBiodata(Request $request, Translator $translator) {

        $user = Auth::user(); //user yang login
        $id_user = $user->id; //id user yang login

        $t = Translator::where('id', $user->id)->first();
        DB::table('seleksi')->where('id_translator', $t->id_translator)->delete();

        Translator::where('id', $id_user)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'keahlian' => $request->keahlian,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'nama_bank' => $request->nama_bank,
            'nama_rekening' => $request->nama_rekening,
            'rekening_bank' => $request->rekening_bank,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp
        ]);

        if($request->hasFile('foto_ktp')){
            $request->file('foto_ktp')->move(public_path().'\img\biodata',
            $request->file('foto_ktp')->getClientOriginalName());
            
            $translator = Translator::where('id', $id_user)->first();
            $currentPhoto = $translator->foto_ktp;

            $userPhoto = public_path('\img\biodata').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

            Translator::where('id', $id_user)
                    ->update([
                        'foto_ktp'    => $request->file('foto_ktp')->getClientOriginalName()
            ]);
        }

        $id = Seleksi::create([
            'id_translator'=>$t->id_translator
        ]);

        return redirect('/document-post')->with('success', 'Data Updated Successfully!');       
    }
    public function indexDocument()
    {
        $user = Auth::user(); //user yang login
        $dokumen = Document::where('id', $user->id)->first();

        return view('pages.klien.post-dokumen', [
            'user'=>$user,
            'dokumen'=>$dokumen
            ]);

    }
    public function updateDocument(Request $request)
    {
        $user = Auth::user(); //user yang login
        $id_user = $user->id; //id user yang login

        if($request->hasFile('cv')){
            $request->file('cv')->move(public_path().'\img\dokumen',
            $request->file('cv')->getClientOriginalName());
            
            $dokumen = Document::where('id', $id_user)->first();
            $currentPhoto = $dokumen->cv;

            $userPhoto = public_path('\img\dokumen').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

            Document::where('id', $id_user)
                    ->update([
                        'cv'    => $request->file('cv')->getClientOriginalName()
            ]);
        }

        if($request->hasFile('ijazah_terakhir')){
            $request->file('ijazah_terakhir')->move(public_path().'\img\dokumen',
            $request->file('ijazah_terakhir')->getClientOriginalName());
            
            $dokumen = Document::where('id', $id_user)->first();
            $currentPhoto = $dokumen->ijazah_terakhir;

            $userPhoto = public_path('\img\dokumen').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

            Document::where('id', $id_user)
                    ->update([
                        'ijazah_terakhir'    => $request->file('ijazah_terakhir')->getClientOriginalName()
            ]);
        }

        if($request->hasFile('portofolio')){
            $request->file('portofolio')->move(public_path().'\img\dokumen',
            $request->file('portofolio')->getClientOriginalName());
            
            $dokumen = Document::where('id', $id_user)->first();
            $currentPhoto = $dokumen->portofolio;

            $userPhoto = public_path('\img\dokumen').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

            Document::where('id', $id_user)
                    ->update([
                        'portofolio'    => $request->file('portofolio')->getClientOriginalName()
            ]);
        }

        if($request->hasFile('sk_sehat')){
            $request->file('sk_sehat')->move(public_path().'\img\dokumen',
            $request->file('sk_sehat')->getClientOriginalName());
            
            $dokumen = Document::where('id', $id_user)->first();
            $currentPhoto = $dokumen->sk_sehat;

            $userPhoto = public_path('\img\dokumen').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

            Document::where('id', $id_user)
                    ->update([
                        'sk_sehat'    => $request->file('sk_sehat')->getClientOriginalName()
            ]);
        }

        if($request->hasFile('skck')){
            $request->file('skck')->move(public_path().'\img\dokumen',
            $request->file('skck')->getClientOriginalName());
            
            $dokumen = Document::where('id', $id_user)->first();
            $currentPhoto = $dokumen->skck;

            $userPhoto = public_path('\img\dokumen').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

            Document::where('id', $id_user)
                    ->update([
                        'skck'    => $request->file('skck')->getClientOriginalName()
            ]);
        }

        return redirect('/document-post')->with('success', 'Data Updated Successfully!');        
    }
}