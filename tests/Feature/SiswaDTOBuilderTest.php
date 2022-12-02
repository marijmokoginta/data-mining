<?php

namespace Tests\Feature;

use App\DTO\Jurusan;
use App\DTO\SiswaDTO;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;

class SiswaDTOBuilderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $siswa = SiswaDTO::builder()
            ->setNama("Jokowi")
            ->setAgama(90)
            ->setPkn(90)
            ->setBhs_indo(90)
            ->setMatematika(90)
            ->setIpa(90)
            ->setIps(90)
            ->setBhs_inggris(90)
            ->setBhs_inggris(90)
            ->setSeni_budaya(90)
            ->setPenjas(90)
            ->setPrakarya(90)
            ->setBhs_daerah(90)
            ->build();

        assertNotNull($siswa);

        // dd($siswa);
    }
}
