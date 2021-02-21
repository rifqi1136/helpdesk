@extends('Admin/mainlayout')

@section('IUMKM','title')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penerbitan Izin Usaha Mikro Kecil (IUMK)</h1>
        <!-- ALERT -->
          @if(session('sukses'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di Hapus
        </div>
        @endif
          @if(session('edit'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di Hapus
        </div>
        @endif
        @if(session('hapus'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di Hapus
        </div>
        @endif
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
        <table  class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">No.KTP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No.Telp</th>
                    <th scope="col">Kegiatan Usaha</th>
                    <th scope="col">Sarana Usaha</th>
                    <th scope="col">Jumlah Modal</th>
                    <th scope="col">Surat Pengantar</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($perijinan as $ijin)
                            <tr>
                                <td>{{ $ijin->nik }}</td>
                                <td>{{ $ijin->nama_lengkap }}</td>
                                <td>{{ $ijin->alamat }}</td>
                                <td>{{ $ijin->no_telp }}</td>
                                <td>{{ $ijin->kegiatan_usaha }}</td>
                                <td>{{ $ijin->sarana_usaha }}</td>
                                <td>{{ $ijin->jumlah_modal }}</td>
                                <td>{{ $ijin->surat_pengantar }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal{{$ijin->nik}}">Edit</button>
                                   <form action="{{url('Perijinan/'.$ijin->nik)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')">
                                       @csrf
                                       @method('delete')
                                       <button class="btn btn-danger">Delete</button>
                                   </form>
                                </td>
                            </tr>
            </tbody>
                        <!-- The Modal Edit-->
    <div class="modal" id="EditModal{{$ijin->nik}}">
      <div class="modal-dialog modal-l">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Perijinan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{url('Perijinan/update')}}">
            <div class="row">
                <div class="col-xl-10 bg-light">
 
                        @csrf
 
                       <input type="hidden" name="nik"  value="{{ $ijin->nik }}">
                    <div class="form-group">
                        <label for=""><strong>Nama Lengkap</strong></label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{$ijin->nama_lengkap}}">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Alamat</strong></label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat lengkap" 
                        value="{{$ijin->alamat}}" 
                        >
                    </div>
                    <div class="form-group">
                        <label for=""><strong>No Telepon</strong></label>
                        <input type="text" name="no_telp" class="form-control" placeholder="No Telepon" 
                        value="{{$ijin->no_telp}}" 
                        >
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Kegiatan Usaha</strong></label>
                        <input type="text" name="kegiatan_usaha" class="form-control" placeholder="Kegiatan Usaha" 
                        value="{{$ijin->kegiatan_usaha}}" 
                        >
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Sarana Usaha</strong></label>
                        <input type="text" name="sarana_usaha" class="form-control" placeholder="Sarana Usaha" 
                        value="{{$ijin->sarana_usaha}}" 
                        >
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Jumlah Modal</strong></label>
                        <input type="text" name="jumlah_modal" class="form-control" placeholder="Jumlah Modal" 
                        value="{{$ijin->jumlah_modal}}" 
                        >
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Surat Pengantar</strong></label>
                        <input type="file" name="surat_pengantar" class="form-control" placeholder="Masukan Foto Surat Pengantar...." 
                        value="{{$ijin->surat_pengantar}}" 
                        >
                    </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                      
                     </div>
              </form>
        </div>

    
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
                 @endforeach
            </thead>
        </table>
    </div>
    </div>

    <!-- End of Main Content -->

   

    </div>
  </div>
</div>
@endsection

