<?php

namespace Tests\Feature;

use App\DTO\Jurusan;
use App\DTO\SiswaDTO;
use App\Mining\SiswaKNN;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertSame;

class SiswaKNNTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPredict()
    {
        $siswa = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa->setJurusan('AKL');

        $knn = new SiswaKNN($this->getDataSet());
        $knn->predict($siswa, 3);

        assertNotNull($siswa);
        assertNotNull($siswa->getJurusanPredict());
        assertSame($siswa->getJurusan(), $siswa->getJurusanPredict());

        // dd($siswa);
    }

    private function getDataSet() : array
    {

        $dataset = [];

        $siswa1 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa1->setJurusan('AKL');
        $siswa2 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa2->setJurusan('AKL');
        $siswa3 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa3->setJurusan('AKL');
        $siswa4 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa4->setJurusan('AKL');
        $siswa5 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa5->setJurusan('AKL');
        $siswa6 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa6->setJurusan('AKL');
        $siswa7 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa7->setJurusan('AKL');
        $siswa8 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa8->setJurusan('AKL');
        $siswa9 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa9->setJurusan('AKL');
        $siswa10 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->build();
        $siswa10->setJurusan('AKL');

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
