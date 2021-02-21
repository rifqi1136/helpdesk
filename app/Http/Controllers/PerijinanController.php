<?php

namespace App\Http\Controllers;

use App\Perijinan;
use Validator;
use Illuminate\Http\Request;
use DB;
use Session;

class PerijinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perijinan = Perijinan::all();
        return view('Admin/Perijinan', ['perijinan' => $perijinan]);
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
        $Perijinan = new Perijinan;
        $Perijinan->nik = $request->nik;
        $Perijinan->nama_lengkap = $request->nama_lengkap;
        $Perijinan->alamat = $request->alamat;
        $Perijinan->no_telp = $request->no_telp;
        $Perijinan->kegiatan_usaha = $request->kegiatan_usaha;
        $Perijinan->sarana_usaha = $request->sarana_usaha;
        $Perijinan->jumlah_modal = $request->jumlah_modal;
        $Perijinan->surat_pengantar = $request->surat_pengantar;

        $Perijinan->save();
        Session::flash('sukses');
        return redirect('/Perijinan')->with('status','Data berhasil di tambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function show(Perijinan $perijinan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perijinan $perijinan)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Perijinan = Perijinan::where('nik',$request->nik)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_telp' =>$request->no_telp,
            'kegiatan_usaha' =>$request->kegiatan_usaha,
            'sarana_usaha' =>$request->sarana_usaha,
            'jumlah_modal' =>$request->jumlah_modal,
            'surat_pengantar' =>$request->surat_pengantar
        ]);
                  Session::flash('edit',);
        return redirect('/Perijinan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function destroy($perijinan)
    {
        DB::table('perijinan')->where('nik', $perijinan)->delete();
                  Session::flash('hapus',);
        return redirect('/Perijinan')->with('delete');
    }
}
