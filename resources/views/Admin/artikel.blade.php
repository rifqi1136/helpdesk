@extends('Admin/mainlayout')

@section('Data artikel','title')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Artikel/Kegiatan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

         @if(session('sukses'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di tambahkan
        </div>
        @endif

         @if(session('edit'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di edit
        </div>
        @endif

         @if(session('hapus'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di hapus
        </div>
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Data</button><br>
    <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Form Tambah Artikel/Kegiatan</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                  <form action="/artikel/store"  enctype="multipart/form-data" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="judul" class="form-control" placeholder="Masukan Judul Artikel/Kegiatan" name="judul">
                    </div>
                    <div class="form-group">
                            <label>Deskripsi:</label>
                            <textarea class="ckeditor" id="ckeditor" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                            <label>Gambar:</label>
                            <input type="file" name="gamabar" class="form-control" placeholder="">
                    </div>
                                <button type="submit" class="btn btn-success">Post</button>
              </form>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

      </div>
  </div>
</div>
        <div class="card-body">
            <div class="table-responsive">
                 <table  class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Tanggal Post</th>
                    <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($artikel as $art)
                            <tr>
                                <td>{{$art->judul}}</td>
                                <td>{!!$art->deskripsi!!}</td>
                                <td><img width="150px" src="{{ url('/data_upload/'.$art->gamabar) }}"</td>
                                <td>{{$art->created_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit{{$art->id_post}}">Edit</button>
                                  <form action="{{url('artikel/'.$art->id_post)}}  " method="post" onsubmit="return confirm('Yakin Akan Menghapus Data ini?')">
                                     @csrf
                                     @method('delete')
                                     <button class="btn btn-danger">Delete</button>
                                   </form>
                                </td>
                            </tr>
  <!-- The Modal edit-->
        <div class="modal fade" id="ModalEdit{{$art->id_post}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Form Artikel/Kegiatan</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                  <form action="{{url('artikel/update')}}"  enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="id_post"  value="{{ $art->id_post }}">
                      <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="judul" class="form-control" placeholder="Masukan Judul Artikel/Kegiatan" name="judul" value="{{$art->judul}}">
                    </div>
                    <div class="form-group">
                            <label>Deskripsi:</label>
                            <textarea class="ckeditor" id="ckeditor" name="deskripsi" value="{!!$art->deskripsi!!}">{!!$art->deskripsi!!}</textarea>
                    </div>
                    <div class="form-group">
                            <label>Gambar:</label>
                            <input type="file" name="gamabar" class="form-control" placeholder=""> 
                    </div>
                                <button type="submit" class="btn btn-success">Post</button>
              </form>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

      </div>
  </div>
</div>

                    @endforeach
            </tbody>
        </table>
            </div>
        </div>

@endsection