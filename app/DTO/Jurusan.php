<?php 

namespace App\DTO;

use ValueError;

enum Jurusan {

    case PSPR;
    case PSPT;
    case TKJ;
    case RPL;
    case MM;
    case UPW;
    case AKL;
    case OTKP;
    case BDP;
    case APL;

    public static function fromName(string $name) : Jurusan {
        foreach (self::cases() as $jurusan) {
            if ($name === $jurusan->name) {
                return $jurusan;
            }
        }
        throw new ValueError("$name is not a valid backing value of enum" . self::class);
    }

}