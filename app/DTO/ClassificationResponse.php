<?php 

namespace App\DTO;

class ClassificationResponse {

    private SiswaDTO $siswaDto;
    private array $classificationResult;

    public function __construct(SiswaDTO $siswaDto, array $classificationResult) {
        $this->siswaDto = $siswaDto;
        $this->classificationResult = $classificationResult;
    }

    public function getSiswa() {
        return $this->siswaDto;
    }

    public function getClassificationResult() {
        return $this->classificationResult;
    }

}