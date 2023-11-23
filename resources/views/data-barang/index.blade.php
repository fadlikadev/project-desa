@extends('layouts.app')

@section('title')
    Data Barang
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": false, "autoWidth": false, "ordering": true,
                "buttons": ["csv", "excel", "pdf", "print",] , "scrollX" : true
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
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
                        <h1>Data Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><i class="fas fa-users"></i> Data Barang</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="card-title">Data Barang Desa</h3>
                                <a href="{{url('/data-barang/tambah')}}">
                                    <button class="btn btn-sm btn-success float-right shadow">Tambah</button>
                                </a>
                            </div>
                            <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm text-sm nowrap">
                                <thead class="bg-info">
                                    <tr>
                                        <th class="text-center align-middle">Tanggal Pendataan</th>
                                        <th class="text-center align-middle">Kode Barang</th>
                                        <th class="text-center align-middle">Nama Barang</th>
                                        <th class="text-center align-middle">Satuan</th>
                                        <th class="text-center align-middle">Tersedia</th>
                                        <th class="text-center align-middle">Dipinjam</th>
                                        <th class="text-center align-middle">Total Barang</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center align-middle">{{date('d M Y', strtotime($item->updated_at))}}</td>
                                            <td class="text-center align-middle">{{$item->kode_barang}}</td>
                                            <td class="text-center align-middle">{{$item->nama_barang}}</td>
                                            <td class="text-center align-middle">{{$item->satuan_barang}}</td>
                                            <td class="text-center align-middle">{{$item->jumlah_barang}}</td>

                                            <!-- Logika Penghitungan Barang -->
                                            @if ($item->pinjamans()->where('status_pinjaman', 'Disetujui')->exists())
                                                <!-- Menghitung Jumlah Barang Yang Dipinjam -->
                                                @php
                                                    $pinjaman = $item->pinjamans()->where('status_pinjaman', 'Disetujui')->get();

                                                    $totalDipinjam = 0;
                                                    $jumlahDataPinjaman = $pinjaman->count(); // 2
                                                    for ($a=0; $a < $jumlahDataPinjaman; $a++) { 
                                                        $totalDipinjam = $totalDipinjam + $pinjaman[$a]->jumlah_pinjaman;
                                                    }

                                                    // Total Aset Barang
                                                    $totalBarang = $item->jumlah_barang + $totalDipinjam;
                                                @endphp

                                                <td class="text-center align-middle">
                                                    {{$totalDipinjam}}
                                                </td>
                                                <td class="text-center align-middle">{{$totalBarang}}</td>
                                            @else
                                                <td class="text-center align-middle">
                                                    0
                                                </td>
                                                <td class="text-center align-middle">{{$item->jumlah_barang}}</td>
                                            @endif

                                            <td class="text-center align-middle">
                                                <a href="{{url('/data-barang/edit/' . $item->id)}}"><button class="btn btn-sm btn-success mx-1"><i class="fas fa-edit"></i></button></a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus{{$item->id}}"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="modal-hapus{{$item->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h4 class="modal-title">Hapus Data Barang</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="row justify-content-center text-sm">
                                                        <div class="col-4 col-sm-4 col-md-3">
                                                            Kode Barang<br>
                                                            Nama Barang<br>
                                                            Satuan Barang<br>
                                                            Total Barang<br>

                                                        </div>
                                                        <div class="col-8 col-sm-8 col-md-8">
                                                            : {{$item->kode_barang}}<br>
                                                            : {{$item->nama_barang}}<br>
                                                            : {{$item->satuan_barang}}<br>
                                                            : {{$item->jumlah_barang}}<br>

                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <form action="{{url('/data-barang/' . $item->id)}}" method="post" class="">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#modal-hapus">Hapus</button>
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