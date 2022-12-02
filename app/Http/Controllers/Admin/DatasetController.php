<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Dataset\Siswa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DatasetController extends Controller
{
    
    public function index() {
        return view('teacher.dataset.index', [
            'dataset' => Siswa::all()
        ]);
    }

    public function addData(Request $request) {
        $dataSiswa = $request->validate([
            'nama' => 'required',
            'agama' => 'required',
            'pkn' => 'required',
            'bhs_indo' => 'required',
            'matematika' => 'required',
            'ipa' => 'required',
            'ips' => 'required',
            'bhs_inggris' => 'required',
            'seni_budaya' => 'required',
            'penjas' => 'required',
            'prakarya' => 'required',
            'bhs_daerah' => 'required',
            'jurusan' => 'required',
        ]);

        Siswa::create($dataSiswa);

        return back();
    }

    public function deleteOne(Siswa $siswa) {
        return $siswa->delete();
    }

    public function importFromCsv(Request $request) {
        $request->validate([
            'csvDataset' => 'required|mimes:csv'
        ]);

        try {
            Excel::import(new SiswaImport(), $request->csvDataset);
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'csvDataset' => 'Maaf format kolom dari file ini tidak sesuai dengan apa yang diharapkan. silahkan unduh template csv untuk bisa menyesuaikan!'
            ]);
        }
        return back()->with('UPLOAD_SUCCESS', 'Data berhasil di simpan!');
    }

    public function truncateDataset() {
        Siswa::query()->truncate();
        return back();
    }

    public function templateCsv() : BinaryFileResponse {
        return response()->download(storage_path('app/public/template/dataset.csv'));
    }

}
