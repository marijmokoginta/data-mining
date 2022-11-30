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
        $siswa = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();

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

        $siswa1 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa2 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa3 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa4 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa5 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa6 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa7 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa8 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa9 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();
        $siswa10 = SiswaDTO::builder()->setNama("Jokowi")->setAgama(90)->setPkn(90)->setBhs_indo(90)->setMatematika(90)->setIpa(90)->setIps(90)->setBhs_inggris(90)->setBhs_inggris(90)->setSeni_budaya(90)->setPenjas(90)->setPrakarya(90)->setBhs_daerah(90)->setJurusan('TKJ')->build();

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
