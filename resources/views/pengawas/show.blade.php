@extends('layouts.master')

@section('konten')
            <!-- Content Row -->
            <div class="row">
                <div class="container-sm shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="card">
                        <div class="card-header">Daftar Data Pelatihan Kepemimpinan Pengawas</div>

                        @if (session('message'))
                        <div class="alert alert-primary">{{session('message')}}</div>
                        @endif

                        <div class="d-grid gap-2 col-12 mx-auto"><br>
                        <a href="/pengawas/create" class="btn btn-primary" type="button">Tambah Data</a>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Akhir</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->jabatan}}</td>
                                    <td>{{$item->unit}}</td>
                                    <td>{{$item->tgl_mulai}}</td>
                                    <td>{{$item->tgl_akhir}}</td>
                                    <td>
                                        <!-- <button type="button" class="btn btn-danger">Hapus</button> -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus_{{$item->id}}">
                                            Hapus Data
                                        </button>
                                        <a href="/pengawas/{{$item->id}}/edit" class="btn btn-warning">edit</a>
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
                    <form action="/pengawas/{{$item->id}}" method="POST">
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