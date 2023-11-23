@extends('layouts.app')

@section('title')
    Tambah Narahubung
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content / Konten Utama -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-lg-6">
                        <h1>Contact Person</h1>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                            <li class="breadcrumb-item active">
                                <i class="fas fa-headset"></i> Narahubung <i class="fas fa-angle-right"></i> Tambah
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
                    <div class="col-lg-6 col-sm-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Narahubung / Call Center</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal text-sm" action="{{url('/contact-person')}}" method="post" id="">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-lg-3 col-form-label">Nama</label>
                                        <div class="col-sm-8 col-lg-9">
                                            <input type="text" class="form-control text-sm" id="nama" name="nama" value="{{old('nama')}}">

                                            @error('nama')
                                                <p class="text-danger text-sm">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kontak" class="col-sm-4 col-lg-3 col-form-label">Nomor / Username</label>
                                        <div class="col-sm-8 col-lg-9">
                                            <input type="text" class="form-control text-sm" id="kontak" name="kontak" value="{{old('kontak')}}">

                                            @error('kontak')
                                                <p class="text-danger text-sm">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link" class="col-sm-4 col-lg-3 col-form-label">Link</label>
                                        <div class="col-sm-8 col-lg-9">
                                            <input type="text" class="form-control text-sm" id="link" name="link" value="{{old('link')}}">
                                        </div>
                                    </div>
                                    <a href="{{url('/contact-person')}}" class="btn btn-sm btn-info mr-2">Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-success mr-2 float-right">Tambah</button>
                                </div>
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