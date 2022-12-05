<div class="p-3 rounded-3">
    <div class="d-flex justify-content-between">
        <h5>Hasil Testing</h5>
        <button type="button" class="btn shadow-none border-0" id="btnCloseResult">Tutup <i class="bi bi-x-circle-fill"></i></button>
    </div>
    <table class="table table-borderless datatable mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Agama</th>
                <th scope="col">PKN</th>
                <th scope="col">BIndo</th>
                <th scope="col">Mtk</th>
                <th scope="col">IPA</th>
                <th scope="col">IPS</th>
                <th scope="col">BIng</th>
                <th scope="col">SenBud</th>
                <th scope="col">Penjas</th>
                <th scope="col">Prakarya</th>
                <th scope="col">Mulok</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Prediksi</th>
            </tr>
        </thead>
        <tbody>
            @if(session()->has('INCORRECT'))
            @foreach(session('INCORRECT') as $testIncorrect)
            <tr class="bg-danger-light border border-2">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[1]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[2]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[3]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[4]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[5]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[6]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[7]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[8]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[9]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[10]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[11]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[12]] }}</td>
                <td>{{ $testIncorrect[array_keys($testIncorrect)[13]] }}</td>
            </tr>
            @endforeach
            @endif
            @if(session()->has('CORRECT'))
            @foreach(session('CORRECT') as $testCorrect)
            <tr class="bg-success-light border border-2">
                <td>{{ count(session('INCORRECT')) + $loop->iteration }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[1]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[2]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[3]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[4]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[5]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[6]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[7]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[8]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[9]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[10]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[11]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[12]] }}</td>
                <td>{{ $testCorrect[array_keys($testCorrect)[13]] }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <form action="{{ route('export_hasil') }}" method="POST">
        @csrf
        <button class="btn btn-primary mt-3" type="submit">Export Data</button>
    </form>
</div>