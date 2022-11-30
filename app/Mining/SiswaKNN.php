<?php 

namespace App\Mining;

use App\DTO\Jurusan;
use App\DTO\SiswaDTO;

class SiswaKNN {

    private array $dataset;

    public function __construct(array $dataset) {
        $this->dataset = $dataset;
    }

    public function predict(SiswaDTO $siswaTest, $k) : array {
        $dataDistance = [];

        // distance
        foreach ($this->dataset as $siswa) {
            $x0 = $siswa->getAgama() - $siswaTest->getAgama();
            $x1 = $siswa->getPkn() - $siswaTest->getPkn();
            $x2 = $siswa->getBhs_indo() - $siswaTest->getBhs_indo();
            $x3 = $siswa->getMatematika() - $siswaTest->getMatematika();
            $x4 = $siswa->getIps() - $siswaTest->getIps();
            $x5 = $siswa->getIpa() - $siswaTest->getIpa();
            $x6 = $siswa->getBhs_inggris() - $siswaTest->getBhs_inggris();
            $x7 = $siswa->getSeni_budaya() - $siswaTest->getSeni_budaya();
            $x8 = $siswa->getPenjas() - $siswaTest->getPenjas();
            $x9 = $siswa->getPrakarya() - $siswaTest->getPrakarya();
            $x10 = $siswa->getBhs_daerah() - $siswaTest->getBhs_daerah();

            $sqd = ($x1 * $x1) + ($x2 * $x2) + ($x3 * $x3) + ($x4 * $x4) + ($x5 * $x5) + ($x6 * $x6) + ($x7 * $x7) + ($x8 * $x8) + ($x9 * $x9) + ($x10 * $x10);
            $siswa->setDistance($sqd);
            $dataDistance[] = $siswa;
        }

        // sorting (bubble sort)
        for ($i = 0; $i < (count($dataDistance) - 1); $i++) {
            for ($j = $i + 1; $j < count($dataDistance); $j++) {
                if ($dataDistance[$i]->getDistance() > $dataDistance[$j]->getDistance()) {
                    $tempSiswa = $dataDistance[$i];
                    $dataDistance[$i] = $dataDistance[$j];
                   $dataDistance[$j] = $tempSiswa;
                }
            }
        }

        // calculate
        $PSPR = 0;
        $PSPT = 0;
        $TKJ = 0;
        $RPL = 0;
        $MM = 0;
        $UPW = 0;
        $AKL = 0;
        $OTKP = 0;
        $BDP = 0;
        $APL = 0;

        for ($i = 0; $i < $k; $i++) {
            switch ($dataDistance[$i]->getJurusan()) {
                case Jurusan::PSPR :
                    $PSPR++;
                    break;
                case Jurusan::PSPT :
                    $PSPT++;
                    break;
                case Jurusan::TKJ :
                    $TKJ++;
                    break;
                case Jurusan::RPL :
                    $RPL++;
                    break;
                case Jurusan::MM :
                    $MM++;
                    break;
                case Jurusan::UPW :
                    $UPW++;
                    break;
                case Jurusan::AKL :
                    $AKL++;
                    break;
                case Jurusan::OTKP :
                    $OTKP++;
                    break;
                case Jurusan::BDP :
                    $BDP++;
                    break;
                case Jurusan::APL :
                    $APL++;
                    break;
            }
        }

        $kSiswa = [];
        $kSiswa[] = (new KSiswa(Jurusan::PSPR, $PSPR));
        $kSiswa[] = (new KSiswa(Jurusan::PSPT, $PSPT));
        $kSiswa[] = (new KSiswa(Jurusan::TKJ, $TKJ));
        $kSiswa[] = (new KSiswa(Jurusan::RPL, $RPL));
        $kSiswa[] = (new KSiswa(Jurusan::MM, $MM));
        $kSiswa[] = (new KSiswa(Jurusan::UPW, $UPW));
        $kSiswa[] = (new KSiswa(Jurusan::AKL, $AKL));
        $kSiswa[] = (new KSiswa(Jurusan::OTKP, $OTKP));
        $kSiswa[] = (new KSiswa(Jurusan::BDP, $BDP));
        $kSiswa[] = (new KSiswa(Jurusan::APL, $APL));

        for ($i = 0; $i < count($kSiswa)-1; $i++) {
            for ($j = $i+1; $j < count($kSiswa); $j++) {
                if ($kSiswa[$i]->count < $kSiswa[$j]->count) {
                    $tempSiswa = $kSiswa[$i];
                    $kSiswa[$i] = $kSiswa[$j];
                    $kSiswa[$j] = $tempSiswa;
                }
            }
        }

        $siswaTest->setJurusanPredict($kSiswa[0]->jurusan);

        return $kSiswa;

    }
}
