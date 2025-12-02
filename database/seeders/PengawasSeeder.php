<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengawasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //menambah data
        DB::table('tb_pengawas')->insert([
           [
            'nama'=>'Raka',
            'jabatan'=>'Pegawai',
            'unit'=>'Fungsional',
            'tgl_mulai'=>'15 Januari 2025',
            'tgl_akhir'=>'15 Maret 2025',
            'created_at'=>now()
           ],[
            'nama'=>'Andi',
            'jabatan'=>'Pegawai',
            'unit'=>'Fungsional',
            'tgl_mulai'=>'15 Januari 2026',
            'tgl_akhir'=>'15 Maret 2026',
            'created_at'=>now()
           ]
        ]);
    }
}

