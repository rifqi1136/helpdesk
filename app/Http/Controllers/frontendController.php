<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Keluhan;
use App\KTP;
use App\Perijinan;
use App\suratkematian;
use Validator;
use Session;
use DB;

class frontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $keluhanfront = Keluhan::all();
         return view('index', compact(['keluhanfront']));
    }

     public function showartikel()
    {
         $artikel = Artikel::all();
         $artikel = Artikel::orderBy('id_post','desc')->get();
        return view('artikel', ['artikel' => $artikel]);
    }

    public function showkeluhan()
    {
         $keluhan = Keluhan::all();
         return view('data_keluhan', compact(['keluhan']));
    }

     public function showiumkm()
    {
         $perijinan = Perijinan::all();
        return view('data_iumkm', ['perijinan' => $perijinan]);
    }


     public function showktp()
    {
           $ktp = KTP::all();
         return view('data_ktp', ['ktp' => $ktp]);
    }

    public function showkematian(){
       $kematian = suratkematian::all();
        return view('kematian', ['kematian' => $kematian]);
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
        
    }

    public function tambahkelfront(Request $request)
    {
        $rules = [
            'nama_lengkap'          => 'required|min:5|max:35',
            'alamat'                 => 'required|max:40',
            'keluhan'              => 'required'
        ];
 
        $messages = [
            'nama_lengkap.required'         => 'Nama Lengkap wajib diisi',
            'nama_lengkap.min'              => 'Nama lengkap minimal 5 karakter',
            'nama_lengkap.max'              => 'Nama lengkap maksimal 35 karakter',
            'alamat.required'               => 'alamat wajib diisi',
            'keluhan'                       =>'keluhan harus diisi'
            
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $kel = new Keluhan;
        $kel->nama_lengkap = $request->nama_lengkap;
        $kel->alamat = $request->alamat;
        $kel->keluhan = $request->keluhan;
        $kel->status_baca="Belum dibaca";
        $kel->status_acc="Belum diacc";
        $simpan = $kel->save();
 
        if($simpan){
            Session::flash('success',);
            return redirect('/keluhanfront');
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect()->route('/keluhanfront');
        } 
    }

    public function tambahiumkm(Request $request)
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
        return redirect()->back();
    }

    public function tambahktp(Request $request)
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
            return redirect('ktpfront');
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect()->route('KTP');
        }
    }

     public function tambahkematian(Request $request)
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
        return redirect('/kematianfront')->with('status','Data berhasil di tambahkan');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

       public function showartikeldetail($id)
    {
         $artikel = DB::table('artikel')->where('id_post', $id)->first();
        return view('artikel_detail', ['artikel'=>$artikel]);
    }
    
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

    }

    public function updateiumkm(Request $request)
    {
        $Perijinan = Perijinan::where('nik',$request->nik)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_telp' =>$request->no_telp,
            'kegiatan_usaha' =>$request->kegiatan_usaha,
            'jumlah_modal' =>$request->jumlah_modal,
            'surat_pengantar' =>$request->surat_pengantar
        ]);
                  Session::flash('edit',);
        return redirect('/iumkmfront');
    }

    public function updatekeluhan(Request $request)
    {
        $keluhan = Keluhan::where('id_kel',$request->id_kel)
 ->update([
    'nama_lengkap' => $request->nama_lengkap,
    'alamat' => $request->alamat,
    'keluhan' =>$request->keluhan,
    'status_baca'=>"Belum di baca",
    'status_acc'=>"Belum Acc"
  ]);
        Session::flash('edit');
        return redirect('/keluhanfront');
    }

    public function updatektp(Request $request)
    {
        $ktp = KTP::where('nik',$request->nik)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tempat_lahir' =>$request->tempat_lahir,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'jenkel' =>$request->jenkel,
            'goldar' =>$request->goldar,
            'status' =>$request->status,
            'agama' =>$request->agama,
            'pekerjaan' =>$request->pekerjaan,
            'kewarganegaraan' =>$request->kewarganegaraan,
            'masa_berlaku' =>$request->masa_berlaku,
            'foto_sendiri' =>$request->foto_sendiri,
            'foto_ttd' =>$request->foto_ttd,
            'foto_kk' =>$request->foto_kk
        ]);
                  Session::flash('edit',);
        return redirect('/ktpfront');
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
