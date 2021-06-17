<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Translator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarTranslatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $trans = DB::table('translator')
            ->join('users', 'translator.id', '=', 'users.id')
            ->get();

       

        return view('pages.admin.DaftarTranslator',  compact('trans'));
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
    public function update(Request $request, $id_translator)
    {
        $this->validate($request,[
            'status' => 'required',
        ]);

        $trans = Translator::find($id_translator);
        
        Translator::where('id_translator', $trans->id_translator)
                    ->update([
                        'status'    => $request->status,
                    ]);

        return redirect('/daftar-translator')->with('success', 'Status Translator berhasil diubah');
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

    public function download($id_translator)
    {
        $dl = Translator::find($id_translator);

        $foto_ktp = $dl->foto_ktp;

        $pathToFile = public_path('img/biodata/').$foto_ktp;
        
        return response()->download($pathToFile);
    }
}
