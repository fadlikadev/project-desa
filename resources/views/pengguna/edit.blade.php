@extends('layouts.app')

@section('title')
    Pengguna
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content / Konten Utama -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6 col-sm-12">
                        <h1>Pengguna</h1>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item active">
                                <i class="fas fa-building"></i> Pangkalan
                            </li> -->
                            <li class="breadcrumb-item active">
                                <i class="fas fa-users"></i> Pengguna <i class="fas fa-angle-right"></i> Edit
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
                                <h3 class="card-title">Form Edit Pengguna Aplikasi</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal text-sm" action="{{url('/pengguna/' . $data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="card-body text-sm">
                                    <div class="form-group row">
                                        <label for="nama_lengkap" class="col-sm-12 col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="text" class="form-control @error ('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap Pendaftar" value="{{old('nama_lengkap')?old('nama_lengkap'):$data->nama_lengkap}}">

                                            @error('nama_lengkap')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nik" class="col-sm-12 col-lg-3 col-form-label">NIK KTP</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="number" class="form-control @error ('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Masukkan Nama Lengkap Pendaftar" value="{{old('nik')?old('nik'):$data->biodata->nik}}">

                                            @error('nik')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="foto" class="col-sm-12 col-lg-3 col-form-label">Foto</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <img src="{{asset('assets/profil/foto/' . $data->biodata->foto)}}" alt="Foto Profil" width="150px" class="mb-2">

                                            <input type="file" class="form-control-file @error ('foto') is-invalid @enderror" id="foto" name="foto" placeholder="Masukkan Nama Lengkap Pendaftar" value="{{old('foto')}}">

                                            @error('foto')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-sm-12 col-lg-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <select name="jenis_kelamin" class="form-control @error ('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin">
                                                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-Laki" <?php if($data->biodata->jenis_kelamin == "Laki-Laki") echo 'selected' ?>>Laki-Laki</option>
                                                <option value="Perempuan" <?php if($data->biodata->jenis_kelamin == "Perempuan") echo 'selected' ?>>Perempuan</option>
                                            </select>

                                            @error('jenis_kelamin')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-12 col-lg-3 col-form-label">Nomor WhatsApp</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="number" class="form-control @error ('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx" value="{{old('no_hp')?old('no_hp'):$data->biodata->no_hp}}">

                                            @error('no_hp')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-12 col-lg-3 col-form-label">Email</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="email" class="form-control @error ('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email Pendaftar" value="{{old('email')?old('email'):$data->email}}">

                                            @error('email')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-sm">
                                    
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>

                                    <a href="{{url('/pengguna')}}">
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