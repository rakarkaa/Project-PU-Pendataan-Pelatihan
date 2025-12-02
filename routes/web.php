<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepemimpinanCont;
use App\Http\Controllers\NasionalduaController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\PengawasController;

//beranda
Route::get('/', function () {
    return view('pages/beranda');
});

Route::get('login', function () {
    return view('login/login');
});

// Route::get('/kepemimpinan', function () {
//     $biodata = [
//         'nama'=>'Muhammad Raka',
//         'jabatan'=>'it',
//         'unit'=>'it',
//         'tgl_mulai'=>'12 januari 2025',
//         'tgl_akhir'=>'12 januari 2025',   
//     ];
//     return view('pages/kepemimpinan',$biodata);
// });

//Kepemimpinan
Route::get('/kepemimpinan', [KepemimpinanCont::class,'index']); //link

Route::get('/kepemimpinan/create', [KepemimpinanCont::class,'create']); //menghubungkan link tampil data
Route::post('/kepemimpinan', [KepemimpinanCont::class,'data_pegawai']); //Post Tambah

Route::get('/kepemimpinan/{id}/edit', [KepemimpinanCont::class,'edit']); //edit
Route::put('/kepemimpinan/{id}', [KepemimpinanCont::class,'update']); //update

Route::delete('/kepemimpinan/{id}',[KepemimpinanCont::class, 'destroy']); //hapus

//Nasionaldua
Route::get('/nasionaldua', [NasionalduaController::class,'index']); //link

Route::get('/nasionaldua/create', [NasionalduaController::class,'create']); //menghubungkan link tampil data
Route::post('/nasionaldua', [NasionalduaController::class,'store']); //Post Tambah

Route::delete('/nasionaldua/{id}',[NasionalduaController::class, 'destroy']); //hapus

Route::get('/nasionaldua/{id}/edit', [NasionalduaController::class,'edit']); //edit
Route::put('/nasionaldua/{id}', [NasionalduaController::class,'update']); //update

//administrator
Route::get('/administrator', [AdministratorController::class,'index']); //link

Route::get('/administrator/create', [AdministratorController::class,'create']); //menghubungkan link tampil data
Route::post('/administrator', [AdministratorController::class,'store']); //Post Tambah

Route::get('/administrator/{id}/edit', [AdministratorController::class,'edit']); //edit
Route::put('/administrator/{id}', [AdministratorController::class,'update']); //update

Route::delete('/administrator/{id}',[AdministratorController::class, 'destroy']); //hapus

//Pengawas
Route::get('/pengawas', [PengawasController::class,'index']); //link

Route::get('/pengawas/create', [PengawasController::class,'create']); //menghubungkan link tampil data
Route::post('/pengawas', [PengawasController::class,'store']); //Post Tambah

Route::get('/pengawas/{id}/edit', [PengawasController::class,'edit']); //edit
Route::put('/pengawas/{id}', [PengawasController::class,'update']); //update

Route::delete('/pengawas/{id}',[PengawasController::class, 'destroy']); //hapus



// route::view('kepemimpinan','administrator', 'pengawas', 'nasionaldua');