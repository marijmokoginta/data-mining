<div class="row">
    <div class="col-12">
        <div class="card rounded-4" style="min-height: 40vh">
            <div class="card-body">
                <h5 class="card-title">Halo &#128075;, Selamat datang kembali!</h5>
                <h2 class="fw-bold fs-1">Prediksi Penjurusan di SMK N 1 Gorontalo</h2>
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
                        <h5 class="text-center">Total data : {{ $count }}</h5>
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
                        <input type="file" id="csv_template" name="csv_template" hidden>
                        <label for="csv_template" class="bg-light rounded d-flex flex-column align-items-center justify-content-center mt-2"
                            style="height: 100px; border: dashed 3px #cbcbcb; cursor: pointer;">
                            <div class="d-flex">
                                <i class="bi bi-folder-fill me-3"></i>
                                <small>Upload file csv</small>
                            </div>
                            <span id="file-choosen"></span>
                        </label>
                        <button class="btn btn-sm btn-outline-primary mt-2" style="width: 100%">Upload</button>
                    </div>
                    <div class="col-md-6 d-flex flex-column ps-5">
                        <div class="input-group nilai-k mb-3">
                            <label for="nilaik">K :</label>
                            <input type="text" id="nilaik" class="rounded-3 color-bg-light border-0 ms-2 px-3" placeholder="nilai k" style="width: 50%">
                        </div>
                        <button class="btn btn-success mb-2" style="width: 90%">Lakukan pengujian</button>
                        <div id="hasil" class="row">
                            <h6 class="col-4">Jumlah</h6><h6 class="col-8">: 0</h6>
                            <h6 class="col-4">Benar</h6><h6 class="col-8">: 0</h6>
                            <h6 class="col-4">Salah</h6><h6 class="col-8">: 0</h6>
                            <h6 class="col-4">Akurasi</h6><h6 class="col-8">: 0%</h6>
                            <a href="#" class="mt-2 color-primary">Lihat detail ></a>
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