<?php

namespace App\Http\Controllers;

use App\suratkematian;
use Validator;
use Illuminate\Http\Request;
use DB;
use Session;

class SuratKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kematian = suratkematian::all();
        return view('Admin/SuratKematian', ['kematian' => $kematian]);
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
        $surat = new suratkematian;
        $surat->nik = $request->nik;
        $surat->nama = $request->nama;
        $surat->umur = $request->umur;
        $surat->jenkel = $request->jenkel;
        $surat->tanggal_lahir = $request->tanggal_lahir;
        $surat->tanggal_meninggal = $request->tanggal_meninggal;
        $surat->agama = $request->agama;
        $surat->pekerjaan = $request->pekerjaan;
        $surat->pendidikan = $request->pendidikan;
        $surat->alamat=$request->alamat;
        $surat->keterangan=$request->keterangan;
        $surat->foto_suratketrs=$request->foto_suratketrs;
        $surat->foto_ktp=$request->foto_ktp;
        $surat->foto_kk=$request->foto_kk;

        $surat->save();
        Session::flash('sukses');
        return redirect('/suratkematian')->with('status','Data berhasil di tambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function show(suratkematian $surat)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function edit(suratkematian $surat)
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
        $Perijinan = suratkematian::where('nik',$request->nik)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
	        'jenkel' => $request->jenkel,
	        'tanggal_lahir' => $request->tanggal_lahir,
	        'tanggal_meninggal' => $request->tanggal_meninggal,
	        'agama' => $request->agama,
	        'pekerjaan' => $request->pekerjaan,
	        'pendidikan' => $request->pendidikan,
	        'alamat' => $request->alamat,
	        'keterangan' => $request->keterangan,
	        'foto_suratketrs' => $request->foto_suratketrs,
	        'foto_ktp' => $request->foto_ktp,
	        'foto_kk' => $request->foto_kk
	        ]);
                  Session::flash('edit',);
        return redirect('/suratkematian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function destroy($surat)
    {
        DB::table('kematian')->where('nik', $surat)->delete();
                  Session::flash('hapus',);
        return redirect('/suratkematian')->with('delete');
    }
}
