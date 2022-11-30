@extends('layouts.app')

@section('bg-header') color-bg-green @endsection

@section('content')

<section id="prediksi" class="nilai-form">
    <div class="container" data-aos="fade-up">
        <div class="d-flex flex-column pt-5">
            <div class="mx-auto text-center mb-3">
                <h2 class="page-title">Prediksi Penjurusan</h2>
                <p>Silahkan isi data nilai di bawah ini.</p>
            </div>

            <form action="{{ route('hasil') }}" class="form-prediksi" method="POST" role="form">
                @csrf
                <h5>Kelompok A</h5>
                <div class="row mb-5">
                    <div class="col-md-3 p-2">
                        <label for="agama">Agama</label>
                        <input type="number" id="agama" step="any" class="form-control" placeholder="masukkan nilai agama" value="0.0" name="agama">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="pkn">Pendidikan Kewargenegaraan</label>
                        <input type="number" id="pkn" step="any" class="form-control" placeholder="masukkan nilai pkn" value="0.0" name="pkn">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="bindo">Bahasa Indonesia</label>
                        <input type="number" id="bindo" step="any" class="form-control" placeholder="masukkan nilai b indo" value="0.0" name="bindo">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="mtk">Matematika</label>
                        <input type="number" id="mtk" step="any" class="form-control" placeholder="masukkan nilai matematika" value="0.0" name="mtk">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="ipa">IPA</label>
                        <input type="number" id="ipa" step="any" class="form-control" placeholder="masukkan nilai ipa" value="0.0" name="ipa">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="ips">IPS</label>
                        <input type="number" id="ips" step="any" class="form-control" placeholder="masukkan nilai ips" value="0.0" name="ips">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="binggris">Bahasa Inggris</label>
                        <input type="number" id="binggris" step="any" class="form-control" placeholder="masukkan nilai b inggris" value="0.0" name="binggris">
                    </div>
                </div>
                <h5>Kelompok B</h5>
                <div class="row">
                    <div class="col-md-3 p-2">
                        <label for="senbud">Seni Budaya</label>
                        <input type="number" id="senbud" step="any" class="form-control" placeholder="masukkan nilai seni budaya" value="0.0" name="senbud">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="penjas">Penjas</label>
                        <input type="number" id="penjas" step="any" class="form-control" placeholder="masukkan nilai penjas" value="0.0" name="penjas">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="prakarya">Prakarya</label>
                        <input type="number" id="prakarya" step="any" class="form-control" placeholder="masukkan nilai prakarya" value="0.0" name="prakarya">
                    </div>
                    <div class="col-md-3 p-2">
                        <label for="bdaerah">Bahasa Daerah</label>
                        <input type="number" id="bdaerah" step="any" class="form-control" placeholder="masukkan nilai b daerah" value="0.0" name="bdaerah">
                    </div>
                </div>
                <div class="row mt-4">
                    <button class="btn rounded-pill mx-auto" type="submit">Lihat Hasil</button>
                </div>
            </form>
        </div>
    </div>
</section>


@if(session()->has('hasil'))
<section id="hasil" class="skills section-bg">
    <div class="container" data-aos="fade-up">
        <div class="d-flex flex-column pt-5">
            <div class="mx-auto text-center mb-3">
                <h2 class="page-title">Hasil</h2>
            </div>
            <div class="content">
                <div class="skills-content">
                @foreach(session('hasil') as $key => $hasil)
                    <div class="progress">
                        <span class="skill @if($hasil >= 90) color-green @elseif($hasil >= 70) color-blue @elseif($hasil < 70) color-red @endif">{{ $key }} <i class="val">{{ $hasil . '%' }}</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar @if($hasil >= 90) color-bg-green @elseif($hasil >= 70) color-bg-blue @elseif($hasil < 70) color-bg-red @endif" role="progressbar" aria-valuenow="{{ $hasil }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection