<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BankExport;
use App\Http\Controllers\Controller;
use App\Models\Admin\Bank;
use Illuminate\Http\Request;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();
        return view('pages.admin.DaftarBank', ['bank' => $bank]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'nama_bank' => 'required',
            'nama_rekening' => 'required',
            'no_rekening' => 'required|integer',
        ]);

        Bank::create([
            'nama_bank' => $request->nama_bank,
            'nama_rekening' => $request->nama_rekening,
            'no_rekening' => $request->no_rekening,
        ]);

        return redirect('/bank')->with('success', 'Data Bank berhasil ditambahkan');
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
    public function edit(Bank $bank)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_bank)
    {
        $this->validate($request,[
            'nama_bank' => 'required',
            'nama_rekening' => 'required',
            'no_rekening' => 'required|integer',
        ]);

        $bank = Bank::find($id_bank);
        
        Bank::where('id_bank', $bank->id_bank)
                    ->update([
                        'nama_bank'    => $request->nama_bank,
                        'nama_rekening'     => $request->nama_rekening,
                        'no_rekening'   => $request->no_rekening,
                    ]);
        return redirect('/bank')->with('success', 'Data Bank berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        Bank::destroy($bank->id_bank);
        return redirect('/bank')->with('success', 'Data Bank berhasil dihapus');
    }

}
