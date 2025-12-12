<?php

namespace App\Http\Controllers;

use App\Models\Fungsional;
use Illuminate\Http\Request;
use App\Models\Kepemimpinan;
use App\Models\Nasionaldua;
use App\Models\Pengawas;
use App\Models\Administrator;


class FungsionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fungsional::orderBy('created_at', 'desc')->get();
        return view('fungsional.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fungsional.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'                   => 'required|string|max:255',
            'nip'                    => 'required|string|max:255',
            'tempat_lahir'           => 'required|string|max:255',
            'tanggal_lahir'          => 'required|date',
            'jenis_kelamin'          => 'required|in:Laki-laki,Perempuan',

            'jabatan'                => 'required|string|max:255',
            'unit_kerja'             => 'required|string|max:255',
            'unit_organisasi'        => 'required|string|max:255',
            'instansi'               => 'required|string|max:255',

            'usulan_pelatihan'       => 'required|string|max:255',
            'penyelenggara_mekanisme'=> 'required|string|max:255',
            'pelaksanaan'            => 'required|string|max:255',
            'jenis_kepesertaan'      => 'required|string|max:255',

            'kehadiran'              => 'required|in:Hadir,Tidak Hadir',
            'alasan_tidak_hadir'     => 'nullable|string',

            'nilai_akhir'            => 'nullable|numeric',
            'predikat'               => 'nullable|string|max:255',
            'status'                 => 'nullable|in:Lulus,Tidak Lulus,Belum ada Sertifikat,On Progress',
            'keterangan'             => 'nullable|string',
        ]);

        Fungsional::create($request->all());

        return redirect()->route('fungsional.index')
                         ->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Fungsional::findOrFail($id);
        return view('fungsional.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Fungsional::findOrFail($id);
        return view('fungsional.edit', compact('data'));

                dd($data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'                   => 'required|string|max:255',
            'nip'                    => 'required|string|max:255',
            'tempat_lahir'           => 'required|string|max:255',
            'tanggal_lahir'          => 'required|date',
            'jenis_kelamin'          => 'required|in:Laki-laki,Perempuan',

            'jabatan'                => 'required|string|max:255',
            'unit_kerja'             => 'required|string|max:255',
            'unit_organisasi'        => 'required|string|max:255',
            'instansi'               => 'required|string|max:255',

            'usulan_pelatihan'       => 'required|string|max:255',
            'penyelenggara_mekanisme'=> 'required|string|max:255',
            'pelaksanaan'            => 'required|string|max:255',
            'jenis_kepesertaan'      => 'required|string|max:255',

            'kehadiran'              => 'required|in:Hadir,Tidak Hadir',
            'alasan_tidak_hadir'     => 'nullable|string',

            'nilai_akhir'            => 'nullable|numeric',
            'predikat'               => 'nullable|string|max:255',
            'status'                 => 'nullable|in:Lulus,Tidak Lulus,Belum ada Sertifikat,On Progress',
            'keterangan'             => 'nullable|string',
        ]);

        $data = Fungsional::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('fungsional.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Fungsional::findOrFail($id);
        $data->delete();

        return redirect()->route('fungsional.index')
                         ->with('success', 'Data berhasil dihapus!');
    }

    public function dashboard()
    {
        $fs = Fungsional::count();
        $pk = Kepemimpinan::count();
        $pkn = Nasionaldua::count();
        $pka = Administrator::count();
        $pkp = Pengawas::count();

        return view('pages.beranda', compact('fs','pk','pkn','pka','pkp'));
    }

}
