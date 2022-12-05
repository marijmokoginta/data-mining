<div class="row">
    <div class="col-12">
        <div class="card rounded-4" style="min-height: 40vh">
            <div class="card-body">
                <h5 class="card-title">Halo &#128075;, Selamat datang kembali!</h5>
                <h2 class="fw-bold fs-1">Prediksi Penjurusan SMK N 1 Gorontalo</h2>
                <div id="datailTesting"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card rounded-4" style="min-height: 40vh">
            <div class="card-body">
                <h5 class="card-title">Dataset</h5>
                <div class="d-flex">
                    <div class="col-md-7">
                        <div id="dataset" style="min-height: 29vh" class="echart"></div>
                    </div>
                    <div class="col-md-5 d-flex flex-column align-items-center justify-content-around">
                        <h5 class="text-center">Total data : <span id="counter"></span></h5>
                        <div class="text-center">
                            <a href="{{ route('dataset') }}" class="btn btn-outline-primary mb-2" style="width: 90%">Jelajahi</a>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#kosongkanModal" style="width: 90%">Kosongkan dataset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card rounded-4" style="min-height: 40vh">
            <div class="card-body">
                <h5 class="card-title">Testing</h5>
                <div class="d-flex">
                    <div class="col-md-6">
                        <small>Untuk melakukan pengujian silahkan upload file csv yang berisi data pengujian. <a href="{{ route('template_csv') }}">Unduh template csv</a></small>
                        @error('datatest')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        @if($datatest)
                        <div id="timerHapus">
                            <div class="color-bg-light rounded-2 mt-2 d-flex flex-column align-items-center justify-content-center p-2" style="height: 100px">
                                <strong class="text-center" id="infoTitle">File testing akan terhapus secara otomatis dalam :</strong>
                                <h5 id="timer"></h5>
                            </div>
                            <form action="{{ route('hapus_datatest') }}" method="POST">
                                @csrf
                                <button type="submit"class="btn btn-sm btn-outline-warning mt-2" style="width: 100%">Hapus dan upload baru</button>
                            </form>
                        </div>
                        @endif
                        <form action="{{ route('upload_testing') }}" method="POST" enctype="multipart/form-data" class="@if($datatest) collapse @endif" id="formDatatest">
                            @csrf
                            <input type="file" id="csv_template" name="datatest" hidden>
                            <label for="csv_template" class="bg-light rounded d-flex flex-column align-items-center justify-content-center mt-2"
                                style="height: 100px; border: dashed 3px #cbcbcb; cursor: pointer;">
                                <div class="d-flex">
                                    <i class="bi bi-folder-fill me-3"></i>
                                    <small>Upload file csv</small>
                                </div>
                                <span id="file-choosen"></span>
                            </label>
                            <button class="btn btn-sm btn-outline-primary mt-2" type="submit" style="width: 100%">Upload</button>
                        </form>
                    </div>
                    <div class="col-md-6 d-flex flex-column ps-5">
                        <div class="input-group nilai-k mb-3">
                            <label for="nilaik">K :</label>
                            <input type="number" id="nilaik" class="rounded-3 color-bg-light border-0 ms-2 px-3" placeholder="nilai k" style="width: 80%">
                            <div id="simpanK" class="collapse mt-2" style="width: 90%">
                                <button class="btn btn-sm btn-success-light rounded-3" id="simpanNilaiK" style="width: 100%">Simpan Nlai K</button>
                            </div>
                        </div>
                        <button id="btnTesting" class="btn btn-success mb-2 @if(!$datatest) disabled @endif" style="width: 90%">Lakukan pengujian</button>
                        <div id="hasil" class="row">
                            <h6 class="col-4">Jumlah</h6><h6 class="col-8" id="jumlahTesting">: 0</h6>
                            <h6 class="col-4">Benar</h6><h6 class="col-8" id="correctTesting">: 0</h6>
                            <h6 class="col-4">Salah</h6><h6 class="col-8" id="incorrectTesting">: 0</h6>
                            <h6 class="col-4">Akurasi</h6><h6 class="col-8" id="accuracyTesting">: 0%</h6>
                            <a href="#" class="mt-2 color-primary" id="btnDetailTesting">Lihat detail ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kosongkanModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Kosongkan dataset</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda yakin ingin mengosongkan dataset?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="{{ route('kosongkan_dataset') }}"class="btn btn-danger">Ya, Kosongkan</a>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    var counts = setInterval(totalCounter)
    var end = {{ $count }}
    var start = 0
    function totalCounter() {
        $('#counter').text(start)
        if(start == end) {
            clearInterval(counts)
        }
        start++
    }

    $(document).on('click', '#simpanNilaiK', function() {
        var nilaik = $('#nilaik').val()
        var simpanK = $('#simpanK')
        $.ajax({
            url : '/home/nilaik/' + nilaik,
            type : 'POST',
            data : {
                '_token' : '{{ csrf_token() }}',
            }, error : function (err) {
                var html = "<div class='alert alert-danger' id='alertK' role='alert'><i class='bi bi-x-circle-fill'></i> Gagal.</div>"
                simpanK.html(html)
            }, success : function (res) {
                var html = "<div class='alert alert-success' id='alertK' role='alert'><i class='bi bi-check2-all'></i> Berhasil.</div>"
                simpanK.html(html)
            }
        })
        setTimeout(() => {
            var html = "<button class='btn btn-sm btn-success-light rounded-3' id='simpanNilaiK' style='width: 100%''>Simpan Nlai K</button>"

            simpanK.addClass('collapse')
            simpanK.html(html)
        }, 2000)
    })

    @if($datatest)
    $(document).on('click', '#btnTesting', function() {
        var nilaik = $('#nilaik').val()
        var jumlah = $('#jumlahTesting')
        var correct = $('#correctTesting')
        var incorrect = $('#incorrectTesting')
        var accuracy = $('#accuracyTesting')

        accuracy.removeClass('text-danger text-success text-warning text-primary')

        jumlah.text(': loading')
        correct.text(': loading')
        incorrect.text(': loading')
        accuracy.text(': loading')
        $.ajax({
            url : "{{ route('testing_data') }}",
            type : 'POST',
            data : {
                '_token' : '{{ csrf_token() }}', 
                'nilaik' : nilaik
            }, dataType : 'json',
            error : function (err) {
                jumlah.text(': error')
                correct.text(': error')
                incorrect.text(': error')
                accuracy.text(': error')
            }, success : function (res) {
                jumlah.text(': ' + res.totalData)
                correct.text(': ' + res.correct)
                incorrect.text(': ' + res.incorrect)
                accuracy.text(': ' + res.accuracy + '%')

                $('#simpanK').removeClass('collapse')

                if(res.accuracy > 90) {
                    accuracy.addClass('text-success')
                } else if(res.accuracy > 70) {
                    accuracy.addClass('text-primary')
                } else if(res.accuracy > 50) {
                    accuracy.addClass('text-warning')
                } else {
                    accuracy.addClass('text-danger')
                }
                console.log(res)
            }
        })
    })

    $(document).on('click', '#btnDetailTesting', function() {
        $.ajax({
            url : "{{ route('detail_testing')}}",
            type : 'GET',
            data : {

            },
            error : function (err) {
                console.log(err)
            }, success : function (res) {
                $('#datailTesting').html(res)
            }
        })
    })
    @endif

    $(document).on('change', '#csv_template', function() {
        $('#file-choosen').text($(this).prop('files')[0].name)
    })

    var dp = $('#timer')
    var dur = {{ $expired_at }}
    startTimer(dur, dp)

    function startTimer(duration, display) {
        var timer = duration, hours, minutes, seconds
        var interval = setInterval(function () {
            hours = parseInt(timer / 3600, 10)
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10)
            
            hours = hours < 10 ? "0" + hours : hours
            minutes = minutes < 10 ? "0" + minutes : minutes
            seconds=seconds < 10 ? "0" + seconds : seconds
            
            display.text(hours + ":" + minutes + ":" + seconds) 
            timer--;

            if(timer <= 10) {
                display.toggleClass('color-danger')
            }

            if(timer < 0) {
                clearInterval(interval)
                setTimeout(() => {
                    deleteFileTesting()
                }, 2000);
            }
        }, 1000)
    }

    function deleteFileTesting() {
        $.ajax({
            url : "{{ route('hapus_datatest') }}",
            type : 'POST',
            data : {
                '_token' : '{{ csrf_token() }}'
            }, error : function (err) {
                $('#infoTitle').text('')
                dp.text('Gagal menghapus')
            }, success : function (res) {
                $('#timerHapus').addClass('collapse')
                $('#formDatatest').removeClass('collapse')
            }
        })
    }

    document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector(".echart")).setOption({
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '100%',
                left: 'center'
            },
            series: [{
                name: 'Jurusan',
                type: 'pie',
                radius: ['35%', '65%'],
                avoidLabelOverlap: false,
                label: {
                    show: true,
                    position: 'left',
                    fontSize: '10'
                },
                emphasis: {
                    label: {
                        show: false,
                        fontSize: '14',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [
                    {
                        value: {{ $pspr }},
                        name: 'PSPR'
                    },
                    {
                        value: {{ $pspt }},
                        name: 'PSPT'
                    },
                    {
                        value: {{ $tkj }},
                        name: 'TKJ'
                    },
                    {
                        value: {{ $rpl }},
                        name: 'RPL'
                    },
                    {
                        value: {{ $mm }},
                        name: 'MM'
                    },
                    {
                        value: {{ $upw }},
                        name: 'UPW'
                    },
                    {
                        value: {{ $akl }},
                        name: 'AKL'
                    },
                    {
                        value: {{ $otkp }},
                        name: 'OTKP'
                    },
                    {
                        value: {{ $bdp }},
                        name: 'BDP'
                    },
                    {
                        value: {{ $apl }},
                        name: 'APL'
                    }
                ]
            }]
        });
    });
</script>
@endsection