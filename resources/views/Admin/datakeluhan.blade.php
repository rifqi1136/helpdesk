@extends('Admin/mainlayout')

@section('Data Keluhan','title')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Keluhan Masyarakat</h1>
        <!-- ALERT -->
        @if(session('sukses'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di tambahkan
        </div>
        @endif

          @if(session('edit'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di Ubah
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
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
      <div class="modal-header">
            <h4 class="modal-title">Masukan Keluhan Anda</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{ action('KeluhanController@store') }}">
 
                        @csrf
 
                  <div class="card-body">
                    <div class="form-group">
                        <label for=""><strong>Nama Lengkap</strong></label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Alamat</strong></label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat lengkap">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Keluhan</strong></label>
                        <input type="text" name="keluhan" class="form-control" placeholder="Keluhan">
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
        <div class="table-responsive">
        <table  class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Keluhan</th>
                    <th scope="col">Opsi</th>
                </tr>
              </thead>
                <tbody>
                        @foreach($keluhan as $kel)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kel->nama_lengkap}}</td>
                                <td>{{$kel->alamat}}</td>
                                <td>{{$kel->keluhan}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal{{$kel->id_kel}}">Edit</button>
                                   <form action="{{url('keluhan/'.$kel->id_kel)}}  " method="post" onsubmit="return confirm('Yakin Akan Menghapus Data ini?')">
                                     @csrf
                                     @method('delete')
                                     <button class="btn btn-danger">Delete</button>
                                   </form>
                                </td>
                            </tr>
                            <!-- The Modal edit-->
    <div class="modal" id="EditModal{{$kel->id_kel}}">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
      <div class="modal-header">
            <h4 class="modal-title">Edit Keluhan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{url('keluhan/update')}}">
 
                        @csrf
                        
                <div class="card-body">
                       <input type="hidden" name="id_kel"  value="{{ $kel->id_kel }}">
                    <div class="form-group">
                        <label for=""><strong>Nama Lengkap</strong></label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{$kel->nama_lengkap}}">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Alamat</strong></label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat lengkap" 
                        value="{{$kel->alamat}}" 
                        >
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Keluhan</strong></label>
                        <input type="text" name="keluhan" class="form-control" placeholder="Keluhan" 
                        value="{{$kel->keluhan}}" 
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


