@extends('layouts.master')

@section('konten')
               <!-- Content Row -->
                    <div class="row">

                   <!-- Content Row --> 
                    <div class="container-sm shadow-sm p-3 mb-5 bg-body rounded">
                    <h5 class="font-weight-bold text-gray-800">Edit Data Pelatihan Kepemimpinan Nasional Tingkat 2</h5>
                    <div class="card-body">
                   <form action="/administrator/{{$data->id}}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ $data->jabatan }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Unit Divisi</label>
                            <input type="text" name="unit" class="form-control" value="{{ $data->unit }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" value="{{ old('tgl_mulai', $data->tgl_mulai) }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" class="form-control" value="{{ old('tgl_akhir', $data->tgl_akhir) }}">

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/administrator" class="btn btn-secondary" type="button">Kembali</a>
                        </form>
                        
                    </div>

            </div>
            <!-- End of Main Content -->
@endsection