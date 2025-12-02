<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kepemimpinan extends Model
{
    protected $table = 'tb_kepemimpinan';

    protected $primaryKey = 'id_kepemimpinan';

    protected $fillable = ['nama','jabatan','unit','tgl_mulai','tgl_akhir'];

    protected $guarded = ['id_kepemimpinan'];
}
