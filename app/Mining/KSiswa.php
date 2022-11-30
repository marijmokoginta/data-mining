<?php 

namespace App\Mining;

use App\DTO\Jurusan;

class KSiswa {

    public Jurusan $jurusan;
    public $count;

    public function __construct(Jurusan $jurusan, $count) {
        $this->jurusan = $jurusan;
        $this->count = $count;
    }

}