@extends('layouts.master')

@section('konten')
<div class="row">
    <div class="container-sm shadow-sm p-3 mb-5 bg-body rounded">
        <div class="card">
            <div class="card-header">Tambah Data Fungsional</div>

            <div class="card-body">
                <form action="{{ route('fungsional.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                                @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">NIP</label>
                                <input type="text" name="nip" class="form-control" value="{{ old('nip') }}">
                                @error('nip') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">-- pilih --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan'?'selected':'' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}">
                                @error('jabatan') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label">Unit Kerja</label>
                                <input type="text" name="unit_kerja" class="form-control" value="{{ old('unit_kerja') }}">
                                @error('unit_kerja') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Unit Organisasi</label>
                                <input type="text" name="unit_organisasi" class="form-control" value="{{ old('unit_organisasi') }}">
                                @error('unit_organisasi') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Instansi</label>
                                <input type="text" name="instansi" class="form-control" value="{{ old('instansi') }}">
                                @error('instansi') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Usulan Pelatihan</label>
                                <input type="text" name="usulan_pelatihan" class="form-control" value="{{ old('usulan_pelatihan') }}">
                                @error('usulan_pelatihan') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penyelenggara / Mekanisme</label>
                                <input type="text" name="penyelenggara_mekanisme" class="form-control" value="{{ old('penyelenggara_mekanisme') }}">
                                @error('penyelenggara_mekanisme') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                             <div class="mb-3">
                                <label class="form-label">Pelaksanaan</label>
                                <input type="text" name="pelaksanaan" class="form-control" value="{{ old('pelaksanaan') }}">
                                @error('pelaksanaan') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label">Jenis Kepesertaan</label>
                                <select type="text" name="jenis_kepesertaan" class="form-control" value="{{ old('jenis_kepesertaan') }}">
                                    <option value="">-- Pilih Kepesertaan --</option>
                                    <option value="Utama" {{ old('jenis_kepesertaan') }}>Utama</option>
                                    <option value="Cadangan" {{ old('jenis_kepesertaan') }}>Cadangan</option>
                                    <option value="Tambahan" {{ old('jenis_kepesertaan') }}>Tambahan</option>
                                </select>
                                @error('jenis_kepesertaan') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="kehadiran">Kehadiran</label>
                                <select name="kehadiran" class="form-control">
                                    <option value="">-- Pilih Kehadiran --</option>
                                    <option value="Hadir" {{ old('kehadiran')=='Hadir'?'selected':'' }}>Hadir</option>
                                    <option value="Tidak Hadir" {{ old('kehadiran')=='Tidak Hadir'?'selected':'' }}>Tidak Hadir</option>
                                </select>
                                @error('kehadiran') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alasan Tidak Hadir</label>
                                <input type="text" name="alasan_tidak_hadir" class="form-control" value="{{ old('alasan_tidak_hadir') }}">
                                @error('alasan_tidak_hadir') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label">Nilai Akhir</label>
                                <input type="number" step="0.01" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') }}">
                                @error('nilai_akhir') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Predikat</label>
                                <input type="text" name="predikat" class="form-control" value="{{ old('predikat') }}">
                                @error('predikat') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Lulus" {{ old('status')=='Lulus'?'selected':'' }}>Lulus</option>
                                    <option value="Tidak Lulus" {{ old('status')=='Tidak Lulus'?'selected':'' }}>Tidak Lulus</option>
                                    <option value="Belum ada Sertifikat" {{ old('status')=='Belum ada Sertifikat'?'selected':'' }}>Belum ada Sertifikat</option>
                                    <option value="On Progress" {{ old('status')=='On Progress'?'selected':'' }}>On Progress</option>
                                </select>
                                @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                                @error('keterangan') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                        </div>
                    </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                            <a href="/fungsional" class="btn btn-secondary">Kembali</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
