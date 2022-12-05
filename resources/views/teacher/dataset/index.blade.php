@extends('teacher.layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Dataset</h5>
        <div class="d-flex mb-4">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah baru</button>
            <button class="me-auto ms-2 btn btn-success" data-bs-toggle="modal" data-bs-target="#importCsv">Upload
                csv</button>
        </div>

        @if(session()->has('UPLOAD_SUCCESS'))
        <div class="alert alert-success" role="alert">
            {{ session('UPLOAD_SUCCESS') }}
        </div>
        @endif

        @error('csvDataset')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <table class="table table-borderless datatable mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Pkn</th>
                    <th scope="col">BIndo</th>
                    <th scope="col">Mtk</th>
                    <th scope="col">IPA</th>
                    <th scope="col">IPS</th>
                    <th scope="col">BIngg</th>
                    <th scope="col">SenBud</th>
                    <th scope="col">Penjas</th>
                    <th scope="col">Prakarya</th>
                    <th scope="col">Mulok</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataset as $siswa)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($siswa->nama, 6) }}</td>
                    <td class="text-center">{{ $siswa->agama }}</td>
                    <td class="text-center">{{ $siswa->pkn }}</td>
                    <td class="text-center">{{ $siswa->bhs_indo }}</td>
                    <td class="text-center">{{ $siswa->matematika }}</td>
                    <td class="text-center">{{ $siswa->ipa }}</td>
                    <td class="text-center">{{ $siswa->ips }}</td>
                    <td class="text-center">{{ $siswa->bhs_inggris }}</td>
                    <td class="text-center">{{ $siswa->seni_budaya }}</td>
                    <td class="text-center">{{ $siswa->penjas }}</td>
                    <td class="text-center">{{ $siswa->prakarya }}</td>
                    <td class="text-center">{{ $siswa->bhs_daerah }}</td>
                    <td class="text-center">{{ $siswa->jurusan }}</td>
                    <td class="text-center">
                        <a href="#" id="btnHapus" title="hapus" data-bs-toggle="modal" data-bs-target="#hapusData"
                            data-siswa-nama="{{ $siswa->nama }}" data-siswa-id="{{ $siswa->id }}"><i
                                class="bi bi-trash color-danger"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tambah_data') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="nama">Nama <span class="color-danger">*</span></label>
                        <input name="nama" type="text" class="form-control" placeholder="masukkan nama">
                        @error('nama')
                        <div class="color-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama">Agama <span class="color-danger">*</span></label>
                            <input name="agama" type="number" step="any" placeholder="nilai agama" value="0.0"
                                class="form-control">
                            @error('agama')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="nama">Pkn <span class="color-danger">*</span></label>
                            <input name="pkn" type="number" step="any" placeholder="nilai pkn" value="0.0"
                                class="form-control">
                            @error('pkn')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama">Bhs Indo <span class="color-danger">*</span></label>
                            <input name="bhs_indo" type="number" step="any" placeholder="nilai bhs indo" value="0.0"
                                class="form-control">
                            @error('bhs_indo')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="nama">Matematika <span class="color-danger">*</span></label>
                            <input name="matematika" type="number" step="any" placeholder="nilai matematika" value="0.0"
                                class="form-control">
                            @error('matematika')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama">IPA <span class="color-danger">*</span></label>
                            <input name="ipa" type="number" step="any" placeholder="nilai IPA" value="0.0"
                                class="form-control">
                            @error('ipa')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="nama">IPS <span class="color-danger">*</span></label>
                            <input name="ips" type="number" step="any" placeholder="nilai IPS" value="0.0"
                                class="form-control">
                            @error('ips')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama">Bhs Inggris <span class="color-danger">*</span></label>
                            <input name="bhs_inggris" type="number" step="any" placeholder="nilai bhs inggris"
                                value="0.0" class="form-control">
                            @error('bhs_inggris')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="nama">Seni Budaya <span class="color-danger">*</span></label>
                            <input name="seni_budaya" type="number" step="any" placeholder="nilai seni budaya"
                                value="0.0" class="form-control">
                            @error('seni_budaya')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama">Penjas <span class="color-danger">*</span></label>
                            <input name="penjas" type="number" step="any" placeholder="nilai penjas" value="0.0"
                                class="form-control">
                            @error('penjas')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="nama">Prakarya <span class="color-danger">*</span></label>
                            <input name="prakarya" type="number" step="any" placeholder="nilai prakarya" value="0.0"
                                class="form-control">
                            @error('prakarya')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nama">Bhs Daerah <span class="color-danger">*</span></label>
                            <input name="bhs_daerah" type="number" step="any" placeholder="nilai bhs daerah" value="0.0"
                                class="form-control">
                            @error('bhs_daerah')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="nama">Jurusan<span class="color-danger">*</span></label>
                            <select name="jurusan" value="0.0" class="form-select">
                                <option value="" selected disabled>Pilih jurusan</option>
                                <option value="PSPR">PSPR</option>
                                <option value="PSPT">PSPT</option>
                                <option value="TKJ">TKJ</option>
                                <option value="RPL">RPL</option>
                                <option value="MM">MM</option>
                                <option value="UPW">UPW</option>
                                <option value="AKL">AKL</option>
                                <option value="OTKP">OTKP</option>
                                <option value="BDP">BDP</option>
                                <option value="APL">APL</option>
                            </select>
                            @error('jurusan')
                            <div class="color-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusData" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus data siswa '<span id="namaSiswa" class="namaSiswa"></span>' ?
                <input type="hidden" id="siswaId" class="siswaId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" id="konfirHapus">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="statusInfo" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" id="statusTitle"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="statusMessage"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="importCsv" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload CSV</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('import_csv') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <small>Untuk menambahkan data melalui csv file, harus sesuai dengan format yang sudah ditentukan.
                        Silahkan unduh terlebih dahulu template csv agar bisa menyesuaikan. <a href="{{ route('template_csv') }}">Unduh template
                            csv.</a> Jika sudah, silahkan untuk di upload.</small>
                    @csrf
                    <input type="file" id="csvDataset" name="csvDataset" hidden required>
                    <label for="csvDataset"
                        class="bg-light rounded d-flex flex-column align-items-center justify-content-center mt-2"
                        style="height: 100px; border: dashed 3px #cbcbcb; cursor: pointer;">
                        <div class="d-flex">
                            <i class="bi bi-folder-fill me-3"></i>
                            <small>Upload file csv</small>
                        </div>
                        <span id="file-choosen"></span>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="btnUploadCsv">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>

    $(document).on('click', '#btnHapus', function() {
        $('#namaSiswa').text($(this).data('siswa-nama'))
        $('#siswaId').val($(this).data('siswa-id'))
    })

    $(document).on('click', '#konfirHapus', function() {
        let id = $('#siswaId').val()
        $.ajax({
            url : '/home/dataset/' + id,
            type : 'DELETE',
            data : {
                '_token' : '{{ csrf_token() }}',
            }, error : function(err) {
                $('#hapusData').modal('toggle')
                $('#statusTitle').text('Gagal')
                $('#statusMessage').text('Data gagal di hapus!')
                $('#statusInfo').modal('toggle')
            }, success : function (res) {
                $('#hapusData').modal('toggle')
                $('#statusTitle').text('Berhasil')
                $('#statusMessage').text('Data berhasil di hapus!')
                $('#statusInfo').modal('toggle')
            }
        })
    })

    $(document).on('change', '#csvDataset', function() {
        $('#file-choosen').text($(this).prop('files')[0].name)
    })

</script>

@endsection