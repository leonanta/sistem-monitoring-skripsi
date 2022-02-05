@extends('mahasiswa.main')

@section('content')
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hasil Seminar Proposal</h1>
            {{-- <div class="pull-right">
                <a href="/mahasiswa/proposal/tambah" class="btn btn-success btn-flat">
                    <i class="fa fa-plus"></i> Ajukan
                </a>
            </div> --}}
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" style="width:100%" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Tanggal Seminar</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1?>
                              @foreach($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item -> nim}}</td>
                                    <td>{{ $item -> nama}}</td>
                                    <td>{{ $item -> judul}}</td>
                                    <td>{{ tgl_indo($item->tanggal, true)}}</td>
                                    @php
                                    $ba = DB::table('hasil_sempro')
                                    ->join('jadwal_sempro', 'hasil_sempro.id_jadwal_sempro', '=', 'jadwal_sempro.id')
                                    ->where('id_jadwal_sempro', $item->id)->first();
                                    // dd($ba);
                                    @endphp
                                    <td><a style="pointer-events: none;" class="btn btn-sm <?=($ba->berita_acara == "Diterima" ? 'btn-success' : ($ba->berita_acara == "Ditolak" ? 'btn-danger' : 'btn-warning' ))?>">{{ $item -> berita_acara }}</a></td>
                                    {{-- <td><a href="/sempro/hasil/cetakmhs/{{ $item->id }}" target="_blank" class="btn btn-primary btn-sm <?=//$item->status1 == "Sudah" && $item->status2 == "Sudah" ? '' : 'disabled'?>">Lihat Nilai</a></td> --}}
                                    <td><a href="/mahasiswa/proposal/hasil/detail/{{ $item->id }}" class="btn btn-sm btn-primary">Detail</a></td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>

        
    </div>
@endsection