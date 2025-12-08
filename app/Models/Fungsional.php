<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsional extends Model
{
    use HasFactory;

    protected $table = 'tb_fungsional';   // nama tabel sesuai migration
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'jabatan',
        'unit_kerja',
        'unit_organisasi',
        'instansi',
        'usulan_pelatihan',
        'penyelenggara_mekanisme',
        'jenis_kepesertaan',
        'kehadiran',
        'alasan_tidak_hadir',
        'nilai_akhir',
        'predikat',
        'status',
        'keterangan',
    ];
}