@extends('admin.main')

@section('content')
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Plotting Dosen Penguji</h1>
            <div class="pull-right">
                <div class="row">
                    <a class="btn btn-flat btn-outline-success mr-2" href="{{ route('downloadformatplottingpenguji') }}">Download Format Excel</a>
                    {{-- <a class="btn btn-success btn-flat" href="#" data-toggle="modal" data-target="#importExcel">Import Excel</a>
                    <a class="btn btn-flat btn-outline-success ml-2" href="{{ route('downloadformatplottingdosbing') }}">Tambah Mahasiswa</a> --}}
                    <div class="dropdown mr-1">
                        <button type="button" class="btn btn-success dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                          Tambah
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                          <a class="dropdown-item" href="{{ route('formpengujiaddsatumahasiswa') }}">Satu Mahasiswa</a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#importExcel">Import Excel</a>
                        </div>
                    </div>
                </div>
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

        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/admin/plotpenguji/importexcel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label for="" class="small">Pilih File Excel*</label>
							<div class="form-group">
								<input type="file" name="file" required>
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>

        <!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" style="width:100%" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Semester</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Ketua Penguji</th>
                                <th>Anggota Penguji 1</th>
                                <th>Anggota Penguji 2</th>
                                {{-- <th>Sempro</th>
                                <th>Skripsi</th> --}}
                                {{-- <th>Edit</th>
                                <th>Hapus</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1?>
                              @foreach($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item -> smt }}</td>
                                    <td>{{ $item -> nim }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> gelar31 }} {{ $item -> dosen1 }}, {{ $item -> gelar11 }}, {{ $item -> gelar21 }}</td>
                                    <td>{{ $item -> gelar32 }} {{ $item -> dosen2 }}, {{ $item -> gelar12 }}, {{ $item -> gelar22 }}</td>
                                    <td>{{ $item -> gelar33 }} {{ $item -> dosen3 }}, {{ $item -> gelar13 }}, {{ $item -> gelar23 }}</td>
                                    {{-- <td>Sudah Seminar</td>
                                    <td>Bimbingan Ke-2</td> --}}
                                    {{-- <td>
                                        <a href="/admin/dosen/edit/{{$item->nidn}}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/admin/dosen/{{$item->nidn}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" value="delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td> --}}
                                    
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>

        
    </div>
@endsection