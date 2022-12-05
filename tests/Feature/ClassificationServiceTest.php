<?php

namespace Tests\Feature;

use App\DTO\SiswaDTO;
use App\Imports\SiswaImport;
use App\Models\Dataset\Siswa;
use App\Services\ClassificationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;

class ClassificationServiceTest extends TestCase
{
    public function testClassification() {
        $classificationService = $this->app->make(ClassificationService::class);
        assertNotNull($classificationService);

        $siswa1 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa1->setJurusan('AKL');
        assertNotNull($classificationService->classification($siswa1)->getSiswa()->getJurusanPredict());
        dump($classificationService->classification($siswa1)->getSiswa()->getJurusanPredict());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testClassificationTest()
    {
        $classificationService = $this->app->make(ClassificationService::class);

        assertNotNull($classificationService);

        $datatest = Excel::toArray(new SiswaImport(), storage_path('app/public/data-testing/datatest.csv'));
        dd($datatest);
        $response = $classificationService->testClassification($datatest, 20);
        dd($response);
    }
    
}
