<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepemimpinanCont;
use App\Http\Controllers\NasionalduaController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\PengawasController;
use App\Http\Controllers\FungsionalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

//halaman pertama
Route::get('/', function () {
    return view('pages/beranda');
});


//count
Route::get('/', [FungsionalController::class, 'dashboard'])->name('beranda');

//exportFungsional
Route::get('/fungsional/export/excel', [FungsionalController::class, 'exportExcel'])
    ->name('fungsional.export.excel');

//importFungsional
Route::get('/fungsional/import', [FungsionalController::class, 'formImport'])
    ->name('fungsional.import.form');

Route::post('/fungsional/import', [FungsionalController::class, 'importExcel'])
    ->name('fungsional.import');


//login
Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Berhasil logout');
})->name('logout');

//register
Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);


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

//Fungsional

Route::get('/fungsional', [FungsionalController::class, 'index'])->name('fungsional.index');
Route::get('/fungsional/create', [FungsionalController::class, 'create'])->name('fungsional.create');
Route::post('/fungsional', [FungsionalController::class, 'store'])->name('fungsional.store');

Route::get('/fungsional/{id}', [FungsionalController::class, 'show'])->name('fungsional.show'); // ★ penting!
Route::get('/fungsional/{id}/edit', [FungsionalController::class, 'edit'])->name('fungsional.edit');

Route::put('/fungsional/{id}', [FungsionalController::class, 'update'])->name('fungsional.update');
Route::delete('/fungsional/{id}', [FungsionalController::class, 'destroy'])->name('fungsional.destroy');

Route::post('/fungsional/bulk-delete', 
    [FungsionalController::class, 'bulkDelete']
)->name('fungsional.bulk.delete');





// route::view('kepemimpinan','administrator', 'pengawas', 'nasionaldua');