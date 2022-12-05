<?php 

namespace App\Mining;

use App\DTO\Jurusan;

class KSiswa {

    public Jurusan $jurusan;
    public $count;
    public $avg;

    public function __construct(Jurusan $jurusan, $count, $k) {
        $this->jurusan = $jurusan;
        $this->count = $count;
        $this->avg = number_format($count / $k * 100, 2);
    }

}