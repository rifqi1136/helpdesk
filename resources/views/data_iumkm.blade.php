@extends('mainfrontend')

@section('Data Keluhan','title')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <br>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengajuan IUMKM</h1>
    
        </div>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Data</button><br><br>

         <!-- The Modal tambah-->
    <div class="modal" id="myModal">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Perijinan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{ action('frontendController@tambahiumkm') }}">
            <div class="row">
                <div class="col-xl-6 bg-light">
 
                        {{ csrf_field() }}
 
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" placeholder="NIK ..">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
 
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap ..">
 
                             @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
 
                        </div>
 
 
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap .."></textarea>
 
                             @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
 
                        </div>
                        <div class="form-group">
                            <label>No.Telp</label>
                            <input type="text" name="no_telp" class="form-control" placeholder="No.Telepon ..">
 
                            @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
 
                        </div>
 
                         </div>
                         <div class="col-xl-6 bg-light">
                          <div class="form-group">
                            <label>Kegiatan Usaha</label>
                            <input type="text" name="kegiatan_usaha" class="form-control" placeholder="Kegiatan Usaha ..">
 
                            @error('kegiatan_usaha')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
 
                        </div>
 
                        <div class="form-group">
                            <label>Sarana Usaha</label>
                            <input type="text" name="sarana_usaha" class="form-control" placeholder="Sarana Usaha ..">
 
                             @error('sarana_usaha')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
 
                        </div>
 
 
                        <div class="form-group">
                            <label>Jumlah Modal Rp.</label>
                            <textarea name="jumlah_modal" class="form-control" placeholder="jumlah modal .."></textarea>
 
                             @error('jumlah_modal')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
 
                        </div>
                        <div class="form-group">
                            <label>Surat Pengantar</label>
                            <input type="file" name="surat_pengantar" class="form-control" placeholder="Masukan Foto Surat Pengantar ..">
 
                            @error('surat_pengantar')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
 
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                      
                     </div>
              </form>
        </div>

    
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

    </div>
  </div>
</div>

        <div class="table-responsive">
        <div class="table-responsive">
        <table  class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No.Telp</th>
                    <th scope="col">Kegiatan Usaha</th>
                    <th scope="col">Sarana Usaha</th>
                    <th scope="col">Jumlah Modal</th>
                    <th scope="col">Surat Pengantar</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($perijinan as $ijin)
                            <tr>
                                <td>{{ $ijin->nama_lengkap }}</td>
                                <td>{{ $ijin->alamat }}</td>
                                <td>{{ $ijin->no_telp }}</td>
                                <td>{{ $ijin->kegiatan_usaha }}</td>
                                <td>{{ $ijin->sarana_usaha }}</td>
                                <td>{{ $ijin->jumlah_modal }}</td>
                                <td>{{ $ijin->surat_pengantar }}</td>
                            </tr>

                        @endforeach
            </tbody>
        </table>
    </div>
    </div><br>
@endsection