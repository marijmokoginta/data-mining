<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NilaiK;
use Illuminate\Http\Request;

class NilaiKController extends Controller
{
    public function update($nilai) {
        $nilaiK = NilaiK::first() ?? new NilaiK();
        $nilaiK->nilai = $nilai;
        return $nilaiK->save();
    }
}
