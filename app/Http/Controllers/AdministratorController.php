<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            //menampilkan data
            $data = Administrator::get();
            return view ('administrator.show',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view ('administrator.add');
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
             Administrator::create([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'unit'=>$request->unit,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir
        ]);

        //notif berhasil -> kembali halaman awal
        return redirect('/administrator')->with('message','berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $data = Administrator::findOrFail($id);
            return view('administrator.edit', [
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

            Administrator::where('id', $id)->update([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'unit'=>$request->unit,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir,
            
        ]);

        //notif berhasil -> kembali halaman awal
        return redirect('/administrator')->with('message','berhasil edit data');
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            Administrator::where('id', $id)->delete();
        
            return redirect('/administrator')->with('messsage','data berhasil dihapus');
    }
}
