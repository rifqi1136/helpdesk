@extends('mainfrontend')

@section('Home','title')

@section('content')
<!-- ======= About Section ======= -->
<section id="Keluhan" class="about">

	<div class="container">

         <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Persyaratan-Persyaratan yang harus disiapkan</h2><hr>
        </div>
        <ul class="list-group">
        <li class="list-group-item active" data-toggle="collapse" data-target="#demo">IUMKM(ijin usaha menengah kecil mikro)</li>
        <div id="demo" class="collapse">
            <div class="card">
              <div class="card-body">
                <ol type="1">
                  <li>siapkan foto Surat Pengantar RT/RW</li>
                </ol>
              </div>
            </div>
        </div>

        <li class="list-group-item active" data-toggle="collapse" data-target="#demo2">Pembuatan KTP</li>
        <div id="demo2" class="collapse">
            <div class="card">
              <div class="card-body">
                  <p>1.siapkan foto diri sendiri setengah badan</p>
                  <p>2.siapkan foto Tandatangan di kertas putih</p>
                  <p>3.siapkan foto Kartu Keluarga</p>
              </div>
            </div>
        </div>

        <li class="list-group-item active" data-toggle="collapse" data-target="#demo3">Surat/Akte Kematian</li>
          <div id="demo3" class="collapse">
            <div class="card">
              <div class="card-body">
                  <p>1.siapkan foto surat keterangan rumah sakit</p>
                  <p>2.siapkan foto KTP</p>
                  <p>3.siapkan foto Kartu Keluarga</p>
              </div>
            </div>
        </div>

      </ul>

      </div>
    </section><!-- End Breadcrumbs -->

		 <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Data Keluhan Masyarakat</h2><hr>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Keluhan</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<div class="row">
  <div class="col-sm-4">
  	<form method="POST" action="{{ action('frontendController@tambahkelfront') }}">
 
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
  <div class="col-sm-8">
  	<div class="table-responsive">
        <table  class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Keluhan</th>
                </tr>
            </thead>
            <tbody>
                        @foreach($keluhanfront as $kel)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{$kel->nama_lengkap}}</td>
                                <td>{{$kel->alamat}}</td>
                                <td>{{$kel->keluhan}}</td>
                            
                            </tr>
                        @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>

</div>
</section><!-- End About Section -->
@endsection