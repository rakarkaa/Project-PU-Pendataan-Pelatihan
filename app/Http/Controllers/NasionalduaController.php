<?php

namespace App\Http\Controllers;

use App\Models\Nasionaldua;
use Illuminate\Http\Request;

class NasionalduaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            //menampilkan data
            $data = Nasionaldua::get();
            return view ('nasionaldua.show',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view ('nasionaldua.add');
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
        Nasionaldua::create([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'unit'=>$request->unit,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir
        ]);

        //notif berhasil -> kembali halaman awal
        return redirect('/nasionaldua')->with('message','berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nasionaldua $nasionaldua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $data = Nasionaldua::findOrFail($id);
            return view('nasionaldua.edit', [
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

             Nasionaldua::where('id', $id)->update([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'unit'=>$request->unit,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir,
            
        ]);

        //notif berhasil -> kembali halaman awal
        return redirect('/nasionaldua')->with('message','berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            Nasionaldua::where('id', $id)->delete();
        
            return redirect('/nasionaldua')->with('messsage','data berhasil dihapus');
    }
}
