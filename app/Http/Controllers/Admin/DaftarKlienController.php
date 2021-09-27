<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Klien\Klien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarKlienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        // $klien = DB::table('klien')
        //     ->join('users', 'klien.id', '=', 'users.id')
        //     ->with('provinsi')
        //     ->get();
        $users = User::all();
        $klien=Klien::join('users', 'klien.id', '=', 'users.id')
                    ->with('provinsi')
                    ->with('kecamatan')
                    ->with('kabupaten')
                    ->with('desa')
                    ->get();

        // return ($klien); exit();
        return view('pages.admin.DaftarKlien',  compact('klien', 'users'));
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
        //
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

    public function download($id_klien)
    {
        $dl = Klien::find($id_klien);

        $foto_ktp = $dl->foto_ktp;

        $pathToFile = public_path('img/biodata/').$foto_ktp;
        
        return response()->download($pathToFile);
    }
}
