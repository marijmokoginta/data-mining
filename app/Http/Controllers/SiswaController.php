<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SiswaController extends Controller
{
    
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

        $jurusan = [
            'pspr' => 0,
            'pspt' => 0,
            'tkj' => 90,
            'rpl' => 70,
            'mm' => 40,
            'upw' => 20,
            'akl' => 0,
            'otkp' => 0,
            'bdp' => 0,
            'apl' => 0
        ];

        return Redirect::to(URL::previous() . '#hasil')->with('hasil', $jurusan);
    }

}
