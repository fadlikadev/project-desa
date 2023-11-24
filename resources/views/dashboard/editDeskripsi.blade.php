@extends('layouts.app')

@section('title')
    Informasi
@endsection

@push('styles')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.css">
@endpush

@push('scripts')
    <!-- Summernote -->
    <script src="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Informasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Informasi</li>
                            <li class="breadcrumb-item">Deskripsi</li>
                            <li class="breadcrumb-item">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <form action="{{url('/informasi/deskripsi/' . $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header bg-info">
                                    <h3 class="card-title">
                                        Deskripsi Informasi Dashboard
                                    </h3>
                                    <a href="{{url('/dashboard')}}" class="btn btn-sm btn-secondary float-right shadow">Kembali</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group row text-center">
                                        <div class="col-12 col-sm-12 col-lg-12">
                                            <img src="{{asset('assets/' . $data->foto_informasi)}}" alt="" width="500px" class="mb-3 img-fluid">
                                        </div>
                                        <div class="col-12 col-sm-12 col-lg-3 mx-auto">
                                            <input type="file" name="foto_informasi" class="form-control-file @error ('foto_informasi') is-invalid @enderror">

                                            @error('foto_informasi')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-success float-right shadow">Simpan</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-md-12 mb-3">
                            <div class="card card-outline card-info">
                                <div class="card-header bg-info">
                                    <h3 class="card-title">
                                        Deskripsi Informasi Dashboard
                                    </h3>
                                    <a href="{{url('/dashboard')}}" class="btn btn-sm btn-secondary float-right shadow">Kembali</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea id="summernote" name="deskripsi_informasi">{{ old('deskripsi_informasi')?old('deskripsi_informasi'):$data->deskripsi_informasi }}</textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-success float-right shadow">Simpan</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- ./row -->
                </form>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection