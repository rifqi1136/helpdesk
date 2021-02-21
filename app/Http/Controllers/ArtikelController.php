<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Session;
use DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $artikel = Artikel::all();
         $artikel = Artikel::orderBy('id_post','desc')->get();
        return view('Admin/artikel', ['artikel' => $artikel]);
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
        $this->validate($request, [
        'judul'=>'required',
        'gamabar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
    ]);
 
    // menyimpan data file yang diupload ke variabel $file
    $file = $request->file('gamabar');
 
    $nama_file = time()."_".$file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'data_upload';
    $file->move($tujuan_upload,$nama_file);
 
 
     $art = new Artikel;
        $art->judul = $request->judul;
        $art->deskripsi = $request->deskripsi;
        $art->gamabar = $nama_file;
        $simpan = $art->save();
 
        if($simpan){
            Session::flash('sukses',);
            return redirect()->route('artikel');
        } else {
            Session::flash('errors', ['' => 'Data gagal di tambahkan']);
            return redirect()->route('Admin/datakeluhan');
        }
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $this->validate($request, [
        'judul'=>'required',
        'gamabar' => 'required|file|image|mimes:jpeg,png,jpg|max:4048',
    ]);
 

         // menyimpan data file yang diupload ke variabel $file

    $file = $request->file('gamabar');
 
    $namafile = time()."_".$file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'data_upload ';
    $file->move($tujuan_upload,$namafile);
 
 

         $artikel = Artikel::where('id_post',$request->id_post)
 ->update([
    'judul' => $request->judul,
    'deskripsi' => $request->deskripsi,
    'gamabar' =>$namafile
  ]);
        Session::flash('edit');
        return redirect('/artikel');
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($artikel)
    {
         DB::table('artikel')->where('id_post', $artikel)->delete();
        Session::flash('hapus');
        return redirect('artikel');
    }
    
}
