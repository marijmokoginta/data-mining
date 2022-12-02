<?php

namespace App\Http\Controllers;

use App\DTO\SiswaDTO;
use App\Services\ClassificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SiswaController extends Controller
{
    private ClassificationService $classificationService;

    public function __construct(ClassificationService $classificationService) {
        $this->classificationService = $classificationService;
    }
    
    public function jurusan() {
        return view('student.jurusan');
    }

    public function prediksi() {
        return view('student.prediksi', [
            'hasil' => false
        ]);
    }

    public function hasil(Request $request) {
        $nilai = $request->validate([
            'agama' => 'required',
            'pkn' => 'required',
            'bindo' => 'required',
            'mtk' => 'required',
            'ipa' => 'required',
            'ips' => 'required',
            'binggris' => 'required',
            'senbud' => 'required',
            'penjas' => 'required',
            'prakarya' => 'required',
            'bdaerah' => 'required'
        ]);

        $siswa = SiswaDTO::builder()->setNama('Siswa')->setAgama($nilai['agama'])->setPkn($nilai['pkn'])->setBhs_indo($nilai['bindo'])->setMatematika($nilai['mtk'])->setIpa($nilai['ipa'])->setIps($nilai['ips'])->setBhs_inggris($nilai['binggris'])->setSeni_budaya($nilai['senbud'])->setPenjas($nilai['penjas'])->setPrakarya($nilai['prakarya'])->setBhs_daerah($nilai['bdaerah'])->build();

        $response = $this->classificationService->classification($siswa);

        return Redirect::to(URL::previous() . '#hasil')->with('HASIL', $response);
    }

}
