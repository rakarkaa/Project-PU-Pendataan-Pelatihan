<?php

namespace App\Http\Controllers;

use App\Models\Pengawas;
use Illuminate\Http\Request;

class PengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            //menampilkan data
            $data = Pengawas::get();
            return view ('pengawas.show',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view ('pengawas.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',
            'unit'=>'required',
            'tgl_mulai'=>'required',
            'tgl_akhir'=>'required',
        ]);

            //tambah data
            Pengawas::create([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'unit'=>$request->unit,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir
        ]);

        //notif berhasil -> kembali halaman awal
        return redirect('/pengawas')->with('message','berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengawas $pengawas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $data = Pengawas::findOrFail($id);
            return view('pengawas.edit', [
            'data'=>$data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
            //validasi untuk update
            $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',
            'unit'=>'required',
            'tgl_mulai'=>'required',
            'tgl_akhir'=>'required',
            
        ]);

             Pengawas::where('id', $id)->update([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'unit'=>$request->unit,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir,
            
        ]);

        //notif berhasil -> kembali halaman awal
        return redirect('/pengawas')->with('message','berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            Pengawas::where('id', $id)->delete();
        
            return redirect('/pengawas')->with('messsage','data berhasil dihapus');
    }
}
