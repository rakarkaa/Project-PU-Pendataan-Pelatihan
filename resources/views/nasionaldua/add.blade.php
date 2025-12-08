@extends('layouts.master')

@section('konten')
               <!-- Content Row -->
                    <div class="row">

                   <!-- Content Row --> 
                    <div class="container-sm shadow-sm p-3 mb-5 bg-body rounded">
                    <h5 class="font-weight-bold text-gray-800">Input Data Pelatihan Kepemimpinan Nasionaal Tingkat 2</h5>
                    <div class="card-body">
                   <form action="/nasionaldua" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                            @error('nama')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}">
                        </div>
                            @error('jabatan')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror                        
                        <div class="mb-3">
                                <label for="" class="form-label">Unit Divisi</label>
                                <input type="text" name="unit" class="form-control" value="{{ old('unit') }}">
                        </div>
                            @error('unit')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror                       
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Masuk</label>
                            <input type="date" name="tgl_mulai" class="form-control" value="{{ old('tgl_mulai') }}">
                        </div>
                            @error('tgl_mulai')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" class="form-control" value="{{ old('tgl_akhir') }}">
                        </div>
                            @error('tgl_akhir')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/administrator" class="btn btn-secondary" type="button">Kembali</a>
                        </form>
                        
                    </div>

            </div>
            <!-- End of Main Content -->
@endsection