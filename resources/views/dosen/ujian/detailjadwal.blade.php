@extends('dosen.main')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Detail Jadwal Ujian Skripsi</h1>
            <div class="pull-right">
              <a href="{{ route('datajadwalujiandosen')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        {{-- Form --}}
        <form class="user" action="/dosen/skripsi/inserthasil" method="POST">
        {{csrf_field()}}

        <div class="row mt-5">
          @foreach($data as $item)
          <div class="col-md-12">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <td>NIM</td>
                  <td>:</td>
                  <th>{{ $item->nim }}</th>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <th>{{ $item->nama }}</th>
                </tr>
                <tr>
                  <td>No. HP/WA</td>
                  <td>:</td>
                  <th>{{ $item->hp }}</th>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <th>{{ $item->email }}</th>
                </tr>
                <tr>
                  <td><hr class="sidebar-divider"></td>
                  <td></td>
                  <td><hr class="sidebar-divider"></td>
                </tr>
                <tr>
                  <td>Judul</td>
                  <td>:</td>
                  <th>{{ $item->judul }}</th>
                </tr>
                <tr>
                  <td>Berkas Ujian</td>
                  <td>:</td>
                  <th><a href="/download/{{ $item->nim }}/berkas_ujian/{{$item->berkas_ujian}}">{{$item->berkas_ujian}}</a></th>
                </tr>
                <tr>
                  <td>Dosen Pembimbing Utama</td>
                  <td>:</td>
                  <th>{{ $dosen1->gelar3 }} {{ $dosen1->name }}, {{ $dosen1->gelar1 }}, {{ $dosen1->gelar2 }}</th>
                </tr>
                <tr>
                  <td>Dosen Pembimbing Pembantu</td>
                  <td>:</td>
                  <th>{{ $dosen2->gelar3 }} {{ $dosen2->name }}, {{ $dosen2->gelar1 }}, {{ $dosen2->gelar2 }}</th>
                </tr>
                <tr>
                  <td><hr class="sidebar-divider"></td>
                  <td></td>
                  <td><hr class="sidebar-divider"></td>
                </tr>
                <tr>
                  <td>Ketua Penguji</td>
                  <td>:</td>
                  <th>{{ $ketua->gelar3 }} {{ $ketua->name }}, {{ $ketua->gelar1 }}, {{ $ketua->gelar2 }}</th>
                </tr>
                <tr>
                  <td>Anggota Penguji 1</td>
                  <td>:</td>
                  <th>{{ $anggota1->gelar3 }} {{ $anggota1->name }}, {{ $anggota1->gelar1 }}, {{ $anggota1->gelar2 }}</th>
                </tr>
                <tr>
                  <td>Anggota Penguji 2</td>
                  <td>:</td>
                  <th>{{ $anggota2->gelar3 }} {{ $anggota2->name }}, {{ $anggota2->gelar1 }}, {{ $anggota2->gelar2 }}</th>
                </tr>
                <tr>
                  <td><hr class="sidebar-divider"></td>
                  <td></td>
                  <td><hr class="sidebar-divider"></td>
                </tr>
                <tr>
                  <td>Jadwal Seminar</td>
                  <td>:</td>
                  <th>{{ tgl_indo($item->tanggal, true)}}</th>
                </tr>
                <tr>
                  <td>Pukul</td>
                  <td>:</td>
                  <th>{{ $item->jam }} WIB</th>
                </tr>
                <tr>
                  <td>Tempat</td>
                  <td>:</td>
                  <th>{{ $item->tempat }}</th>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>:</td>
                  <th><textarea cols="30" rows="10" class="form-control">{{ $item->ket }}</textarea></th>
                </tr>
                <input type="hidden" value="{{ $item -> nim }}" name="nim">
                <input type="hidden" value="{{ $item -> id_proposal }}" name="id_proposal">
                <input type="hidden" value="{{ $item -> id }}" name="id_jadwal_ujian">
                <input type="hidden" value="{{ $id_hasil_ujian->id }}" name="id_hasil_ujian">
                <input type="hidden" value="{{ $id_status_skripsi->id }}" name="id_status_skripsi">
              </tbody>
            </table>
          </div>
                
        </div>
              
              
      {{-- Ketua Penguji --}}
      <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
          <h1 class="h3 mb-2 text-gray-800">Ketua Penguji</h1>
      </div>
      <div class="row mt-5">
        <div class="col-md-12">
          <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Berita Acara</td>
                      <td>:</td>
                      <th>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="berita_acara" id="inlineRadio1" value="Lulus" <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>>
                          <label class="form-check-label" for="inlineRadio1">Lulus</label>
                          <input class="form-check-input ml-5" type="radio" name="berita_acara" id="inlineRadio2" value="Tidak Lulus" <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>>
                          <label class="form-check-label" for="inlineRadio2">Tidak Lulus</label>
                        </div>
                    </th>
                    </tr>
                    <tr>
                      <td><hr class="sidebar-divider"></td>
                      <td></td>
                      <td><hr class="sidebar-divider"></td>
                    </tr>
                    <tr>
                      <td>Nilai Sikap(10%)</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="sikap1" placeholder="Masukkan Nilai Sikap" required <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Nilai Presentasi(10%)</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="presentasi1" placeholder="Masukkan Nilai Presentasi" required <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Nilai Penguasaan Teori(40%)</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="teori1" placeholder="Masukkan Nilai Penguasaan Teori" required <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Nilai Penguasaan Program(40%)</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="program1" placeholder="Masukkan Nilai Penguasaan Program" required <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Jumlah</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="jumlah1" placeholder="Masukkan Jumlah" required <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <th>
                        <select class="form-control" name="keterangan1" <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>>
                          <option>Pilih Keterangan --</option>
                          <option>Lulus</option>
                          <option>Tidak Lulus</option>
                      </select>
                    </th>
                    </tr>
                    <tr>
                      <td><hr class="sidebar-divider"></td>
                      <td></td>
                      <td><hr class="sidebar-divider"></td>
                    </tr>
                    <tr>
                      <td>Revisi</td>
                      <td>:</td>
                      <th><textarea class="form-control" name="revisi1" placeholder="Masukkan Revisi" <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>></textarea></th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <button class="btn btn-primary" <?=$item->ketua_penguji==$user->no_induk ? '' : 'disabled'?>>Simpan</button>
                        <a href="{{url()->previous()}}" class="btn btn-secondary" <?=$item->ketua_penguji==$user->no_induk ? '' : 'style="pointer-events: none;"'?>>Batal</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
          </div>
      </div>

    {{-- Anggota Penguji 1 --}}
      <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
          <h1 class="h3 mb-2 text-gray-800">Anggota Penguji 1</h1>
      </div>
      <div class="row mt-5">
        <div class="col-md-12">
          <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Nilai Sikap(10%)</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="sikap2" placeholder="Masukkan Nilai Sikap" required <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Nilai Presentasi(10%)</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="presentasi2" placeholder="Masukkan Nilai Presentasi" required <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Nilai Penguasaan Teori(40%)</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="teori2" placeholder="Masukkan Nilai Penguasaan Teori" required <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Nilai Penguasaan Program(40%)</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="program2" placeholder="Masukkan Nilai Penguasaan Program" required <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Jumlah</td>
                      <td>:</td>
                      <th><input type="text" class="form-control" name="jumlah2" placeholder="Masukkan Jumlah" required <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'disabled'?>></th>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <th>
                        <select class="form-control" name="keterangan2" <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'disabled'?>>
                          <option>Pilih Keterangan --</option>
                          <option>Lulus</option>
                          <option>Tidak Lulus</option>
                      </select>
                    </th>
                    </tr>
                    <tr>
                      <td><hr class="sidebar-divider"></td>
                      <td></td>
                      <td><hr class="sidebar-divider"></td>
                    </tr>
                    <tr>
                      <td>Revisi</td>
                      <td>:</td>
                      <th><textarea class="form-control" name="revisi2" placeholder="Masukkan Revisi" <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'disabled'?>></textarea></th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <button class="btn btn-primary" <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'disabled'?>>Simpan</button>
                        <a href="{{url()->previous()}}" class="btn btn-secondary" <?=$item->anggota_penguji_1==$user->no_induk ? '' : 'style="pointer-events: none;"'?>>Batal</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
          </div>
      </div>

      {{-- Anggota Penguji 2 --}}
      <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-2 text-gray-800">Anggota Penguji 2</h1>
    </div>
    <div class="row mt-5">
      <div class="col-md-12">
        <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td>Nilai Sikap(10%)</td>
                    <td>:</td>
                    <th><input type="text" class="form-control" name="sikap3" placeholder="Masukkan Nilai Sikap" required <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'disabled'?>></th>
                  </tr>
                  <tr>
                    <td>Nilai Presentasi(10%)</td>
                    <td>:</td>
                    <th><input type="text" class="form-control" name="presentasi3" placeholder="Masukkan Nilai Presentasi" required <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'disabled'?>></th>
                  </tr>
                  <tr>
                    <td>Nilai Penguasaan Teori(40%)</td>
                    <td>:</td>
                    <th><input type="text" class="form-control" name="teori3" placeholder="Masukkan Nilai Penguasaan Teori" required <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'disabled'?>></th>
                  </tr>
                  <tr>
                    <td>Nilai Penguasaan Program(40%)</td>
                    <td>:</td>
                    <th><input type="text" class="form-control" name="program3" placeholder="Masukkan Nilai Penguasaan Program" required <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'disabled'?>></th>
                  </tr>
                  <tr>
                    <td>Jumlah</td>
                    <td>:</td>
                    <th><input type="text" class="form-control" name="jumlah3" placeholder="Masukkan Jumlah" required <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'disabled'?>></th>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <th>
                      <select class="form-control" name="keterangan3" <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'disabled'?>>
                        <option>Pilih Keterangan --</option>
                        <option>Lulus</option>
                        <option>Tidak Lulus</option>
                    </select>
                  </th>
                  </tr>
                  <tr>
                    <td><hr class="sidebar-divider"></td>
                    <td></td>
                    <td><hr class="sidebar-divider"></td>
                  </tr>
                  <tr>
                    <td>Revisi</td>
                    <td>:</td>
                    <th><textarea class="form-control" name="revisi3" placeholder="Masukkan Revisi" <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'disabled'?>></textarea></th>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <button class="btn btn-primary" <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'disabled'?>>Simpan</button>
                      <a href="{{url()->previous()}}" class="btn btn-secondary" <?=$item->anggota_penguji_2==$user->no_induk ? '' : 'style="pointer-events: none;"'?>>Batal</a>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>

      
      @endforeach
      </form>

    </div>
@endsection