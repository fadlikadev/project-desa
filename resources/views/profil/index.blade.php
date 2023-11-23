@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid" src="{{asset('assets/profil/foto/' . $data->biodata->foto)}}" alt="Foto Profile">
                                </div>

                                <h3 class="profile-username text-center">{{$data->nama_lengkap}}</h3>

                                <p class="text-center">NIK : <span class="text-muted">{{$data->biodata->nik}}</span></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tentang Saya</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>
            
                                <p class="text-muted">
                                    {{$data->biodata->jenis_kelamin}}
                                </p>
                
                                <hr>
                
                                
                
                                <strong><i class="fas fa-calendar mr-1"></i> Tempat, Tanggal Lahir</strong>
                
                                @if (($data->biodata->tempat_lahir == null) || ($data->biodata->tanggal_lahir == null))
                                    <p class="text-danger">Belum Update</p>
                                @else
                                    <p class="text-muted">{{$data->biodata->tempat_lahir}}, {{date('d M Y', strtotime($data->biodata->tanggal_lahir))}}</p>
                                @endif
                
                                <hr>
                
                                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                
                                <p class="text-muted">{{$data->email}}</p>

                                <hr>

                                <strong><i class="fab fa-whatsapp mr-1"></i> Nomor WhatsApp</strong>
                
                                <p class="text-muted">{{$data->biodata->no_hp}}</p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                
                                @if ($data->biodata->alamat == null)
                                    <p class="text-danger">Belum Update</p>
                                @else
                                    <p class="text-muted">{{$data->biodata->alamat}}</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                                </ul>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Biodata -->
                                    <div class="active tab-pane" id="biodata">
                                        <table class="table table-bordered text-sm table-striped">
                                            <tbody class="">
                                                <tr class="bg-info text-center">
                                                    <th colspan=2>Profil Diri</th>
                                                </tr>
                                                <tr>
                                                    <th class="col-lg-2 col-sm-4">NIK</th>
                                                    <td class="col-lg-10 col-sm-8">{{$data->biodata->nik}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="">Nama Lengkap</th>
                                                    <td class="">{{$data->nama_lengkap}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="">Jenis Kelamin</th>
                                                    <td class="">{{$data->biodata->jenis_kelamin}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    @if ($data->biodata->tempat_lahir == null)
                                                        <td class="text-danger">Belum Update</td>
                                                    @else
                                                        <td class="">{{$data->biodata->tempat_lahir}}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    @if ($data->biodata->tanggal_lahir == null)
                                                        <td class="text-danger">Belum Update</td>
                                                    @else
                                                        <td class="">{{date('d M Y', strtotime($data->biodata->tanggal_lahir))}}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td class="">{{$data->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nomor WhatsApp</th>
                                                    <td class="">{{$data->biodata->no_hp}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    @if ($data->biodata->alamat == null)
                                                        <td class="text-danger">Belum Update</td>
                                                    @else
                                                        <td class="">{{$data->biodata->alamat}}</td>
                                                    @endif
                                                    
                                                </tr>
                                            </tbody>
                                        </table>

                                        <a href="{{url('/profile/edit/' . $data->id)}}" class="btn btn-sm btn-success float-right mr-3"><i class="fas fa-edit"></i> Edit</a>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection