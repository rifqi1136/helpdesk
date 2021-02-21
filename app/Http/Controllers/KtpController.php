<?php

namespace App\Http\Controllers;

use App\KTP;
use Illuminate\Http\Request;
use Validator;
use Session;
use DB;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ktp = KTP::all();
         return view('Admin/dataKTP', ['ktp' => $ktp]);
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
        $rules = [
            'nik'          => 'required',
            'nama'          => 'required',
            'alamat'                 => 'required',
            'tempat_lahir'              => 'required',
            'tanggal_lahir'              =>'required',
            'jenkel'              =>'required',
            'goldar'              =>'required',
            'status'              =>'required',
            'agama'              =>'required',
            'pekerjaan'              =>'required',
            'kewarganegaraan'              =>'required',
            'masa_berlaku'              =>'required',
            'foto_sendiri'              =>'required',
            'foto_ttd'              =>'required'

        ];
 
        $messages = [
            'nik.required'           => 'Id wajib di isi',
            'nama.required'         => 'Nama Lengkap wajib diisi',
            'nama.min'              => 'Nama lengkap minimal 5 karakter',
            'nama.max'              => 'Nama lengkap maksimal 35 karakter',
            'alamat.required'               => 'alamat wajib diisi',
            
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $ktp = new KTP;
        $ktp->nik = $request->nik;
        $ktp->nama = $request->nama;
        $ktp->alamat = $request->alamat;
        $ktp->tempat_lahir = $request->tempat_lahir;
        $ktp->tanggal_lahir=$request->tanggal_lahir;
        $ktp->jenkel = $request->jenkel;
        $ktp->goldar = $request->goldar;
        $ktp->status = $request->status;
        $ktp->agama = $request->agama;
        $ktp->pekerjaan = $request->pekerjaan;
        $ktp->kewarganegaraan = $request->kewarganegaraan;
        $ktp->masa_berlaku = $request->masa_berlaku;
        $ktp->foto_sendiri = $request->foto_sendiri;
        $ktp->foto_ttd = $request->foto_ttd;
        $ktp->foto_kk = $request->foto_kk;
        $simpan = $ktp->save();
 
        if($simpan){
            Session::flash('sukses');
            return redirect()->route('KTP');
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect()->route('KTP');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(KTP $ktp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(KTP $ktp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $ktp = KTP::where('nik',$request->nik)
 ->update([
    'nama' => $request->nama,
    'alamat' => $request->alamat,
    'tempat_lahir'=>$request->tempat_lahir,
    'tanggal_lahir'=>$request->tanggal_lahir,
    'jenkel'=>$request->jenkel,
    'goldar'=>$request->goldar,
    'status'=>$request->status,
    'agama'=>$request->agama,
    'pekerjaan'=>$request->pekerjaan,
    'kewarganegaraan'=>$request->kewarganegaraan,
    'masa_berlaku'=>$request->masa_berlaku,
    'foto_sendiri'=>$request->foto_sendiri,
    'foto_ttd'=>$request->foto_ttd,
    'foto_kk'=>$request->foto_kk
  ]);
        Session::flash('edit');
        return redirect('KTP');
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($ktp)
    {
                DB::table('ktp')->where('nik', $ktp)->delete();
         Session::flash('hapus');
        return redirect('KTP')->with('delete');
    }
}
