<?php

namespace App\Services\impl;

use App\DTO\ClassificationResponse;
use App\DTO\CTestResponse;
use App\Models\Dataset\Siswa;
use App\DTO\SiswaDTO;
use App\Mining\SiswaKNN;
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
        return new ClassificationResponse($siswaDto, $this->siswaKNN->predict($siswaDto, 20));
    }

    public function testClassification(array $datatest, $k): CTestResponse
    {
        $cTestResponse = new CTestResponse();
        foreach ($datatest as $data) {
            $this->siswaKNN->predict($data, $k);

            if ($data->getJurusan() === $data->getJurusanPredict()) {
                $cTestResponse->addCorrect($data);
            } else {
                $cTestResponse->addIncorrect($data);
            }
        }

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
