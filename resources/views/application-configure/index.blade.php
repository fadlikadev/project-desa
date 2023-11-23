@extends('layouts.app')

@section('title')
    Konfigurasi Aplikasi
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
                            <li class="breadcrumb-item active"><i class="fas fa-wrench"></i> Konfigurasi Aplikasi</li>
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
                    <div class="col-lg-6 col-sm-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Data Konfigurasi Aplikasi</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="card-body text-sm">

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-lg-3 col-form-label">Name</label>
                                        <div class="col-sm-9 col-lg-8">
                                            <input type="text" class="form-control" value="{{$aplikasi->application_name}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-lg-3 col-form-label">Contraction</label>
                                        <div class="col-sm-9 col-lg-8">
                                            <input type="text" class="form-control" value="{{$aplikasi->application_nickname}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-lg-3 col-form-label">Owner</label>
                                        <div class="col-sm-9 col-lg-8">
                                            <input type="text" class="form-control" value="{{$aplikasi->application_owner}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-lg-3 col-form-label">Developer</label>
                                        <div class="col-sm-9 col-lg-8 mt-2">
                                            <strong><a href="{{$aplikasi->link_application_developer}}" target="_blank" class="">{{$aplikasi->application_developer}}</a></strong>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-lg-3 col-form-label">Version</label>
                                        <div class="col-sm-9 col-lg-8 mt-1">
                                            <strong>{{$aplikasi->application_version}}</strong>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-lg-3 col-form-label">Logo</label>
                                        <div class="col-sm-9 col-lg-8 mt-1">
                                            <img src="{{asset('assets/web-config/' . $aplikasi->application_logo)}}" alt="" width="125px">
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-sm">
                                    <a href="{{url('/data-aplikasi/edit/' . $aplikasi->id)}}">
                                        <button type="button" class="btn btn-success float-right"><i class="fas fa-pen"></i> Edit</button>
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