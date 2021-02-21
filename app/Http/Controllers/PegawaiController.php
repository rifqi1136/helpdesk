<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Validator;
use Session;
use DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
         return view('Admin/data_pegawai', ['pegawai' => $pegawai]);
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
           
            'nama_pegawai'          => 'required|min:5|max:35',
            'alamat'                 => 'required',
            'no_telp'              => 'required|max:12',
            'bagian'              =>'required'
        ];
 
        $messages = [
            'id_pegawai.required'           => 'Id wajib di isi',
            'nama_pegawai.required'         => 'Nama Lengkap wajib diisi',
            'nama_pegawai.min'              => 'Nama lengkap minimal 5 karakter',
            'nama_pegawai.max'              => 'Nama lengkap maksimal 35 karakter',
            'alamat.required'               => 'alamat wajib diisi',
            'no_telp.max'                   => 'No telepon tidak nnboleh lebih dari 12 karakter'
            
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $peg = new Pegawai;
    
        $peg->nama_pegawai = $request->nama_pegawai;
        $peg->alamat = $request->alamat;
        $peg->no_telp = $request->no_telp;
        $peg->bagian=$request->bagian;
        $simpan = $peg->save();
 
        if($simpan){
            Session::flash('sukses',);
            return redirect()->route('pegawai');
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect()->route('pegawai');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
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
         $pegawai = Pegawai::where('id_pegawai',$request->id_pegawai)
 ->update([
    'nama_pegawai' => $request->nama_pegawai,
    'alamat' => $request->alamat,
    'no_telp' =>$request->no_telp,
    'bagian'=>$request->bagian
  ]);
        Session::flash('edit',);
        return redirect('/pegawai');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($pegawai)
    {
         DB::table('pegawai')->where('id_pegawai', $pegawai)->delete();
          Session::flash('hapus',);
        return redirect('pegawai')->with('delete');
    }
}
