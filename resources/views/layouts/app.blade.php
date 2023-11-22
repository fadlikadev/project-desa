<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Inventory Desa</title>
    <link rel="icon" href="{{asset('assets/web-config/pancasila.png')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('assets/web-config/pancasila.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Inventory Desa</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('assets/logo-user.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->email}}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        
                        @if (Auth::user()->role_id == 1)
                            <li class="nav-item">
                                <a href="{{ url('/pendaftar') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Pengguna
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/data-barang') }}" class="nav-link">
                                    <i class="nav-icon fas fa-boxes"></i>
                                    <p>
                                        Data Barang
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/data-fasilitas') }}" class="nav-link">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>
                                        Data Fasilitas
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role_id == 1)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Tahapan Pendaftaran
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('/tahap-1/' . Auth::user()->id) }}" class="nav-link">
                                            <i class="nav-icon fas fa-file"></i>
                                            <p>
                                                Tahap 1 : Biodata
                                            </p>
                                        </a>
                                    </li>
                    
                                    <li class="nav-item">
                                        <a href="{{ url('/tahap-2/' . Auth::user()->id) }}" class="nav-link">
                                            <i class="nav-icon fas fa-file"></i>
                                            <p>
                                                Tahap 2 : Alamat
                                            </p>
                                        </a>
                                    </li>
                    
                                    <li class="nav-item">
                                        <a href="{{ url('/tahap-3/' . Auth::user()->id) }}" class="nav-link">
                                            <i class="nav-icon fas fa-file"></i>
                                            <p>
                                                Tahap 3 : Asal Sekolah
                                            </p>
                                        </a>
                                    </li>
                    
                                    <li class="nav-item">
                                        <a href="{{ url('/tahap-4/' . Auth::user()->id) }}" class="nav-link">
                                            <i class="nav-icon fas fa-file"></i>
                                            <p>
                                                Tahap 4 : Data Orangtua
                                            </p>
                                        </a>
                                    </li>
                    
                                    <li class="nav-item">
                                        <a href="{{ url('/tahap-5/' . Auth::user()->id) }}" class="nav-link">
                                            <i class="nav-icon fas fa-file"></i>
                                            <p>
                                                Tahap 5 : Data Nilai
                                            </p>
                                        </a>
                                    </li>
                    
                                    <li class="nav-item">
                                        <a href="{{ url('/tahap-6/' . Auth::user()->id) }}" class="nav-link">
                                            <i class="nav-icon fas fa-file"></i>
                                            <p>
                                                Tahap 6 : Foto
                                            </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ url('/tahap-7/' . Auth::user()->id) }}" class="nav-link">
                                            <i class="nav-icon fas fa-file"></i>
                                            <p>
                                                Tahap 7 : Verifikasi
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ url('/tahap-1/' . Auth::user()->id) }}" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Tahap 1 : Biodata
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/tahap-2/' . Auth::user()->id) }}" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Tahap 2 : Alamat
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/tahap-3/' . Auth::user()->id) }}" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Tahap 3 : Asal Sekolah
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/tahap-4/' . Auth::user()->id) }}" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Tahap 4 : Data Orangtua
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/tahap-5/' . Auth::user()->id) }}" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Tahap 5 : Data Nilai
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/tahap-6/' . Auth::user()->id) }}" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Tahap 6 : Pas Photo
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/tahap-7/' . Auth::user()->id) }}" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        Tahap 7 : Verifikasi
                                    </p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview text-sm" style="background-color: #41434D">

                                @if(Auth::user()->role_id == 1)
                                    <li class="nav-item">
                                        <a href="{{url('/data-aplikasi')}}" class="nav-link">
                                        <i class="nav-icon fas fa-wrench"></i>
                                            <p>Data Aplikasi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/status-aplikasi')}}" class="nav-link">
                                        <i class="nav-icon fas fa-wrench"></i>
                                            <p>Status Aplikasi</p>
                                        </a>
                                    </li>
                                @endif

                                <li class="nav-item">
                                    <a href="{{url('/akun/ubah-password')}}" class="nav-link">
                                        <i class="nav-icon fas fa-lock"></i>
                                        <p>Ubah Password</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('/contact-person')}}" class="nav-link">
                                <i class="nav-icon fas fa-headset"></i>
                                <p>
                                    Contact Person
                                </p>
                            </a>
                        </li>                

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Sign Out
                                </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://instagram.com/rhie.kenji" target="_blank">Inventory Desa</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('AdminLTE')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('AdminLTE')}}/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('AdminLTE')}}/dist/js/pages/dashboard2.js"></script>
    @include('sweetalert::alert')
    @stack('scripts')
</body>
</html>
