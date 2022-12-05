<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CTestResponse;
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
