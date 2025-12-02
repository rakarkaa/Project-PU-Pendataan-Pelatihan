<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengawas extends Model
{
    protected $table = 'tb_pengawas';

    protected $primaryKey = 'id';

    protected $fillable = ['nama','jabatan','unit','tgl_mulai','tgl_akhir'];

    protected $guarded = ['id'];
}
