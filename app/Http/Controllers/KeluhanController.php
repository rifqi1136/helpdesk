<?php

namespace App\Http\Controllers;

use App\Keluhan;
use Illuminate\Http\Request;
use Validator;
use Session;
use DB;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $keluhan = Keluhan::all();
         $keluhan = Keluhan::orderBy('id_kel','desc')->get();
        return view('Admin/datakeluhan', ['keluhan' => $keluhan]);
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
            Session::flash('sukses',);
            return redirect()->route('keluhan');
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect()->route('Admin/datakeluhan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function show(Keluhan $keluhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluhan $keluhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $kelupdate = Keluhan::find($keluhan);

        // $kelupdate->nama_lengkap = $request->nama_lengkap;
        // $kelupdate->alamat = $request->alamat;
        // $kelupdate->keluhan = $request->keluhan;
        // $kelupdate->status_baca="Belum dibaca";
        // $kelupdate->status_acc="Belum diacc";
        // $kelupdate->save();
        $keluhan = Keluhan::where('id_kel',$request->id_kel)
 ->update([
    'nama_lengkap' => $request->nama_lengkap,
    'alamat' => $request->alamat,
    'keluhan' =>$request->keluhan,
    'status_baca'=>"Belum di baca",
    'status_acc'=>"Belum Acc"
  ]);
        Session::flash('edit');
        return redirect('/keluhan');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function destroy($keluhan)
    {
         DB::table('keluhan')->where('id_kel', $keluhan)->delete();
         Session::flash('hapus');
        return redirect('keluhan')->with('delete');
    }
}
