@extends('Admin/mainlayout')

@section('Data Pegawai','title')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
        <!-- ALERT -->
         @if(session('sukses'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di Tambahkan
        </div>
        @endif
        @if(session('hapus'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di Hapus
        </div>
        @endif

         @if(session('edit'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di Ubah
        </div>
        @endif

          @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
            @endif

        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Data</button><br><br>

        <!-- The Modal tambah-->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
      <div class="modal-header">
            <h4 class="modal-title">Tambah Data Pegawai</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{ action('PegawaiController@store') }}">
 
                        @csrf
 
                  <div class="card-body">
               
                    <div class="form-group">
                        <label for=""><strong>Nama Lengkap:</strong></label>
                        <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Alamat:</strong></label>
                        <textarea name="alamat" placeholder="Alamat Lengkap" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>No.Tlp:</strong></label>
                        <input type="text" name="no_telp" class="form-control" placeholder="No Telepon">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Bagian:</strong></label>
                        <input type="text" name="bagian" class="form-control" placeholder="Bagian">
                    </div>
                  </div>
              
                        <button type="submit" class="btn btn-success">Tambahkan</button>      

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
                    <th scope="col">No</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No.Telp</th>
                    <th scope="col">Bagian</th>
                    <th scope="col">Opsi</th>
                </tr>
              </thead>
                <tbody>
                        @foreach($pegawai as $peg)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$peg->nama_pegawai}}</td>
                                <td>{{$peg->alamat}}</td>
                                <td>{{$peg->no_telp}}</td>
                                <td>{{$peg->bagian}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal{{$peg->id_pegawai}}">Edit</button>
                                   <form action="{{url('pegawai/'.$peg->id_pegawai)}}  " method="post" onsubmit="return confirm('Yakin Akan Menghapus Data ini?')">
                                     @csrf
                                     @method('delete')
                                     <button class="btn btn-danger">Delete</button>
                                   </form>
                                </td>
                            </tr>
                            <!-- The Modal edit-->
    <div class="modal" id="EditModal{{$peg->id_pegawai}}">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
      <div class="modal-header">
            <h4 class="modal-title">Edit Data Pegawai</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{url('pegawai/update')}}">
 
                        @csrf
                        
                <div class="card-body">
                       <input type="hidden" name="id_pegawai"  value="{{ $peg->id_pegawai }}">
                    <div class="form-group">
                        <label for=""><strong>Nama Lengkap</strong></label>
                        <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Lengkap" value="{{$peg->nama_pegawai}}">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Alamat</strong></label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat lengkap" 
                        value="{{$peg->alamat}}" 
                        >
                    </div>
                    <div class="form-group">
                        <label for=""><strong>No.Telp</strong></label>
                        <input type="text" name="no_telp" class="form-control" placeholder="Keluhan" 
                        value="{{$peg->no_telp}}" 
                        >
                    </div>
                     <div class="form-group">
                        <label for=""><strong>Bagian</strong></label>
                        <input type="text" name="bagian" class="form-control" placeholder="Keluhan" 
                        value="{{$peg->bagian}}" 
                        >
                    </div>
                </div>
              
                        <button type="submit" class="btn btn-success">Simpan</button>      

              </form>
        </div>

    
     <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
                        @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <!-- End of Main Content -->

@endsection

