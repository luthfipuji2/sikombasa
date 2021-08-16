<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Admin::where('id', $user->id)->exists()) {
            $user = Auth::user(); //current authenticated user
             //get the current authenticated user's id
            $users = DB::table('users') //join table users and table user_details base from matched id;
                ->join('admin', 'users.id', '=', 'admin.id')
                ->where("users.id",$user->id) //find the record matched to the current authenticated user's id from the joint table records
                ->first(); //get the record
        return view('pages.admin.Profile', compact('users')); 
        }
        else {
            $users = Auth::user(); //current authenticated user
            return view('pages.admin.TambahDataAdmin', compact('users'));
        }
        
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
        ]);

        $user = Auth::user();
        $id = $user->id;
        
        Admin::create([
            'id' => $request->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos
        ]);

        return redirect('/profile-admin')->with('success', 'Profile anda berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //dd($request->all());
        $user = Auth::user();

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'profile_photo_path' => 'required|mimes:jpeg,jpg,png|max:2000'
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

        return redirect('/profile-admin')->with('success', 'Profile anda berhasil diubah');
    }

    public function updateBiodata(Request $request, $id_admin)
    {
        $this->validate($request,[
            'id' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
        ]);

        $user = Auth::user();
      
        $admin= Admin::find($id_admin);
        
        Admin::where('id_admin', $admin->id_admin)->update([
            'id' => $request->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos
        ]);

        return redirect('/profile-admin')->with('success', 'Profile anda berhasil diubah');
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
}
