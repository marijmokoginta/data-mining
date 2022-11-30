<?php

namespace Tests\Feature;

use App\DTO\SiswaDTO;
use App\Services\ClassificationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;

class ClassificationServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testClassificationTest()
    {
        $classificationService = $this->app->make(ClassificationService::class);

        assertNotNull($classificationService);

        $classificationService->testClassification($this->getDataSet(), 20);
    }

    private function getDataSet(): array
    {

        $dataset = [];

        $siswa1 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa2 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa3 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa4 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa5 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa6 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa7 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa8 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa9 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();
        $siswa10 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('AKL')->build();

        $dataset[] = $siswa1;
        $dataset[] = $siswa2;
        $dataset[] = $siswa3;
        $dataset[] = $siswa4;
        $dataset[] = $siswa5;
        $dataset[] = $siswa6;
        $dataset[] = $siswa7;
        $dataset[] = $siswa8;
        $dataset[] = $siswa9;
        $dataset[] = $siswa10;

        return $dataset;
    }
}
