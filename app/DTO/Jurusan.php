<?php 

namespace App\DTO;

use ValueError;

enum Jurusan : string {

    case PSPR = 'Produksi Siaran dan Program Radio';
    case PSPT = 'Produksi Siaran dan Program Televisi';
    case TKJ = 'Teknik Komputer Jaringan';
    case RPL = 'Rekayasa Perangkat Lunak';
    case MM = 'Multimedia';
    case UPW = 'Usaha Perjalanan Wisata';
    case AKL = 'Akuntansi dan Keuangan Lembaga';
    case OTKP = 'Otomatisasi dan Tata Kelola Perkantoran';
    case BDP = 'Bisnis Daring dan Pemasaran';
    case APL = 'Analisis Pengujian Laboratorium';

    public static function fromName(string $name) : Jurusan {
        foreach (self::cases() as $jurusan) {
            if ($name === $jurusan->name) {
                return $jurusan;
            }
        }
        throw new ValueError("$name is not a valid backing value of enum" . self::class);
    }

}