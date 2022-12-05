<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CTestResponse;
use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Services\ClassificationService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class TestingDataController extends Controller
{
    private ClassificationService $classificationService;

    public function __construct(ClassificationService $classificationService) {
        $this->classificationService = $classificationService;
    }

    public function testing(Request $request) {
        if(!file_exists(storage_path('app/public/data-testing/datatest.csv'))) {
            return 'file testing tidak ditemukan';
        }
        $datatest = Excel::toArray(new SiswaImport(), storage_path('app/public/data-testing/datatest.csv'));
        $response = $this->classificationService->testClassification($datatest, $request->nilaik);

        Session::put('CORRECT', $response->getCorrect());
        Session::put('INCORRECT', $response->getIncorrect());

        $testingResult = array();
        $testingResult[] = $response->getCorrect();
        $testingResult[] = $response->getIncorrect();

        return [
            'totalData' => $response->getTotalData(),
            'correct' => count($response->getCorrect()),
            'incorrect' => count($response->getIncorrect()),
            'accuracy' => $response->getAccuracy()
        ];
    }

    public function detailTesting() {
        return view('teacher.testing_result');
    }

    public function exportTestingResult() {
        $data = array();

        if(session()->has('CORRECT')) {
            foreach (session('CORRECT') as $dataCorrect) {
                $correct = [];
                $correct['nama'] =  $dataCorrect[array_keys($dataCorrect)[0]];  
                $correct['agama'] =  $dataCorrect[array_keys($dataCorrect)[1]];  
                $correct['pkn'] =  $dataCorrect[array_keys($dataCorrect)[2]];  
                $correct['bhs_indo'] =  $dataCorrect[array_keys($dataCorrect)[3]];  
                $correct['matematika'] =  $dataCorrect[array_keys($dataCorrect)[4]];  
                $correct['ipa'] =  $dataCorrect[array_keys($dataCorrect)[5]];  
                $correct['ips'] =  $dataCorrect[array_keys($dataCorrect)[6]];  
                $correct['bhs_inggris'] =  $dataCorrect[array_keys($dataCorrect)[7]];  
                $correct['seni_budaya'] =  $dataCorrect[array_keys($dataCorrect)[8]];  
                $correct['penjas'] =  $dataCorrect[array_keys($dataCorrect)[9]];  
                $correct['prakarya'] =  $dataCorrect[array_keys($dataCorrect)[10]];  
                $correct['bhs_daerah'] =  $dataCorrect[array_keys($dataCorrect)[11]];  
                $correct['jurusan'] =  $dataCorrect[array_keys($dataCorrect)[12]]->name;  
                $correct['prediksi'] =  $dataCorrect[array_keys($dataCorrect)[13]]->name;
                $data[] = $correct;
            }
        }
        if(session()->has('INCORRECT')) {
            foreach (session('INCORRECT') as $dataIncorrect) {
                $incorrect = [];
                $incorrect['nama'] =  $dataIncorrect[array_keys($dataIncorrect)[0]];  
                $incorrect['agama'] =  $dataIncorrect[array_keys($dataIncorrect)[1]];  
                $incorrect['pkn'] =  $dataIncorrect[array_keys($dataIncorrect)[2]];  
                $incorrect['bhs_indo'] =  $dataIncorrect[array_keys($dataIncorrect)[3]];  
                $incorrect['matematika'] =  $dataIncorrect[array_keys($dataIncorrect)[4]];  
                $incorrect['ipa'] =  $dataIncorrect[array_keys($dataIncorrect)[5]];  
                $incorrect['ips'] =  $dataIncorrect[array_keys($dataIncorrect)[6]];  
                $incorrect['bhs_inggris'] =  $dataIncorrect[array_keys($dataIncorrect)[7]];  
                $incorrect['seni_budaya'] =  $dataIncorrect[array_keys($dataIncorrect)[8]];  
                $incorrect['penjas'] =  $dataIncorrect[array_keys($dataIncorrect)[9]];  
                $incorrect['prakarya'] =  $dataIncorrect[array_keys($dataIncorrect)[10]];  
                $incorrect['bhs_daerah'] =  $dataIncorrect[array_keys($dataIncorrect)[11]];  
                $incorrect['jurusan'] =  $dataIncorrect[array_keys($dataIncorrect)[12]]->name;  
                $incorrect['prediksi'] =  $dataIncorrect[array_keys($dataIncorrect)[13]]->name;  
                $data[] = $incorrect;
            }
        }

        return Excel::download(new SiswaExport($data), 'hasil_prediksi.csv');
    }

    public function uploadCsvFile(Request $request) {
        $request->validate([
            'datatest' => 'required|mimes:csv'
        ]);
        try {
            Excel::toArray(new SiswaImport(), $request->datatest);
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'datatest' => 'Maaf format kolom dari file ini tidak sesuai dengan apa yang diharapkan. silahkan unduh template csv untuk bisa menyesuaikan!'
            ]);
        }
        $request->datatest->storePubliclyAs('data-testing', 'datatest.csv', 'public');

        $expired_at = Carbon::now()->addHour();
        
        DB::table('expired_datatest')->truncate();
        DB::table('expired_datatest')->insert(['expired_at' => $expired_at]);

        return back();
    }

    public function deleteTesting() {
        $file = storage_path('app/public/data-testing/datatest.csv');
        if(is_file($file)) {
            Storage::disk('public')->delete('data-testing/datatest.csv');
        }
        return back();
    }
}
