<?php

namespace App\Http\Controllers;

use App\Models\Dataset\Siswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'pspr' => count(Siswa::where('jurusan', 'PSPR')->get()),
            'pspt' => count(Siswa::where('jurusan', 'PSPT')->get()),
            'tkj' => count(Siswa::where('jurusan', 'TKJ')->get()),
            'rpl' => count(Siswa::where('jurusan', 'RPL')->get()),
            'mm' => count(Siswa::where('jurusan', 'MM')->get()),
            'upw' => count(Siswa::where('jurusan', 'UPW')->get()),
            'akl' => count(Siswa::where('jurusan', 'AKL')->get()),
            'otkp' => count(Siswa::where('jurusan', 'OTKP')->get()),
            'bdp' => count(Siswa::where('jurusan', 'BDP')->get()),
            'apl' => count(Siswa::where('jurusan', 'APL')->get()),
            'count' => count(Siswa::all())
        ]);
    }
}
