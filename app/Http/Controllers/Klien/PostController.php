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
        $translator = Translator::where('id', $user->id)->latest('updated_at')->first();

        return view('pages.klien.post-biodata', [
            'user'=>$user,
            'translator'=>$translator
            ]);

    }
    public function updateBiodata(Request $request, Translator $translator) {

        $user = Auth::user(); //user yang login
        $id_user = $user->id; //id user yang login

        $translator = Translator::where('id', $user->id)->latest('updated_at')->first();

        Translator::create([
            'id' => $id_user,
            'foto_ktp'=>$translator->foto_ktp
        ]);

        $t = Translator::where('id', $user->id)->latest('updated_at')->first();

        // DB::table('seleksi')->where('id_translator', $t->id_translator)->delete();

        Translator::where('id_translator', $t->id_translator)->update([
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
            $request->file('foto_ktp')->move(public_path().'/img/biodata/',
            $request->file('foto_ktp')->getClientOriginalName());
            
            $t = Translator::where('id', $user->id)->latest('updated_at')->first();
            // $currentPhoto = $t->foto_ktp;

            // $userPhoto = public_path('/img/biodata/').$currentPhoto;
            // if(file_exists($userPhoto)){
            //     @unlink($userPhoto);
            // }

            Translator::where('id_translator', $t->id_translator)
                    ->update([
                        'foto_ktp'    => $request->file('foto_ktp')->getClientOriginalName()
            ]);
        }

        $id = Seleksi::create([
            'id_translator'=>$t->id_translator
        ]);

        $dokumen = Document::where('id', $user->id)->latest('updated_at')->first();

        Document::create([
            'id_translator' => $t->id_translator,
            'id' => $id_user,
            'cv' => $dokumen->cv,
            'ijazah_terakhir' => $dokumen->ijazah_terakhir,
            'portofolio' => $dokumen->portofolio,
            'sk_sehat' => $dokumen->sk_sehat,
            'skck'=> $dokumen->skck
        ]);

        $certificate = DB::table('keahlian')
            ->join('master_keahlian', 'keahlian.id_keahlian', '=', 'master_keahlian.id_keahlian')
            ->where("master_keahlian.id_translator", $translator->id_translator)
            ->get();

        foreach($certificate as $sertifikat)
        {
            $data = Certificate::create([
                        'no_sertifikat' => $sertifikat->no_sertifikat,
                        'nama_sertifikat' => $sertifikat->nama_sertifikat,
                        'bukti_dokumen' => $sertifikat->bukti_dokumen,
                        'diterbitkan_oleh' => $sertifikat->diterbitkan_oleh,
                        'masa_berlaku' => $sertifikat->masa_berlaku
                    ]);
    
            $user = Auth::user();
    
            $t2 = Translator::where('id', $user->id)->latest('updated_at')->first();
    
            $id = Master_keahlian::create([
                'id_keahlian'=>$data->id_keahlian,
                'id_translator'=>$t2->id_translator
            ]);
        }
        return redirect('/document-post')->with('success', 'Data Updated Successfully!');       
    }
    public function indexDocument()
    {
        $user = Auth::user(); //user yang login
        $dokumen = Document::where('id', $user->id)->latest('updated_at')->first();

        return view('pages.klien.post-dokumen', [
            'user'=>$user,
            'dokumen'=>$dokumen
            ]);

    }
    public function updateDocument(Request $request)
    {
        $user = Auth::user(); //user yang login
        $id_user = $user->id; //id user yang login
        $translator = Translator::where('id', $user->id)->latest('updated_at')->first();

        if($request->hasFile('cv')){
            $request->file('cv')->move(public_path().'/img/dokumen',
            $request->file('cv')->getClientOriginalName());
            
            $dokumen = Document::where('id_translator', $translator->id_translator)->first();
            // $currentPhoto = $dokumen->cv;

            // $userPhoto = public_path('/img/dokumen/').$currentPhoto;
            // if(file_exists($userPhoto)){
            //     @unlink($userPhoto);
            // }

            Document::where('id_translator', $translator->id_translator)
                    ->update([
                        'cv'    => $request->file('cv')->getClientOriginalName()
            ]);
        }

        if($request->hasFile('ijazah_terakhir')){
            $request->file('ijazah_terakhir')->move(public_path().'/img/dokumen',
            $request->file('ijazah_terakhir')->getClientOriginalName());
            
            $dokumen = Document::where('id_translator', $translator->id_translator)->first();
            // $currentPhoto = $dokumen->ijazah_terakhir;

            // $userPhoto = public_path('/img/dokumen/').$currentPhoto;
            // if(file_exists($userPhoto)){
            //     @unlink($userPhoto);
            // }

            Document::where('id_translator', $translator->id_translator)
                    ->update([
                        'ijazah_terakhir'    => $request->file('ijazah_terakhir')->getClientOriginalName()
            ]);
        }

        if($request->hasFile('portofolio')){
            $request->file('portofolio')->move(public_path().'/img/dokumen',
            $request->file('portofolio')->getClientOriginalName());
            
            $dokumen = Document::where('id_translator', $translator->id_translator)->first();
            // $currentPhoto = $dokumen->portofolio;

            // $userPhoto = public_path('/img/dokumen/').$currentPhoto;
            // if(file_exists($userPhoto)){
            //     @unlink($userPhoto);
            // }

            Document::where('id_translator', $translator->id_translator)
                    ->update([
                        'portofolio'    => $request->file('portofolio')->getClientOriginalName()
            ]);
        }

        if($request->hasFile('sk_sehat')){
            $request->file('sk_sehat')->move(public_path().'/img/dokumen',
            $request->file('sk_sehat')->getClientOriginalName());
            
            $dokumen = Document::where('id_translator', $translator->id_translator)->first();
            // $currentPhoto = $dokumen->sk_sehat;

            // $userPhoto = public_path('/img/dokumen/').$currentPhoto;
            // if(file_exists($userPhoto)){
            //     @unlink($userPhoto);
            // }

            Document::where('id_translator', $translator->id_translator)
                    ->update([
                        'sk_sehat'    => $request->file('sk_sehat')->getClientOriginalName()
            ]);
        }

        if($request->hasFile('skck')){
            $request->file('skck')->move(public_path().'/img/dokumen',
            $request->file('skck')->getClientOriginalName());
            
            $dokumen = Document::where('id_translator', $translator->id_translator)->first();
            // $currentPhoto = $dokumen->skck;

            // $userPhoto = public_path('/img/dokumen/').$currentPhoto;
            // if(file_exists($userPhoto)){
            //     @unlink($userPhoto);
            // }

            Document::where('id_translator', $translator->id_translator)
                    ->update([
                        'skck'    => $request->file('skck')->getClientOriginalName()
            ]);
        }

        return redirect('/certificate-post')->with('success', 'Data Updated Successfully!');        
    }
    public function indexCertificate()
    {
        $user = Auth::user(); //user yang login
        $id_user = $user->id; //id user yang login

        $translator = Translator::where('id', $id_user)->latest('updated_at')->first();
        $certificate = DB::table('keahlian')
            ->join('master_keahlian', 'keahlian.id_keahlian', '=', 'master_keahlian.id_keahlian')
            ->where("master_keahlian.id_translator", $translator->id_translator)
            ->get();
            return view('pages.klien.post-sertifikat', [
                'user'=>$user,
                'certificate'=>$certificate
                ]);
    }
    public function createCertificate(Request $request)
    {
        $nama_sertifikat=$request->nama_sertifikat;
        $no_sertifikat=$request->no_sertifikat;
        $bukti_dokumen = $request->bukti_dokumen;
        $diterbitkan_oleh=$request->diterbitkan_oleh;
        $masa_berlaku=$request->masa_berlaku;

        $nm_dokumen=$bukti_dokumen->getClientOriginalName();

        $keahlian = new Certificate;
        $keahlian->nama_sertifikat = $nama_sertifikat;
        $keahlian->no_sertifikat = $no_sertifikat;
        $keahlian->bukti_dokumen = $nm_dokumen;
        $keahlian->diterbitkan_oleh = $diterbitkan_oleh;
        $keahlian->masa_berlaku = $masa_berlaku;

        $bukti_dokumen->move(public_path().'/img/sertifikat', $nm_dokumen);

        $keahlian->save();

        $user = Auth::user();

        $translator = Translator::where('id', $user->id)->latest('updated_at')->first();

        $id = Master_keahlian::create([
            'id_keahlian'=>$keahlian->id_keahlian,
            'id_translator'=>$translator->id_translator
        ]);
        
        return redirect('/certificate-post')->with('toast_success', 'Data Created Successfully!');
    }
    public function updateCertificate(Request $request, $id_keahlian)
    {
        $user = Auth::user(); //user yang login

        if($request->isMethod('post')){
            $data = $request->all();

            Certificate::where(['id_keahlian'=>$id_keahlian])->update([
                'nama_sertifikat' => $request->nama_sertifikat,
                'no_sertifikat' => $request->no_sertifikat,
                'diterbitkan_oleh' => $request->diterbitkan_oleh,
                'masa_berlaku' => $request->masa_berlaku,
            ]);

            $keahlian = Certificate::find($id_keahlian);

            if($request->hasFile('bukti_dokumen')){
                $request->file('bukti_dokumen')->move(public_path().'/img/sertifikat',
                $request->file('bukti_dokumen')->getClientOriginalName());
                
                // $currentPhoto = $keahlian->bukti_dokumen;
                
                // $userPhoto = public_path('/img/sertifikat/').$currentPhoto;
                // if(file_exists($userPhoto)){
                //     @unlink($userPhoto);
                // }
                
                Certificate::where('id_keahlian', $keahlian->id_keahlian)
                        ->update([
                            'bukti_dokumen'    => $request->file('bukti_dokumen')->getClientOriginalName()
                ]);
            }
        }

        return redirect('/certificate-post')->with('success', 'Data Updated Successfully!');
    }
    public function deleteCertificate($id_keahlian){
        DB::table('keahlian')->where('id_keahlian', $id_keahlian)->delete();
        return redirect('/certificate-post')->with('success', 'Data sertifikat berhasil dihapus'); 
    }
}