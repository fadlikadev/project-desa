@extends('layouts.app')

@section('title')
    Data Barang
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content / Konten Utama -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6 col-sm-12">
                        <h1>Data Barang</h1>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item active">
                                <i class="fas fa-building"></i> Pangkalan
                            </li> -->
                            <li class="breadcrumb-item active">
                                <i class="fas fa-boxes"></i> Data Barang <i class="fas fa-angle-right"></i> Tambah
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
                                <h3 class="card-title">Form Tambah Data Barang</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal text-sm" action="{{url('/data-barang')}}" method="post">
                                @csrf

                                <div class="card-body text-sm">
                                    <div class="form-group row">
                                        <label for="kode_barang" class="col-sm-12 col-lg-3 col-form-label">Kode Barang</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="text" class="form-control @error ('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" value="{{old('kode_barang')}}">

                                            @error('kode_barang')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama_barang" class="col-sm-12 col-lg-3 col-form-label">Nama Barang</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="text" class="form-control @error ('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" placeholder="Masukkan Kode Barang" value="{{old('nama_barang')}}">

                                            @error('nama_barang')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="satuan_barang" class="col-sm-12 col-lg-3 col-form-label">Satuan Barang</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <select name="satuan_barang" id="" class="form-control @error ('satuan_barang') is-invalid @enderror">
                                                <option value="" disabled selected>-- Pilih Satuan Barang --</option>
                                                <option value="Unit">Unit</option>
                                                <option value="Buah">Buah</option>
                                                <option value="Box">Box</option>
                                            </select>

                                            @error('satuan_barang')
                                                <b class="text-danger text-sm">satuan barang wajib dipilih</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jumlah_barang" class="col-sm-12 col-lg-3 col-form-label">Jumlah Barang</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="number" class="form-control @error ('jumlah_barang') is-invalid @enderror" id="jumlah_barang" name="jumlah_barang" placeholder="Masukkan Jumlah Barang" value="{{old('jumlah_barang')}}">

                                            @error('jumlah_barang')
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