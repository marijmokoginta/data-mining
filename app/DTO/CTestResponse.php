<?php

namespace App\DTO;


class CTestResponse
{

    private $correct = [];
    private $incorrect = [];
    private $accuracy;

    public function getCorrect() {
        return $this->correct;
    }

    public function addCorrect(SiswaDTO $siswaDto) {
        $this->correct[] = $siswaDto;
    }

    public function getIncorrect() {
        return $this->incorrect;
    }

    public function addIncorrect(SiswaDTO $siswaDto) {
        $this->incorrect[] = $siswaDto;
    }

    public function getAccuracy() {
        if (count($this->correct) == 0) {
            $this->accuracy = 0;
        } else {
            $this->accuracy = count($this->correct) / (count($this->correct) + count($this->incorrect)) * 100;
        }
        return $this->accuracy . '%';
    }
}
