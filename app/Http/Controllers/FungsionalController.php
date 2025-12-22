<?php

namespace App\Http\Controllers;

use App\Models\Fungsional;
use Illuminate\Http\Request;
use App\Models\Kepemimpinan;
use App\Models\Nasionaldua;
use App\Models\Pengawas;
use App\Models\Administrator;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

use PhpOffice\PhpSpreadsheet\IOFactory;

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

        //Export
        public function exportExcel()
    {
        // 1. Ambil data dari database
        $data = \App\Models\Fungsional::all();

        // 2. Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // 3. Buat header kolom
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'NIP');
        $sheet->setCellValue('D3', 'Tempat Lahir');
        $sheet->setCellValue('E3', 'Tanggal Lahir');
        $sheet->setCellValue('F3', 'Jenis Kelamin');

        $sheet->setCellValue('G3', 'Jabatan');
        $sheet->setCellValue('H3', 'Unit Kerja');
        $sheet->setCellValue('I3', 'Unit Organisasi');
        $sheet->setCellValue('J3', 'Instansi');

        $sheet->setCellValue('K3', 'Usulan Pelatihan');
        $sheet->setCellValue('L3', 'Usulan Penyelenggara/Mekanisme');
        $sheet->setCellValue('M3', 'Pelaksanaan');
        $sheet->setCellValue('N3', 'Jenis Kepesertaan');
        
        $sheet->setCellValue('O3', 'Kehadiran');
        $sheet->setCellValue('P3', 'Alasan Tidak Hadir');
        
        $sheet->setCellValue('Q3', 'Nilai Akhir');
        $sheet->setCellValue('R3', 'Predikat');
        $sheet->setCellValue('S3', 'Status');
        $sheet->setCellValue('T3', 'Keterangan');

        // =========================
        // STYLE HEADER
        // =========================
        $sheet->setCellValue('A1', 'LAPORAN DATA PELATIHAN FUNGSIONAL');
        $sheet->mergeCells('A1:T1');

        $sheet->freezePane('A4');

        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getRowDimension(1)->setRowHeight(30);

        $sheet->getStyle('A3:T3')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'E5E7EB'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // 4. Isi data ke Excel
        $row = 4;
        foreach ($data as $index => $item) {
            $sheet->setCellValue('A'.$row, $index + 1);
            $sheet->setCellValue('B'.$row, $item->nama);
            $sheet->setCellValue('C'.$row, $item->nip);
            $sheet->setCellValue('D'.$row, $item->tempat_lahir);
            $sheet->setCellValue('E'.$row, $item->tanggal_lahir);
            $sheet->setCellValue('F'.$row, $item->jenis_kelamin);

            $sheet->setCellValue('G'.$row, $item->jabatan);
            $sheet->setCellValue('H'.$row, $item->unit_kerja);
            $sheet->setCellValue('I'.$row, $item->unit_organisasi);
            $sheet->setCellValue('J'.$row, $item->instansi);

            $sheet->setCellValue('K'.$row, $item->usulan_pelatihan);
            $sheet->setCellValue('L'.$row, $item->penyelenggara_mekanisme);
            $sheet->setCellValue('M'.$row, $item->pelaksanaan);
            $sheet->setCellValue('N'.$row, $item->jenis_kepesertaan);
            
            $sheet->setCellValue('O'.$row, $item->kehadiran);
            $sheet->setCellValue('P'.$row, $item->alasan_tidak_hadir);

            $sheet->setCellValue('Q'.$row, $item->nilai_akhir);
            $sheet->setCellValue('R'.$row, $item->predikat);
            $sheet->setCellValue('S'.$row, $item->status);
            $sheet->setCellValue('T'.$row, $item->keterangan);
            $row++;
        }

        // =========================
        // BORDER UNTUK SELURUH DATA
        // =========================
        $lastRow = $row - 1;

        $sheet->getStyle("A3:T{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // =========================
        // AUTO WIDTH
        // =========================
        foreach (range('A','T') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $sheet->getStyle('A:T')->getAlignment()->setWrapText(true);

        $sheet->getStyle("A4:T{$lastRow}")
      ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("C4:T{$lastRow}")
            ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("G4:T{$lastRow}")
            ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


        // 5. Download file Excel
        $writer = new Xlsx($spreadsheet);

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            "Content-Type" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "Content-Disposition" => "attachment; filename=data_fungsional.xlsx",
            "Cache-Control" => "max-age=0",
        ]);
    }

        //Import
        public function formImport()
    {
        return view('fungsional.import');
    }

        public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        // Load file Excel
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        /**
         * STRUKTUR EXCEL (sesuai export kamu):
         * Row 1 = Judul besar
         * Row 2 = kosong
         * Row 3 = Header kolom
         * Row 4+ = Data
         */

        foreach ($rows as $index => $row) {
            // Skip header (baris 1–3)
            if ($index < 3) {
                continue;
            }

            // Skip baris kosong
            if (empty($row[1])) {
                continue;
            }

            Fungsional::create([
                'nama' => $row[1],
                'nip' => $row[2],
                'tempat_lahir' => $row[3],
                'tanggal_lahir' => $row[4],
                'jenis_kelamin' => $row[5],

                'jabatan' => $row[6],
                'unit_kerja' => $row[7],
                'unit_organisasi' => $row[8],
                'instansi' => $row[9],

                'usulan_pelatihan' => $row[10],
                'penyelenggara_mekanisme' => $row[11],
                'pelaksanaan' => $row[12],
                'jenis_kepesertaan' => $row[13],

                'kehadiran' => $row[14],
                'alasan_tidak_hadir' => $row[15],

                'nilai_akhir' => $row[16],
                'predikat' => $row[17],
                'status' => $row[18],
                'keterangan' => $row[19],
            ]);
        }

        return redirect()->route('fungsional.index')
            ->with('success', 'Data Excel berhasil diimport');
    }

        //hapus terpilih
        public function bulkDelete(Request $request)
    {
        if (!$request->ids) {
            return back()->with('message', 'Tidak ada data yang dipilih');
        }

        \App\Models\Fungsional::whereIn('id', $request->ids)->delete();

        return redirect()->route('fungsional.index')
            ->with('message', 'Data terpilih berhasil dihapus');
    }



}
