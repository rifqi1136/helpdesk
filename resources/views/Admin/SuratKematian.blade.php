@extends('Admin/mainlayout')

@section('Data Surat Kematian','title')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pembuatan Surat Kematian</h1>
        <!-- ALERT -->
        @if(session('sukses'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong>Data berhasil di Tambahkan
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Pembuat Surat Kematian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
      <form method="post" action="{{ action('SuratKematianController@store') }}">
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
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap ..">

                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror

                </div>


                <div class="form-group">
                    <label>Umur</label>
                    <textarea name="umur" class="form-control" placeholder="Umur .."></textarea>

                    @error('umur')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" name="jenkel" class="form-control" placeholder="Jenis Kelamin ..">

                    @error('jenkel')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="0000-00-00">

                    @error('tanggal_lahir')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror

                </div>
                <label>Tanggal Meninggal</label>
                    <input type="date" name="tanggal_meninggal" class="form-control" placeholder="0000-00-00">

                    @error('tanggal_kematian')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror


        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" placeholder="Agama ..">

            @error('agama')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>

    </div>
    <div class="col-xl-6 bg-light">

        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan ..">

            @error('pekerjaan')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Pendidikan</label>
            <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan ..">

            @error('pendidikan')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat .."></textarea>

            @error('alamat')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" placeholder="Keterangan .."></textarea>

            @error('keterangan')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Foto Surat Keterangan RS</label>
            <input type="file" name="foto_suratketrs" class="form-control" placeholder="Foto Surat Keterangan RS ..">

            @error('foto_suratketrs')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Foto KTP</label>
            <input type="file" name="foto_ktp" class="form-control" placeholder="Masukan Foto KTP ..">

            @error('foto_ktp')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Foto Kartu Keluarga</label>
            <input type="file" name="foto_kk" class="form-control" placeholder="Masukan Foto Kartu Keluarga ..">

            @error('foto_kk')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

</div>
</form>
</div>
</div>
</div>
</div>

    <div class="table-responsive">
        <table  class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Tanggal Meninggal</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Pendidikan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Foto Surat Keterangan RS</th>
                    <th scope="col">Foto TTD</th>
                    <th scope="col">Foto KK</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
               @foreach($kematian as $kema)
               <tr>
                <td>{{ $kema->nik }}</td>
                <td>{{ $kema->nama }}</td>
                <td>{{ $kema->umur }}</td>
                <td>{{ $kema->jenkel }}</td>
                <td>{{ $kema->tanggal_lahir }}</td>
                <td>{{ $kema->tanggal_meninggal }}</td>
                <td>{{ $kema->agama }}</td>
                <td>{{ $kema->pekerjaan }}</td>
                <td>{{ $kema->pendidikan }}</td>
                <td>{{ $kema->alamat }}</td>
                <td>{{ $kema->keterangan }}</td>
                <td>{{ $kema->foto_suratketrs }}</td>
                <td>{{ $kema->foto_ktp }}</td>
                <td>{{ $kema->foto_kk }}</td>
               <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal{{$kema->nik}}">Edit</button>
                                   <form action="{{url('suratkematian/'.$kema->nik)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')">
                                       @csrf
                                       @method('delete')
                                       <button class="btn btn-danger">Delete</button>
                                   </form></td>
               </tr>
               <!-- The Modal tambah-->
<div class="modal" id="EditModal{{$kema->nik}}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Pembuat Surat Kematian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
      <form method="post" action="{{ action('SuratKematianController@update') }}">
        <div class="row">
            <div class="col-xl-6 bg-light">

                {{ csrf_field() }}

                <input type="hidden" name="nik"  value="{{ $kema->nik }}">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{$kema->nama}}">

                </div>

                <div class="form-group">
                    <label>Umur</label>
                    <input type="text" name="umur" class="form-control" placeholder="Umur" value="{{$kema->umur}}">

                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" name="jenkel" class="form-control" placeholder="Jenis Kelamin" value="{{$kema->jenkel}}">

                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{$kema->tanggal_lahir}}">

                </div>
                <label>Tanggal Meninggal</label>
                    <input type="date" name="tanggal_meninggal" class="form-control" placeholder="Tanggal Meninggal" value="{{$kema->tanggal_meninggal}}">


        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" placeholder="Agama" value="{{$kema->agama}}">

        </div>

    </div>
    <div class="col-xl-6 bg-light">

        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{$kema->pekerjaan}}">

        </div>
        <div class="form-group">
            <label>Pendidikan</label>
            <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" value="{{$kema->pendidikan}}">

        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat .." value="{{$kema->alamat}}">{{$kema->alamat}}</textarea>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" placeholder="Keterangan .." value="{{$kema->keterangan}}">{{$kema->keterangan}}</textarea>

        </div>
        <div class="form-group">
            <label>Foto Surat Keterangan RS</label>
            <input type="file" name="foto_suratketrs" class="form-control" placeholder="Foto Surat Kematian Rumah Sakit" value="{{$kema->foto_suratketrs}}">

        </div>
        <div class="form-group">
            <label>Foto KTP</label>
            <input type="file" name="foto_ktp" class="form-control" placeholder="Foto KTP" value="{{$kema->foto_ktp}}">

        </div>
        <div class="form-group">
            <label>Foto Kartu Keluarga</label>
            <input type="file" name="foto_kk" class="form-control" placeholder="Masukan Foto Kartu Keluarga" value="{{$kema->foto_kk}}">

        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

</div>
</form>
</div>
</div>
</div>
</div>
               @endforeach
        </tbody>
</table>
</div>

<script>

          $(document).ready(function() {            

            $('#date').datepicker({                      

                format: 'yyyy-mm-dd',

                autoclose: true,

            }); 

          });

  </script>
@endsection

