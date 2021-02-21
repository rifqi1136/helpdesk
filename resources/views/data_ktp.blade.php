@extends('mainfrontend')

@section('title','Data Pembuat KTP')

@section('content')
<br>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pembuatan KTP</h1>
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
    <div class="table-responsive">
        <table  class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>

                </tr>
            </thead>
            <tbody>
               @foreach($ktp as $buat)
               <tr>
                 <td>{{ $loop->iteration }}</td>
                <td>{{ $buat->nama }}</td>
                <td>{{ $buat->alamat }}</td>
                <td>{{ $buat->tempat_lahir }}</td>
                <td>{{ $buat->tanggal_lahir }}</td>
                <td>{{ $buat->jenkel }}</td>
    
         </tr>
         @endforeach
     </tbody>
</table>
</div>
</div>

<!-- The Modal tambah-->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Pembuat KTP</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
      <form method="post" action="{{ action('frontendController@tambahktp') }}">
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
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap .."></textarea>

                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir ..">

                    @error('tempat_lahir')
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
                <label>Jenis Kelamin</label><br>
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenkel" value="Laki-Laki">Laki-Laki
                </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenkel" value="Perempuan">Perempuan
            </label>
        </div>


        <div class="form-group">
            <label>Golongan Darah</label>
            <textarea name="goldar" class="form-control" placeholder="Golongan Darah .."></textarea>

            @error('goldar')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>

    </div>
    <div class="col-xl-6 bg-light">

        <div class="form-group">
            <label>Status Perkawinan</label>
            <textarea name="status" class="form-control" placeholder="Status Perkawinan .."></textarea>

            @error('status')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Agama</label>
            <textarea name="agama" class="form-control" placeholder="Agama .."></textarea>

            @error('agama')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <textarea name="pekerjaan" class="form-control" placeholder="Pekerjaan .."></textarea>

            @error('pekerjaan')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Kewarganegaraan</label>
            <textarea name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan .."></textarea>

            @error('kewarganegaraan')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Masa Berlaku</label>
            <textarea name="masa_berlaku" class="form-control" placeholder="Masa Berlaku .."></textarea>

            @error('masa_berlaku')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Foto Sendiri</label>
            <input type="file" name="foto_sendiri" class="form-control" placeholder="Masukan Foto Sendiri ..">

            @error('foto_sendiri')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror

        </div>
        <div class="form-group">
            <label>Foto TTD</label>
            <input type="file" name="foto_ttd" class="form-control" placeholder="Masukan Foto Tanda Tangan ..">

            @error('foto_ttd')
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
@endsection