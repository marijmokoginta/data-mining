@extends('layouts.app')

@section('hero')

<section id="hero" class="d-flex align-items-center min-vh-100">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>Cari Tau Minat Dan Bakat Anda</h1>
                <h2>Anda seorang lulusan SMP/MTs? Silahkan cari tau minat dan bakat anda, untuk mengetahui
                    penjurusan yang tepat di SMK N 1 Gorontalo</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="{{ route('prediksi-penjurusan') }}" class="btn-get-started">Cari Tau</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section>

@endsection