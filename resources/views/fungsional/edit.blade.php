@extends('layouts.master')

@section('title', 'Edit Data Fungsional')

@section('konten')
               <!-- Content Row -->
                    <div class="row">

                    <!-- Content Row --> 
                        <div class="container-sm shadow-sm p-3 mb-5 bg-body rounded">
                        <h5 class="font-weight-bold text-gray-800">Edit Data Pelatihan Kepemimpinan Nasional Tingkat 2</h5>
                        <div class="card-body">
                    <form action="{{ route('fungsional.update', $data->id) }}" method="POST">
        
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nama -->
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                                </div>

                                <!-- NIP -->
                                <div class="mb-3">
                                    <label>NIP</label>
                                    <input type="text" name="nip" class="form-control" value="{{ $data->nip }}" required>
                                </div>

                                <!-- Tempat Lahir -->
                                <div class="mb-3">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $data->tempat_lahir }}" required>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $data->tanggal_lahir }}" required>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <!-- Jabatan -->
                                <div class="mb-3">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="{{ $data->jabatan }}" required>
                                </div>

                                <!-- Unit Kerja -->
                                <div class="mb-3">
                                    <label>Unit Kerja</label>
                                    <input type="text" name="unit_kerja" class="form-control" value="{{ $data->unit_kerja }}" required>
                                </div>

                                <!-- Unit Organisasi -->
                                <div class="mb-3">
                                    <label>Unit Organisasi</label>
                                    <input type="text" name="unit_organisasi" class="form-control" value="{{ $data->unit_organisasi }}" required>
                                </div>

                                <!-- Instansi -->
                                <div class="mb-3">
                                    <label>Instansi</label>
                                    <input type="text" name="instansi" class="form-control" value="{{ $data->instansi }}" required>
                                </div>

                            </div>
                        </div>

                        <hr>

                        <h5>Data Pelatihan</h5>
                        <div class="row">

                            <div class="col-md-6">
                                <!-- Usulan Pelatihan -->
                                <div class="mb-3">
                                    <label>Usulan Pelatihan</label>
                                    <input type="text" name="usulan_pelatihan" class="form-control" value="{{ $data->usulan_pelatihan }}" required>
                                </div>

                                <!-- Penyelenggara -->
                                <div class="mb-3">
                                    <label>Penyelenggara / Mekanisme</label>
                                    <input type="text" name="penyelenggara_mekanisme" class="form-control" value="{{ $data->penyelenggara_mekanisme }}" required>
                                </div>

                                <!-- Pelaksanaan -->
                                <div class="mb-3">
                                    <label>Pelaksanaan</label>
                                    <input type="text" name="pelaksanaan" class="form-control" value="{{ $data->pelaksanaan }}" required>
                                </div>

                                <!-- Jenis Kepesertaan -->
                                <div class="mb-3">
                                    <label>Jenis Kepesertaan</label>
                                    <select name="jenis_kepesertaan" class="form-control" required>
                                        <option value="Utama" {{ $data->jenis_kepesertaan == 'Utama' ? 'selected' : '' }}>Utama</option>
                                        <option value="Cadangan" {{ $data->jenis_kepesertaan == 'Cadangan' ? 'selected' : '' }}>Cadangan</option>
                                        <option value="Tambahan" {{ $data->jenis_kepesertaan == 'Tambahan' ? 'selected' : '' }}>Tambahan</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <!-- Kehadiran -->
                                <div class="mb-3">
                                    <label>Kehadiran</label>
                                    <select name="kehadiran" class="form-control" required>
                                        <option value="Hadir" {{ $data->kehadiran == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="Tidak Hadir" {{ $data->kehadiran == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                                    </select>
                                </div>

                                <!-- Alasan Tidak Hadir -->
                                <div class="mb-3">
                                    <label>Alasan Tidak Hadir</label>
                                    <textarea name="alasan_tidak_hadir" class="form-control">{{ $data->alasan_tidak_hadir }}</textarea>
                                </div>

                            </div>

                        </div>

                        <hr>

                        <h5>Penilaian</h5>

                        <div class="row">

                            <div class="col-md-6">
                                <!-- Nilai Akhir -->
                                <div class="mb-3">
                                    <label>Nilai Akhir</label>
                                    <input type="number" step="0.01" name="nilai_akhir" class="form-control" 
                                        value="{{ $data->nilai_akhir }}">
                                </div>

                                <!-- Predikat -->
                                <div class="mb-3">
                                    <label>Predikat</label>
                                    <input type="text" name="predikat" class="form-control" value="{{ $data->predikat }}">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <!-- Status -->
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="Lulus" {{ $data->status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                        <option value="Tidak Lulus" {{ $data->status == 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                                        <option value="Belum ada Sertifikat" {{ $data->status == 'Belum ada Sertifikat' ? 'selected' : '' }}>Belum ada Sertifikat</option>
                                        <option value="On Progress" {{ $data->status == 'On Progress' ? 'selected' : '' }}>On Progress</option>
                                    </select>
                                </div>

                                <!-- Keterangan -->
                                <div class="mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control">{{ $data->keterangan }}</textarea>
                                </div>

                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/fungsional" class="btn btn-secondary" type="button">Kembali</a>
                        </form>
                        
                    </div>

            </div>

            <!-- End of Main Content -->
@endsection
