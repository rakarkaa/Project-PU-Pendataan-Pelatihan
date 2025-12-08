@extends('layouts.master')

@section('konten')
            <!-- Content Row -->
            <div class="row">
                <div class="container-sm shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="card">
                        <div class="card-header">Daftar Data Pelatihan</div>

                        @if (session('message'))
                        <div class="alert alert-primary">{{session('message')}}</div>
                        @endif

                        <div class="d-grid gap-2 col-12 mx-auto"><br>
                        <a href="{{ route('fungsional.create') }}" class="btn btn-primary" type="button">Tambah Data</a>
                        </div>
                        
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>

                                        <th>Jabatan</th>
                                        <th>Unit Kerja</th>
                                        <th>Unit Organisasi</th>
                                        <th>Instansi</th>

                                        <th>Usulan Pelatihan</th>
                                        <th>Penyelenggara / Mekanisme</th>
                                        <th>Jenis Kepesertaan</th>

                                        <th>Kehadiran</th>
                                        <th>Alasan Tidak Hadir</th>

                                        <th>Nilai Akhir</th>
                                        <th>Predikat</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nip }}</td>
                                        <td>{{ $item->tempat_lahir }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>

                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->unit_kerja }}</td>
                                        <td>{{ $item->unit_organisasi }}</td>
                                        <td>{{ $item->instansi }}</td>

                                        <td>{{ $item->usulan_pelatihan }}</td>
                                        <td>{{ $item->penyelenggara_mekanisme }}</td>
                                        <td>{{ $item->jenis_kepesertaan }}</td>

                                        <td>{{ $item->kehadiran }}</td>
                                        <td>{{ $item->alasan_tidak_hadir }}</td>

                                        <td>{{ $item->nilai_akhir }}</td>
                                        <td>{{ $item->predikat }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <!-- <button type="button" class="btn btn-danger">Hapus</button> -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus_{{$item->id}}">
                                            Hapus Data
                                        </button>
                                        <a href="{{ route('fungsional.edit', $item->id) }}" class="btn btn-warning">edit</a>
                                    </td>
                                    </tr>

                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            @foreach ($data as $item)
            <div class="modal fade" id="modalHapus_{{$item->id}}" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="/fungsional/{{$item->id}}" method="POST">
                        <div class="modal-content">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Yakin Menghapus Nama {{$item->nama}}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                                <button type="submit" class="btn btn-danger">Hapus Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
            <!-- End of Main Content -->
@endsection
