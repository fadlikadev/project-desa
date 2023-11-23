@extends('layouts.app')

@section('title')
    Narahubung
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
                                <i class="fas fa-headset"></i> Narahubung
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
                                <h3 class="card-title">Narahubung / Call Center</h3>
                                @if(Auth::user()->role_id == 1)
                                    <a href="{{url('/contact-person/create')}}" class="btn btn-sm btn-success float-right">Tambah</a>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <table class="table table-borderless table-sm text-sm nowrap">
                                    <tbody>
                                        @foreach($narahubungs as $narahubung)
                                            <tr>
                                                <td>{{ $narahubung->nama }}</td>
                                                <td>:</td>
                                                @if($narahubung->link == null)
                                                    <td>{{$narahubung->kontak}}</td>
                                                @else
                                                    <td><a href="{{$narahubung->link}}" target="_blank" class="col-sm-4 col-lg-5 col-form-label">{{$narahubung->kontak}}</a></td>
                                                @endif

                                                @if(Auth::user()->role_id == 1)
                                                    <td>
                                                        <div class="row">
                                                            <a href="{{url('/contact-person/edit/' . $narahubung->id)}}" class="mr-1 ml-1">
                                                                <button class="btn btn-sm btn-success text-sm"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                            <div data-toggle="modal" data-target="#modal-default{{$narahubung->id}}" class="ml-1 mr-1">
                                                                <button class="btn btn-sm btn-danger text-sm"><i class="fas fa-trash-alt"></i></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                                
                                            {{-- <div class="row">
                                                <label class="col-sm-4 col-lg-4 col-form-label">{{ $narahubung->nama }}</label>
                                                <label class="col-sm-1 col-lg-1 col-form-label">:</label>
                                                @if($narahubung->link == null)
                                                    <p class="col-sm-4 col-lg-5 col-form-label">{{$narahubung->kontak}}</p>
                                                @else
                                                    <a href="{{$narahubung->link}}" target="_blank" class="col-sm-4 col-lg-5 col-form-label">{{$narahubung->kontak}}</a>
                                                @endif

                                                @if(Auth::user()->role_id != 4)
                                                    <div class="col-lg-2 col-sm-2">
                                                        <div class="row">
                                                            <a href="{{url('/contact-person/edit/' . $narahubung->id)}}" class="mr-1 ml-1">
                                                                <button class="btn btn-sm btn-success text-sm"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                            <div data-toggle="modal" data-target="#modal-default{{$narahubung->id}}" class="ml-1 mr-1">
                                                                <button class="btn btn-sm btn-danger text-sm"><i class="fas fa-trash-alt"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div> --}}

                                            <div class="modal fade" id="modal-default{{$narahubung->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h4 class="modal-title">Hapus Data Contact Person</h4>
                                                            <!-- <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button> -->
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="">
                                                                Contact Person<br>
                                                                {{$narahubung->nama}} : {{$narahubung->kontak}}<br>
                                                                Apakah anda yakin untuk menghapus data ini?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                            <form action="{{url('/contact-person/' . $narahubung->id)}}" method="post" class="">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#modal-default">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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