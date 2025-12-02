<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepemimpinan;

class KepemimpinanCont extends Controller
{
    public function index(){   

        //menampilkan data
        $kepemimpinan = Kepemimpinan::get();
        return view ('kepemimpinan.show',[
            'data_kepemimpinan'=>$kepemimpinan,
        ]);
    }

    //menghubungkan link add
    public function create(){   
        return view ('kepemimpinan.add');
    }

    public function data_pegawai(Request $request){
        //validasi
        $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',
            'unit'=>'required',
            'tgl_mulai'=>'required',
            'tgl_akhir'=>'required',
        ]);

        //tambah data
        Kepemimpinan::create([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'unit'=>$request->unit,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir
        ]);



        //notif berhasil -> kembali halaman awal
        return redirect('/kepemimpinan')->with('message','berhasil menambahkan data');
    }


    public function edit($id_kepemimpinan){
        //ambil 1 data dari id untuk edit
        // dd($id_kepemimpinan);
        $data = Kepemimpinan::findOrFail($id_kepemimpinan);

        return view('kepemimpinan.edit', [
            'data'=>$data,
        ]);
    }

    public function update($id_kepemimpinan,Request $request){
        //validasi untuk update
        $request->validate([
        'nama'=>'required',
        'jabatan'=>'required',
        'unit'=>'required',
        'tgl_mulai'=>'required',
        'tgl_akhir'=>'required',
            
        ]);

        Kepemimpinan::where('id_kepemimpinan', $id_kepemimpinan)->update([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'unit'=>$request->unit,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir,
            
        ]);

        //notif berhasil -> kembali halaman awal
        return redirect('/kepemimpinan')->with('message','berhasil edit data');
    }

    public function destroy($id_kepemimpinan){
            //menghapus data
            // $getdata = Kepemimpinan::findOrFail($id_kepemimpinan);

            Kepemimpinan::where('id_kepemimpinan', $id_kepemimpinan)->delete();
            
            return redirect('/kepemimpinan')->with('messsage','data berhasil dihapus');
    }
}
