<?php

namespace App\Http\Controllers\Klien;
use App\Models\User;
use App\Models\Klien\Order;
use App\Models\Klien\Klien;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class BiodataKlienController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $klien=User::where('id', $user->id)->with('klien')->first();
        // $biodata=Klien::wi->first();
        // return ($klien);exit();
        return view('pages.klien.home', compact('user', 'klien'));
    }

    //buat menu
    public function index(){
        $users = Auth::user();
        $klien=Klien::where('id', $users->id)->first();
        // return ($klien); exit();
        if(empty($klien))
        return view('pages.klien.TambahDataKlien', compact('users', 'klien')); 
        else
        return view('pages.klien.biodata', compact('users', 'klien'));
    }

    public function show(Klien $klien){
    }

    public function store(Request $request)
    {
        // $messages = [
        //     'required' => ':wajib diisi !!!',
        //     'numeric'=>'inputan harus angka',
        // ];
        // //return($request);
        // $this->validate($request,[
        //     'nik'=>'required|numeric',
        //     'alamat' => 'required',
        //     'provinsi' => 'required',
        //     'kabupaten' => 'required',
        //     'kecamatan' => 'required',
        //     'kode_pos' => 'required|numeric',
        //     'tgl_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'no_telp' => 'required|numeric',
        //     'foto_ktp'=>'required|file|max:10000',
        // ], $messages);

        $user = Auth::user();
        $id = $user->id;
        //$path_template = Storage::putFileAs('public/img/biodata', $request->file('foto_ktp'));
        
        $profile = new Klien;
        $profile->id = $id;
        $profile->nik = $request->nik;
        $profile->alamat = $request->alamat;
        $profile->provinsi = $request->provinsi;
        $profile->kabupaten = $request->kabupaten;
        $profile->kecamatan = $request->kecamatan;
        $profile->kode_pos = $request->kode_pos;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->no_telp = $request->no_telp;
        //$profile->foto_ktp = $request->foto_ktp;
        $profile->save();

        return redirect()->route('profile-klien.index')->with('success', 'Profile anda berhasil ditambahkan'); 
        //return redirect('/profile-klien')->with('success', 'Profile anda berhasil ditambahkan');
    }


    public function update(Request $request, $id){
        $user = Auth::user();
        $id_user = $user->id;

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            
        ]);

        if(!empty($request->password)){
            $this->validate($request,[
                'password' => 'sometimes|min:8',
            ]);

            User::where('id', $user->id)->update([
                'password' => Hash::make($request ['password'])
            ]);
        }

        if($request->hasFile('profile_photo_path')){
            
            $request->file('profile_photo_path')->move('images/',
            $request->file('profile_photo_path')->getClientOriginalName()); //Memindahkan request photo ke folder image

            $currentPhoto = $user->profile_photo_path;

            $userPhoto = public_path('images/').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }


            User::where('id', $user->id)
                    ->update([
                        'profile_photo_path'    => $request->file('profile_photo_path')->getClientOriginalName()
            ]);
        }

        User::where('id', $user->id)
                    ->update([
                        'name'    => $request->name,
                        'email'     => $request->email,
                    ]);

        return redirect('/profile-klien')->with('success', 'Profile anda berhasil diubah');
    }
    
    public function updateBioKlien(Request $request, $id_klien){

        // $messages = [
        //     'required' => ':wajib diisi !!!',
        //     'numeric'=>'inputan harus angka',
        // ];

        // $this->validate($request,[
        //     'id' => 'required',
        //     'nik'=>'required|numeric',
        //     'alamat' => 'required',
        //     'provinsi' => 'required',
        //     'kabupaten' => 'required',
        //     'kecamatan' => 'required',
        //     'kode_pos' => 'required|numeric',
        //     'tgl_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'no_telp' => 'required|numeric',
        //     //'foto_ktp'=>'required|file|max:10000',
        // ], $messages);

        $user = Auth::user();
        $id_user = $user->id;
      
        $klien= Klien::find($id_klien);
        //$path_template = Storage::putFileAs('public/img/biodata', $request->file('foto_ktp'));
        
        Klien::where('id_klien', $klien->id_klien)->update([
            'id' => $request->id,
            'nik'=>$request->nik,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            //'foto_ktp'=>$path_template,
        ]);

        if($request->hasFile('foto_ktp')){
            $request->file('foto_ktp')->move(public_path().'\img\biodata',
            $request->file('foto_ktp')->getClientOriginalName());
            
            $translator = Klien::where('id', $id_user)->first();
            $currentPhoto = $translator->foto_ktp;

            $userPhoto = public_path('\img\biodata').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }

            Klien::where('id', $id_user)
                    ->update([
                        'foto_ktp'    => $request->file('foto_ktp')->getClientOriginalName()
            ]);
        }

        return redirect('/profile-klien')->with('success', 'Profile anda berhasil diubah');
    }
}