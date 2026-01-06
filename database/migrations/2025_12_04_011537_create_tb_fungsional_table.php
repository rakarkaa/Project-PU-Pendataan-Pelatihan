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
        $table->string('tempat_lahir')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();

        $table->string('jabatan')->nullable();
        $table->string('unit_kerja')->nullable();
        $table->string('unit_organisasi')->nullable();
        $table->string('instansi')->nullable();

        $table->string('usulan_pelatihan')->nullable();
        $table->string('penyelenggara_mekanisme')->nullable();
        $table->string('pelaksanaan')->nullable();
        $table->string('jenis_kepesertaan')->nullable();

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
