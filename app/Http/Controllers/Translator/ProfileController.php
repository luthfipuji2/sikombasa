<?php
namespace App\Http\Controllers\Translator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Translator\Translator;
use App\Models\Translator\Certificate;
use App\Models\Translator\Master_keahlian;

use Illuminate\Http\Request;
class ProfileController extends Controller
{
    public function index(Translator $translator, Certificate $certificate)
    {
        $user = Auth::user(); //user yang login
        $id_user = $user->id; //id user yang login
        $data = Translator::where('id', $user->id)->latest('updated_at')->first();

        $certificate = DB::table('keahlian')
            ->join('master_keahlian', 'keahlian.id_keahlian', '=', 'master_keahlian.id_keahlian')
            ->where("master_keahlian.id_translator", $data->id_translator)
            ->get();
        
        return view('pages.translator.profile', [
            'data'=>$data,
            'certificate'=>$certificate
            ]);

    }

    public function update(Request $request, Translator $translator) {

        $user = Auth::user(); //user yang login
        $id_user = $user->id; //id user yang login

        $translator = Translator::where('id', $user->id)->latest('updated_at')->first();

        Translator::where('id_translator', $translator->id_translator)->update([
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
            $request->file('foto_ktp')->move(public_path().'/img/biodata',
            $request->file('foto_ktp')->getClientOriginalName());
            
            // $translator = Translator::where('id', $id_user)->latest('updated_at')->first();
            // $currentPhoto = $translator->foto_ktp;

            // $userPhoto = public_path('/img/biodata/').$currentPhoto;
            // if(file_exists($userPhoto)){
            //     @unlink($userPhoto);
            // }

            Translator::where('id_translator', $translator->id_translator)
                    ->update([
                        'foto_ktp'    => $request->file('foto_ktp')->getClientOriginalName()
            ]);
        }

        return redirect('/profile-translator')->with('success', 'Data Updated Successfully!');       
    }
    public function createCertificate(Request $request){

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
        
        return redirect('/profile-translator')->with('toast_success', 'Data Created Successfully!');
    }
    public function updateCertificate(Request $request, $id_keahlian){
    
        $keahlian = Certificate::find($id_keahlian);
        Certificate::where('id_keahlian', $keahlian->id_keahlian)
                    ->update([
                        'nama_sertifikat' => $request->nama_sertifikat,
                        'no_sertifikat' => $request->no_sertifikat,
                        'diterbitkan_oleh' => $request->diterbitkan_oleh,
                        'masa_berlaku' => $request->masa_berlaku
                    ]);

        if($request->hasFile('bukti_dokumen')){
            $request->file('bukti_dokumen')->move(public_path().'/img/sertifikat/',
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

        return redirect('/profile-translator')->with('success', 'Data Updated Successfully!');

    }
    public function deleteCertificate($id_keahlian){
        DB::table('keahlian')->where('id_keahlian', $id_keahlian)->delete();
        return redirect('/profile-translator')->with('success', 'Data sertifikat berhasil dihapus'); 
    }

}
?>