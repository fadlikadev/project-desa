@extends('layouts.app')

@section('title')
    Peminjaman Barang
@endsection

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
@endpush

@push('scripts')
    <!-- Select2 -->
    <script src="{{asset('AdminLTE')}}/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
      
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $('#barang').hide();
        })
    </script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $(function(){
                $('#data_barang_id').on('change', function(){
                    let id_data_barang = $('#data_barang_id').val();

                    $.ajax({
                        type: "POST",
                        url: "{{url('/data-peminjaman/barang/getbarang')}}",
                        data: {id_data_barang: id_data_barang},
                        cache: false,

                        success: function(msg){
                            $('#barang').html(msg);
                            document.getElementById('default-tersedia').remove();
                            $('#barang').show();
                        },
                        error: function(data){
                            console.log('error:', data)
                        },
                    })
                });
            });
        });
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
                        <h1>Data Peminjaman Barang & Fasilitas</h1>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item active">
                                <i class="fas fa-building"></i> Pangkalan
                            </li> -->
                            <li class="breadcrumb-item active">
                                <i class="fas fa-boxes"></i> Data Peminjaman <i class="fas fa-angle-right"></i> Tambah
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
                                <h3 class="card-title">Form Edit Data Peminjaman Barang</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal text-sm" action="{{url('/data-peminjaman/barang/' . $dataPinjaman->id)}}" method="post">
                                @csrf
                                @method('put')

                                <div class="card-body text-sm">

                                    <div class="form-group row">
                                        <label for="data_barang_id" class="col-sm-12 col-lg-3 col-form-label">Nama Barang</label>
                                        <div class="col-sm-12 col-lg-8">
                                            
                                            <select name="data_barang_id" id="data_barang_id" class="select2 form-control @error ('data_barang_id') is-invalid @enderror">
                                                <option value="">-- Pilih Barang Yang Dipinjam --</option>

                                                @foreach ($dataBarang as $item)
                                                    <option value="{{$item->id}}" <?php if($dataPinjaman->data_barang_id == $item->id) echo 'selected' ?>>{{$item->nama_barang}}</option>
                                                @endforeach
                                            </select>

                                            @error('data_barang_id')
                                                <b class="text-danger text-sm">nama barang yang dipinjam wajib diisi</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="user_id" class="col-sm-12 col-lg-3 col-form-label">Nama Peminjam</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <select name="user_id" id="" class="select2 form-control @error ('user_id') is-invalid @enderror">
                                                <option value="" disabled selected>-- Pilih Peminjam --</option>

                                                @foreach ($peminjams as $item)
                                                    <option value="{{$item->id}}" {{ old('user_id') == $item->id ? "selected" : "" }} <?php if($dataPinjaman->user_id == $item->id) echo 'selected' ?>>{{$item->nama_lengkap}}</option>
                                                @endforeach
                                            </select>

                                            @error('user_id')
                                                <b class="text-danger text-sm">nama peminjam wajib diisi</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jumlah_pinjaman" class="col-sm-12 col-lg-3 col-form-label">Jumlah Barang Yang Dipinjam</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="number" class="form-control @error ('jumlah_pinjaman') is-invalid @enderror" id="jumlah_pinjaman" name="jumlah_pinjaman" placeholder="Masukkan Jumlah Barang Yang Akan Dipinjam" value="{{old('jumlah_pinjaman')?old('jumlah_pinjaman'):$dataPinjaman->jumlah_pinjaman}}">

                                            <span class="mt-1" id="barang">Tersedia : </span>
                                            <span class="mt-1" id="default-tersedia">Tersedia : <b>{{$dataPinjaman->barang->jumlah_barang}} {{$dataPinjaman->barang->satuan_barang}}</b></span>

                                            @error('jumlah_pinjaman')
                                                <br><b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tanggal_pinjam" class="col-sm-12 col-lg-3 col-form-label">Tanggal Peminjaman</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="date" class="form-control @error ('tanggal_pinjam') is-invalid @enderror" id="tanggal_pinjam" name="tanggal_pinjam" placeholder="Masukkan Tanggal Pinjam" value="{{old('tanggal_pinjam')?old('tanggal_pinjam'):$dataPinjaman->tanggal_pinjam}}">

                                            @error('tanggal_pinjam')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tanggal_kembali" class="col-sm-12 col-lg-3 col-form-label">Tanggal Pengembalian</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="date" class="form-control @error ('tanggal_kembali') is-invalid @enderror" id="tanggal_kembali" name="tanggal_kembali" placeholder="Masukkan Tanggal Pengembalian" value="{{old('tanggal_kembali')?old('tanggal_kembali'):$dataPinjaman->tanggal_kembali}}">

                                            @error('tanggal_kembali')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="keterangan" class="col-sm-12 col-lg-3 col-form-label">Keperluan Peminjaman</label>
                                        <div class="col-sm-12 col-lg-8">
                                            <input type="text" class="form-control @error ('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Masukkan Keperluan Peminjaman" value="{{old('keterangan')?old('keterangan'):$dataPinjaman->keterangan}}">

                                            @error('keterangan')
                                                <b class="text-danger text-sm">{{$message}}</b>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-sm">
                                    
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>

                                    <a href="{{url('/data-peminjaman')}}">
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