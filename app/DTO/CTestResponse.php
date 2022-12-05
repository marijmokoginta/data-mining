<?php

namespace App\DTO;


class CTestResponse
{

    private $totalData = 0;
    private $correct = [];
    private $incorrect = [];
    private $accuracy;
    private string $message;

    public function __construct(string $message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getCorrect() {
        return $this->correct;
    }

    public function addCorrect(SiswaDTO $siswaDto) {
        $this->correct[] = (array) $siswaDto;
    }

    public function getIncorrect() {
        return $this->incorrect;
    }

    public function addIncorrect(SiswaDTO $siswaDto) {
        $this->incorrect[] = (array) $siswaDto;
    }

    public function getAccuracy() {
        if (count($this->correct) == 0) {
            $this->accuracy = 0;
        } else {
            $this->accuracy = number_format(count($this->correct) / $this->totalData * 100, 2);
        }
        return $this->accuracy;
    }

    public function setTotalData($totalData) {
        $this->totalData = $totalData;
    }

    public function getTotalData() {
        return $this->totalData;
    }
}
