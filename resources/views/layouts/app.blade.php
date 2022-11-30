<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ env('APP_NAME') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/welcome.css" rel="stylesheet">

</head>

<body>

    <header id="header" class="fixed-top @yield('bg-header')">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ route('welcome') }}">{{ env('APP_NAME') }}</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li class="dropdown me-4"><a href="{{ route('jurusan') }}"><span>Jurusan</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/jurusan#pspr">Produksi dan Siaran Program Radio</a></li>
                            <li class="#"><a href="/jurusan#pspt">Produksi dan Siaran Program Televisi</a></li>
                            <li><a href="/jurusan#tkj">Teknik Komputer Jaringan</a></li>
                            <li><a href="/jurusan#rpl">Rekayasa Perangkat Lunak</a></li>
                            <li><a href="/jurusan#mm">Multimedia</a></li>
                            <li><a href="/jurusan#upw">Usaha Perjalanan Wisata</a></li>
                            <li><a href="/jurusan#akl">Akuntansi dan Keuangan Lembaga</a></li>
                            <li><a href="/jurusan#otkp">Otomatisasi dan Tata Kelola Perkantoran</a></li>
                            <li><a href="/jurusan#bdp">Bisnis Daring Pemasaran</a></li>
                            <li><a href="/jurusan#apl">Analisis Pengujian Laboratorium</a></li>
                        </ul>
                    </li>
                    <li><a class="getstarted" href="{{ route('login') }}">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    @yield('hero')

    <main id="main">
        @yield('content')
    </main>

    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="assets/js/welcome.js"></script>

</body>

</html>