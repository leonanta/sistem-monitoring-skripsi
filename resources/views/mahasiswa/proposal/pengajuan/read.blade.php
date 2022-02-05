@extends('mahasiswa.main')

@section('content')
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengajuan Proposal</h1>
            <div class="pull-right">
                @php
                    $cek = DB::table('proposal')
                    ->join('mahasiswa', 'proposal.nim', '=', 'mahasiswa.nim')
                    ->select('proposal.*', 'mahasiswa.*')
                    ->where('proposal.nim', $user->no_induk)
                    ->orderByRaw('proposal.id DESC')
                    ->first();
                    // dd($data);
                @endphp
                @if($cek== null)
                    <a href="/mahasiswa/proposal/tambah" class="btn btn-success btn-flat">
                        <i class="fa fa-plus"></i> Ajukan
                    </a>
                @elseif ($cek->ket1 == "Disetujui" && $cek->ket2 == "Disetujui")
                    <a href="/mahasiswa/proposal/tambah" class="btn btn-success btn-flat disabled">
                        <i class="fa fa-plus"></i> Ajukan
                    </a>
                @elseif ($cek->ket1 == "Ditolak" || $cek->ket2 == "Ditolak")
                    <a href="/mahasiswa/proposal/tambah" class="btn btn-success btn-flat">
                        <i class="fa fa-plus"></i> Ajukan
                    </a>
                @elseif ($cek->ket1 == "Revisi" || $cek->ket2 == "Revisi")
                    <a href="/mahasiswa/proposal/tambah" class="btn btn-success btn-flat disabled">
                        <i class="fa fa-plus"></i> Ajukan
                    </a>
                @elseif ($cek->ket1 == "Menunggu ACC" || $cek->ket2 == "Menunggu ACC")
                    <a href="/mahasiswa/proposal/tambah" class="btn btn-success btn-flat disabled">
                        <i class="fa fa-plus"></i> Ajukan
                    </a>
                @else
                    <a href="/mahasiswa/proposal/tambah" class="btn btn-success btn-flat">
                        <i class="fa fa-plus"></i> Ajukan
                    </a>
                @endif
            </div>
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
                                <th>Topik</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1?>
                              @foreach($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item -> nim }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> topik }}</td>
                                    <td>{{ $item -> judul }}</td>
                                    <td><p style="pointer-events: none;" class="btn btn-sm <?=($item -> ket1 == 'Disetujui' ? 'btn-success' : ($item -> ket1 == 'Revisi' ? 'btn-warning' : ($item -> ket1 == 'Ditolak' ? 'btn-danger' : 'btn-secondary')))?>">{{ $item -> ket1 }}</p> - <p style="pointer-events: none;" class="btn btn-sm <?=($item -> ket2 == 'Disetujui' ? 'btn-success' : ($item -> ket2 == 'Revisi' ? 'btn-warning' : ($item -> ket2 == 'Ditolak' ? 'btn-danger' : 'btn-secondary')))?>">{{ $item -> ket2 }}</p></td>
                                    <td><a href="/mahasiswa/proposal/pengajuan/detail/{{ $item->id }}" class="btn btn-sm btn-primary">Lihat detail</a></td>
                                    {{-- <td><a href="/download/proposal/{{$item->proposal}}">{{$item->proposal}}</a></td>
                                    <td>{{ $item -> ket1 }} - {{ $item -> komentar1 }}</td>
                                    <td>{{ $item -> ket2 }} - {{ $item -> komentar2 }}</td> --}}
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>

        
    </div>
@endsection