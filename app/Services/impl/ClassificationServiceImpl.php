<?php

namespace App\Services\impl;

use App\DTO\ClassificationResponse;
use App\DTO\CTestResponse;
use App\Models\Dataset\Siswa;
use App\DTO\SiswaDTO;
use App\Mining\SiswaKNN;
use App\Models\NilaiK;
use App\Services\ClassificationService;
use Ramsey\Collection\Exception\ValueExtractionException;

class ClassificationServiceImpl implements ClassificationService
{
    private SiswaKNN $siswaKNN;

    public function __construct()
    {
        $this->siswaKNN = new SiswaKNN($this->getDataSet());
    }

    public function classification(SiswaDTO $siswaDto): ClassificationResponse
    {
        $k = NilaiK::first()->nilai ?? 20;
        return new ClassificationResponse($siswaDto, $this->siswaKNN->predict($siswaDto, $k));
    }

    public function testClassification(array $data, $k): CTestResponse
    {
        $cTestResponse = new CTestResponse('testing');
        $index = 0;
        for ($i = 0; $i < count($data[0]); $i++) {
            $siswaDto = SiswaDTO::builder()
                ->setNama($data[0][$i]['nama'])
                ->setAgama($data[0][$i]['agama'])
                ->setPkn($data[0][$i]['pkn'])
                ->setBhs_indo($data[0][$i]['bhs_indo'])
                ->setMatematika($data[0][$i]['matematika'])
                ->setIpa($data[0][$i]['ipa'])
                ->setIps($data[0][$i]['ips'])
                ->setBhs_inggris($data[0][$i]['bhs_inggris'])
                ->setSeni_budaya($data[0][$i]['seni_budaya'])
                ->setPenjas($data[0][$i]['penjas'])
                ->setPrakarya($data[0][$i]['prakarya'])
                ->setBhs_daerah($data[0][$i]['bhs_daerah'])
                ->build();
                $siswaDto->setJurusan($data[0][$i]['jurusan']);

            $this->siswaKNN->predict($siswaDto, $k);

            if ($siswaDto->getJurusan() === $siswaDto->getJurusanPredict()) {
                $cTestResponse->addCorrect($siswaDto);
            } else {
                $cTestResponse->addIncorrect($siswaDto);
            }
            $index++;
        }
        $cTestResponse->setTotalData($index);
        $cTestResponse->getAccuracy();

        return $cTestResponse;
    }

    private function getDataSet(): array
    {
        $dataset = [];

        foreach (Siswa::all() as $siswa) {
            try {
                $siswaDto = SiswaDTO::builder()
                    ->setNama($siswa->nama)
                    ->setAgama($siswa->agama)
                    ->setPkn($siswa->pkn)
                    ->setBhs_indo($siswa->bhs_indo)
                    ->setMatematika($siswa->matematika)
                    ->setIpa($siswa->ipa)
                    ->setIps($siswa->ips)
                    ->setBhs_inggris($siswa->bhs_inggris)
                    ->setSeni_budaya($siswa->seni_budaya)
                    ->setPenjas($siswa->penjas)
                    ->setPrakarya($siswa->prakarya)
                    ->setBhs_daerah($siswa->bhs_daerah)
                    ->build();
                $siswaDto->setJurusan($siswa->jurusan);
            } catch (ValueExtractionException $e) {
                // throw custom exception
            }

            $dataset[] = $siswaDto;
        }
        return $dataset;
    }
}
