<?php
namespace App\Http\Controllers\Translator;
use App\Http\Controllers\Controller;
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
use App\Models\Admin\Seleksi_berkas;
use App\Models\User;

use Illuminate\Http\Request;
class CareerController extends Controller
{
    public function index()
    {
        // $career = DB::table('translator')->get();
        $user = Auth::user();
        // $provinces = Province::pluck('name', 'id');
        return view('pages.translator.biodata', compact('user'));
    }
    public function store(Request $request){

        $this->validate($request, [
            'nik'           => 'required|size:16|unique:translator',
            'nama'      => 'required',
            'keahlian'      => 'required',
            'alamat'        => 'required|string|max:255',
            'provinsi'      => 'required|string|max:255',
            'kabupaten'     => 'required|string|max:255',
            'kecamatan'     => 'required|string|max:255',
            'kode_pos'      => 'required|numeric',
            'nama_bank'     => 'required|string',
            'nama_rekening' => 'required|string',
            'rekening_bank' => 'required',
            'tgl_lahir'     => 'required|date',
            'jenis_kelamin' => 'required',
            'no_telp'       => 'required|numeric',
            'foto_ktp'      => 'required|image'
        ]);

        $foto_ktp = $request->foto_ktp;
        $id = $request->id;
        $nm_ktp=$foto_ktp->getClientOriginalName();

        // $profile_photo_path = $request->profile_photo_path;
        // $nm_pp = $profile_photo_path->getClientOriginalName();
        // $path = $profile_photo_path->storeAs('public/img/profile', $nm_pp);

        $translator = new Translator;
        $translator->id = $id;
        $translator->nik = $request->nik;
        $translator->nama = $request->nama;
        $translator->keahlian = $request->keahlian;
        $translator->alamat = $request->alamat;
        $translator->provinsi = $request->provinsi;
        $translator->kecamatan = $request->kecamatan;
        $translator->kabupaten = $request->kabupaten;
        $translator->kode_pos = $request->kode_pos;
        $translator->nama_bank = $request->nama_bank;
        $translator->nama_rekening = $request->nama_rekening;
        $translator->rekening_bank = $request->rekening_bank;
        $translator->tgl_lahir = $request->tgl_lahir;
        $translator->jenis_kelamin = $request->jenis_kelamin;
        $translator->no_telp = $request->no_telp;
        $translator->foto_ktp = $nm_ktp;

        $foto_ktp->move(public_path().'\img\biodata', $nm_ktp);
        // $profile_photo_path->move(public_path().'\img\profile', $nm_pp);

        $translator->save();

        $id = Seleksi_berkas::create([
            'id_translator'=>$translator->id_translator
        ]);

        return redirect('/document')->with('toast_success', 'Data Created Successfully!');
    }
    public function indexDocument()
    {
        $user = Auth::user();
        return view('pages.translator.document', compact('user'));
    }
    public function indexCertificate()
    {
        $user = Auth::user();
        return view('pages.translator.certificate', compact('user'));
    }
    public function submitCertificate(Request $request){

        // $this->validate($request, [
        //     'no_sertifikat'     => 'required',
        //     'nama_sertifikat'   => 'required',
        //     'bukti_dokumen'     => 'required|image',
        //     'diterbitkan_oleh'  => 'required',
        //     'masa_berlaku'      => 'required|date'
        // ]);

        $nama_sertifikat=$request->nama_sertifikat;
        $no_sertifikat=$request->no_sertifikat;
        $bukti_dokumen=$request->bukti_dokumen;
        $diterbitkan_oleh=$request->diterbitkan_oleh;
        $masa_berlaku=$request->masa_berlaku;

        // $nm_dokumen=$bukti_dokumen->getClientOriginalName();
        
        $total = count($no_sertifikat);
        
        for($i=0;$i<$total;$i++)
        {
            $data['no_sertifikat'] = $no_sertifikat[$i];
            $data['nama_sertifikat'] = $nama_sertifikat[$i];
            $data['bukti_dokumen'] = $bukti_dokumen[$i]->getClientOriginalName();
            $data['diterbitkan_oleh'] = $diterbitkan_oleh[$i];
            $data['masa_berlaku'] = $masa_berlaku[$i];

            $bukti_dokumen[$i]->move(public_path().'\img\sertifikat', $bukti_dokumen[$i]->getClientOriginalName());

            $keahlian = Certificate::create($data);

            $user = Auth::user();

            $translator = Translator::where('id', $user->id)->first();

            $id = Master_keahlian::create([
                'id_keahlian'=>$keahlian->id_keahlian,
                'id_translator'=>$translator->id_translator
            ]);
        }


        return redirect('/progress')->with('toast_success', 'Data Created Successfully!');
    }
    public function submitDocument(Request $request){
        
        $this->validate($request, [
            'cv'                   => 'required|image',
            'ijazah_terakhir'      => 'required|image',
            'portofolio'           => 'required|image',
            'sk_sehat'             => 'required|image',
            'skck'                 => 'required|image'
        ]);

        $user = Auth::user();

        $translator = Translator::where('id', $user->id)->first();

        $cv = $request->cv;
        $ijazah_terakhir = $request->ijazah_terakhir;
        $portofolio = $request->portofolio;
        $sk_sehat = $request->sk_sehat;
        $skck = $request->skck;

        $nm_cv=$cv->getClientOriginalName();
        $nm_ijazah=$ijazah_terakhir->getClientOriginalName();
        $nm_portofolio=$portofolio->getClientOriginalName();
        $nm_sk=$sk_sehat->getClientOriginalName();
        $nm_skck=$skck->getClientOriginalName();

        // Document::create($request->all());

        $dokumen = new Document;
        $dokumen->id_translator = $translator->id_translator;
        $dokumen->id = $user->id;
        $dokumen->cv = $nm_cv;
        $dokumen->ijazah_terakhir = $nm_ijazah;
        $dokumen->portofolio = $nm_portofolio;
        $dokumen->sk_sehat = $nm_sk;
        $dokumen->skck = $nm_skck;

        $cv->move(public_path().'\img\dokumen', $nm_cv);
        $ijazah_terakhir->move(public_path().'\img\dokumen', $nm_ijazah);
        $portofolio->move(public_path().'\img\dokumen', $nm_portofolio);
        $sk_sehat->move(public_path().'\img\dokumen', $nm_sk);
        $skck->move(public_path().'\img\dokumen', $nm_skck);

        $dokumen->save();
        return redirect('/certificate')->with('toast_success', 'Data Created Successfully!');

        // dd($request->all());
    }
    public function indexProgress(){

        $user = Auth::user();
        return view('pages.translator.progress', compact('user'));
    }
}
?>