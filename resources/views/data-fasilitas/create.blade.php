@extends('layouts.app')

@section('title')
    Data Fasilitas
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content / Konten Utama -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6 col-sm-12">
                        <h1>Data Fasilitas</h1>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item active">
                                <i class="fas fa-building"></i> Pangkalan
                            </li> -->
                            <li class="breadcrumb-item active">
                                <i class="fas fa-boxes"></i> Data Fasilitas <i class="fas fa-angle-right"></i> Tambah
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- left column -->
                    <div class="col-lg-8 col-sm-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Data Fasilitas</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal text-sm" action="{{url('/data-fasilitas')}}" method="post">
                                @csrf

                                <div class="card-body text-sm">
                                    <div class="form-group row">
                                        <label for="kode_fasilitas" class="col-sm-12 col-lg-3 col-form-label">Kode Fasilitas</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="text" class="form-control @error ('kode_fasilitas') is-invalid @enderror" id="kode_fasilitas" name="kode_fasilitas" placeholder="Masukkan Kode Fasilitas" value="{{old('kode_fasilitas')}}">

                                            @error('kode_fasilitas')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama_fasilitas" class="col-sm-12 col-lg-3 col-form-label">Nama Fasilitas</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="text" class="form-control @error ('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" name="nama_fasilitas" placeholder="Masukkan Nama Fasilitas" value="{{old('nama_fasilitas')}}">

                                            @error('nama_fasilitas')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="satuan_fasilitas" class="col-sm-12 col-lg-3 col-form-label">Satuan Fasilitas</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <select name="satuan_fasilitas" id="" class="form-control @error ('satuan_fasilitas') is-invalid @enderror">
                                                <option value="" disabled selected>-- Pilih Satuan Fasilitas --</option>
                                                <option value="Ruangan">Ruangan</option>
                                            </select>

                                            @error('satuan_fasilitas')
                                                <b class="text-danger text-sm">satuan fasilitas wajib dipilih</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jumlah_fasilitas" class="col-sm-12 col-lg-3 col-form-label">Jumlah Fasilitas</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="number" class="form-control @error ('jumlah_fasilitas') is-invalid @enderror" id="jumlah_fasilitas" name="jumlah_fasilitas" placeholder="Masukkan Jumlah Fasilitas" value="{{old('jumlah_fasilitas')}}">

                                            @error('jumlah_fasilitas')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-sm">
                                    
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah</button>

                                    <a href="{{url('/data-barang')}}">
                                        <button type="button" class="btn btn-info"><i class="fas fa-backward"></i> Kembali</button>
                                    </a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection