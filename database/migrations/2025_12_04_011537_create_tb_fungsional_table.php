<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_fungsional', function (Blueprint $table) {
        $table->id();

        $table->string('nama');
        $table->string('nip');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);

        $table->string('jabatan');
        $table->string('unit_kerja');
        $table->string('unit_organisasi');
        $table->string('instansi');

        $table->string('usulan_pelatihan');
        $table->string('penyelenggara_mekanisme');
        $table->string('pelaksanaan');
        $table->string('jenis_kepesertaan');

        $table->enum('kehadiran', ['Hadir', 'Tidak Hadir'])->default('Hadir');
        $table->text('alasan_tidak_hadir')->nullable();

        $table->decimal('nilai_akhir', 5, 2)->nullable();
        $table->string('predikat')->nullable();
        $table->enum('status', ['Lulus', 'Tidak Lulus'])->nullable();
        $table->text('keterangan')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_fungsional');
    }
};
