<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'tb_administrator';

    protected $primaryKey = 'id';

    protected $fillable = ['nama','jabatan','unit','tgl_mulai','tgl_akhir'];

    protected $guarded = ['id'];
}
