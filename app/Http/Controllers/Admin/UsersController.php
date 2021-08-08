<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.admin.users', ['users' => $users]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $this->validate($request,[
            'role' => 'required',
        ]);

        $users = User::find($id);
        
        User::where('id', $users->id)
                    ->update([
                        'role'    => $request->role,
                    ]);
        return redirect('/users')->with('success', 'Role user berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/users')->with('success', 'Data user berhasil dihapus');
    }

    public function download($id)
    {
        $dl = User::find($id);

        $currentPhoto = $dl->profile_photo_path;

        $pathToFile = public_path('images/').$currentPhoto;
        
        return  response()->download($pathToFile);
    }

    public function updateStatus($user_id, $status_code){
        try {
            $update_user = User::whereId($user_id)->update([
                'status'=>$status_code
            ]);

            if($update_user){
                return redirect()->route('users.index')->with('success', 'User Status Updated Successfully. ');
            }
            return redirect()->route('users.index')->with('error', 'Fail to update user status. ');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
