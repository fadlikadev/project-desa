@extends('layouts.app')

@section('title')
    Pengguna
@endsection

@push('scripts')
    <style>
        #togglePasswordIcon {
            cursor: pointer;
        }

        #togglePasswordIconSlash {
            cursor: pointer;
        }
    </style>

    <script>
        function togglePasswordVisibility1() {
            var passwordInput = document.getElementById('password_baru');
            var togglePasswordIcon = document.getElementById('togglePasswordIcon');
            var togglePasswordIconSlash = document.getElementById('togglePasswordIconSlash');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon.style.display = "none";
                togglePasswordIconSlash.style.display = "inline";
            } else {
                passwordInput.type = "password";
                togglePasswordIcon.style.display = "inline";
                togglePasswordIconSlash.style.display = "none";
            }
        }

        // Tambahkan event listener untuk memanggil fungsi togglePasswordVisibility() saat ikon di klik
        document.getElementById('togglePasswordIcon').addEventListener('click', togglePasswordVisibility1);
        document.getElementById('togglePasswordIconSlash').addEventListener('click', togglePasswordVisibility1);
    </script>

    <script>
        function togglePasswordVisibility2() {
            var passwordInput = document.getElementById('password-confirm');
            var togglePasswordIcon2 = document.getElementById('togglePasswordIcon2');
            var togglePasswordIconSlash2 = document.getElementById('togglePasswordIconSlash2');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon2.style.display = "none";
                togglePasswordIconSlash2.style.display = "inline";
            } else {
                passwordInput.type = "password";
                togglePasswordIcon2.style.display = "inline";
                togglePasswordIconSlash2.style.display = "none";
            }
        }

        // Tambahkan event listener untuk memanggil fungsi togglePasswordVisibility() saat ikon di klik
        document.getElementById('togglePasswordIcon2').addEventListener('click', togglePasswordVisibility2);
        document.getElementById('togglePasswordIconSlash2').addEventListener('click', togglePasswordVisibility2);
    </script>

    <script>
        function togglePasswordVisibility3() {
            var passwordInput = document.getElementById('konfirmasi_password_baru');
            var togglePasswordIcon3 = document.getElementById('togglePasswordIcon3');
            var togglePasswordIconSlash3 = document.getElementById('togglePasswordIconSlash3');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon3.style.display = "none";
                togglePasswordIconSlash3.style.display = "inline";
            } else {
                passwordInput.type = "password";
                togglePasswordIcon3.style.display = "inline";
                togglePasswordIconSlash3.style.display = "none";
            }
        }

        // Tambahkan event listener untuk memanggil fungsi togglePasswordVisibility() saat ikon di klik
        document.getElementById('togglePasswordIcon3').addEventListener('click', togglePasswordVisibility3);
        document.getElementById('togglePasswordIconSlash3').addEventListener('click', togglePasswordVisibility3);
    </script>
@endpush

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
                                <i class="fas fa-users"></i> Pengguna <i class="fas fa-angle-right"></i> Tambah
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
                                <h3 class="card-title">Tambah Pengguna Aplikasi</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal text-sm" action="{{url('/pengguna')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body text-sm">
                                    <div class="form-group row">
                                        <label for="nama_lengkap" class="col-sm-12 col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="text" class="form-control @error ('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap Pendaftar" value="{{old('nama_lengkap')}}">

                                            @error('nama_lengkap')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nik" class="col-sm-12 col-lg-3 col-form-label">NIK KTP</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="number" class="form-control @error ('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Masukkan Nama Lengkap Pendaftar" value="{{old('nik')}}">

                                            @error('nik')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="foto" class="col-sm-12 col-lg-3 col-form-label">Foto</label>
                                        <div class="col-sm-12 col-lg-8">
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
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>

                                            @error('jenis_kelamin')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-12 col-lg-3 col-form-label">Nomor WhatsApp</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="number" class="form-control @error ('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx" value="{{old('no_hp')}}">

                                            @error('no_hp')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-12 col-lg-3 col-form-label">Email</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="email" class="form-control @error ('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email Pendaftar" value="{{old('email')}}">

                                            @error('email')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-12 col-lg-3 col-form-label">Password</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <div class="input-group">
                                                <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password_baru" name="password" placeholder="Masukkan Password Akun Pendaftar" value="{{old('password')}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i id="togglePasswordIcon" class="fas fa-eye"></i> <!-- Ikon mata terbuka -->
                                                        <i id="togglePasswordIconSlash" class="fas fa-eye-slash" style="display: none;"></i> <!-- Ikon mata tertutup -->
                                                    </span>
                                                </div>
                                            </div>

                                            @error('password')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-12 col-lg-3 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <div class="input-group mb-3">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi Password Akun Pendaftaran">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i id="togglePasswordIcon2" class="fas fa-eye"></i> <!-- Ikon mata terbuka -->
                                                        <i id="togglePasswordIconSlash2" class="fas fa-eye-slash" style="display: none;"></i> <!-- Ikon mata tertutup -->
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-sm">
                                    
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah</button>

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