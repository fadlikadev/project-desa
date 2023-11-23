@extends('layouts.app')

@section('title')
    Edit Konfigurasi Aplikasi
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content / Konten Utama -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 col-lg-6">
                        <h1 class="m-0">Konfigurasi Aplikasi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-12 col-lg-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                            <li class="breadcrumb-item active"><i class="fas fa-cog"></i> Settings </li>
                            <li class="breadcrumb-item active"><i class="fas fa-wrench"></i> Konfigurasi Aplikasi <i class="fas fa-angle-right"></i> Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- left column -->
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Konfigurasi Aplikasi</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal" action="{{url('/data-aplikasi/' . $aplikasi->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body text-sm">

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-lg-3 col-form-label">Name</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input name="application_name" type="text" class="form-control @error('application_name') is-invalid @enderror" value="{{old('application_name')?old('application_name'):$aplikasi->application_name}}">

                                            @error('application_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-lg-3 col-form-label">Contraction</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input name="application_nickname" type="text" class="form-control @error('application_nickname') is-invalid @enderror" value="{{old('application_nickname')?old('application_nickname'):$aplikasi->application_nickname}}">

                                            @error('application_nickname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Contraction/Singkatan aplikasi wajib diisi!</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-lg-3 col-form-label">Owner</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input name="application_owner" type="text" class="form-control @error('application_owner') is-invalid @enderror" value="{{old('application_owner')?old('application_owner'):$aplikasi->application_owner}}">

                                            @error('application_owner')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-lg-3 col-form-label">Developer</label>
                                        <div class="col-sm-12 col-lg-8">
                                            @if (Auth::User()->role_id == 1)
                                                <input name="application_developer" type="text" class="form-control @error('application_developer') is-invalid @enderror" value="{{old('application_developer')?old('application_developer'):$aplikasi->application_developer}}">
                                            @else
                                                <input name="application_developer" type="text" class="form-control @error('application_developer') is-invalid @enderror" value="{{old('application_developer')?old('application_developer'):$aplikasi->application_developer}}" readonly>
                                            @endif

                                            @error('application_developer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-lg-3 col-form-label">Link Developer</label>
                                        <div class="col-sm-12 col-lg-8">
                                            @if (Auth::User()->role_id == 1)
                                                <input name="link_application_developer" type="text" class="form-control @error('link_application_developer') is-invalid @enderror" value="{{old('link_application_developer')?old('link_application_developer'):$aplikasi->link_application_developer}}">
                                            @else
                                                <input name="link_application_developer" type="text" class="form-control @error('link_application_developer') is-invalid @enderror" value="{{old('link_application_developer')?old('link_application_developer'):$aplikasi->link_application_developer}}" readonly>
                                            @endif

                                            @error('link_application_developer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-lg-3 col-form-label">Version</label>
                                        <div class="col-sm-12 col-lg-8">
                                            @if (Auth::User()->role_id == 1)
                                                <input name="application_version" type="text" class="form-control @error('application_version') is-invalid @enderror" value="{{old('application_version')?old('application_version'):$aplikasi->application_version}}">
                                            @else
                                                <input name="application_version" type="text" class="form-control @error('application_version') is-invalid @enderror" value="{{old('application_version')?old('application_version'):$aplikasi->application_version}}" readonly>
                                            @endif

                                            @error('application_version')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-lg-3 col-form-label">Logo</label>
                                        <div class="col-sm-12 col-lg-8 mt-1">
                                            <img src="{{asset('assets/web-config/' . $aplikasi->application_logo)}}" alt="" width="125px">

                                            <input name="application_logo" type="file" class="mt-3 form-control-file @error('application_logo') is-invalid @enderror">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-sm">
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="{{url('/data-aplikasi')}}">
                                        <button type="button" class="btn btn-info mr-2"><i class="fas fa-angle-left"></i> Kembali</button>
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