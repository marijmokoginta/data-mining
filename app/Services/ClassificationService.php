<?php 

namespace App\Services;

use App\DTO\ClassificationResponse;
use App\DTO\CTestResponse;
use App\DTO\SiswaDTO;

interface ClassificationService {

    function classification(SiswaDTO $siswaDTO) : ClassificationResponse;

    function testClassification(array $dataset, $k) : CTestResponse;

}