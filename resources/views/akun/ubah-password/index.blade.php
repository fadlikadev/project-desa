@extends('layouts.app')

@section('title')
    Ubah Password
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
            var passwordInput = document.getElementById('password_lama');
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
            var passwordInput = document.getElementById('password_baru');
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
                    <div class="col-sm-6">
                        <h1>Pengaturan Akun</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                            <li class="breadcrumb-item active">
                                <i class="fas fa-cog"></i> Akun <i class="fas fa-angle-right"></i> Ubah Password
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
                                <h3 class="card-title">Ubah Password Akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ url('/akun/ubah-password') }}">
                                @csrf
                                <!-- @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach -->
                                <div class="card-body">
                                    @if (session()->has('message'))
                                        <div class="alert alert-success text-center" role="alert">
                                            {{Session::get('message')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="password_lama">Password Sebelumnya</label>
                                        <div class="input-group mb-3">
                                            <input id="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" autocomplete="current-password" autofocus>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i id="togglePasswordIcon" class="fas fa-eye"></i> <!-- Ikon mata terbuka -->
                                                    <i id="togglePasswordIconSlash" class="fas fa-eye-slash" style="display: none;"></i> <!-- Ikon mata tertutup -->
                                                </span>
                                            </div>
                                        </div>
                                        
                                        
                                        @error('password_lama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_baru">Password Baru</label>
                                        {{-- <input id="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" autocomplete="current-password"> --}}
                                        <div class="input-group mb-3">
                                            <input id="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" autocomplete="current-password">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i id="togglePasswordIcon2" class="fas fa-eye"></i> <!-- Ikon mata terbuka -->
                                                    <i id="togglePasswordIconSlash2" class="fas fa-eye-slash" style="display: none;"></i> <!-- Ikon mata tertutup -->
                                                </span>
                                            </div>
                                        </div>
                                        
                                        @error('password_baru')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="konfirmasi_password_baru">Konfirmasi Password Baru</label>
                                        <div class="input-group mb-3">
                                            <input id="konfirmasi_password_baru" type="password" class="form-control @error('konfirmasi_password_baru') is-invalid @enderror" name="konfirmasi_password_baru" autocomplete="current-password">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i id="togglePasswordIcon3" class="fas fa-eye"></i> <!-- Ikon mata terbuka -->
                                                    <i id="togglePasswordIconSlash3" class="fas fa-eye-slash" style="display: none;"></i> <!-- Ikon mata tertutup -->
                                                </span>
                                            </div>
                                        </div>

                                        @error('konfirmasi_password_baru')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <a href="">
                                        <button type="submit" class="btn btn-success float-right">Confirm</button>
                                    </a>
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