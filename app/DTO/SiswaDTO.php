<?php 

namespace App\DTO;

use Ramsey\Collection\Exception\ValueExtractionException;

class SiswaDTO {
    
    private string $nama;
    private float $agama;
    private float $pkn;
    private float $bhs_indo;
    private float $matematika;
    private float $ipa;
    private float $ips;
    private float $bhs_inggris;
    private float $seni_budaya;
    private float $penjas;
    private float $prakarya;
    private float $bhs_daerah;
    private Jurusan $jurusan;

    private float $distance;
    private Jurusan $jurusanPredict;

    public static function builder() {
        return new SiswaDTOBuilder();
    }

    public function __construct(
        string $nama,
        float $agama,
        float $pkn,
        float $bhs_indo,
        float $matematika,
        float $ipa,
        float $ips,
        float $bhs_inggris,
        float $seni_budaya,
        float $penjas,
        float $prakarya,
        float $bhs_daerah
    )
    {
        $this->nama = $nama;
        $this->agama = $agama;
        $this->pkn = $pkn;
        $this->bhs_indo = $bhs_indo;
        $this->matematika = $matematika;
        $this->ipa = $ipa;
        $this->ips = $ips;
        $this->bhs_inggris = $bhs_inggris;
        $this->seni_budaya = $seni_budaya;
        $this->penjas = $penjas;
        $this->prakarya = $prakarya;
        $this->bhs_daerah = $bhs_daerah;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNama(string $nama) {
        $this->nama = $nama;
    }

    public function getAgama() {
        return $this->agama;
    }

    public function setAgama(float $agama) {
        $this->agama = $agama;
    }

    public function getPkn() {
        return $this->pkn;
    }

    public function setPkn(float $pkn) {
        $this->pkn = $pkn;
    }

    public function getBhs_indo() {
        return $this->bhs_indo;
    }

    public function setBhs_indo(float $bhs_indo) {
        $this->bhs_indo = $bhs_indo;
    }

    public function getMatematika() {
        return $this->matematika;
    }

    public function setMatematika(float $matematika) {
        $this->matematika = $matematika;
    }

    public function getIpa() {
        return $this->ipa;
    }

    public function setIpa(float $ipa) {
        $this->ipa = $ipa;
    }

    public function getIps() {
        return $this->ips;
    }

    public function setIps(float $ips) {
        $this->ips = $ips;
    }

    public function getPenjas() {
        return $this->penjas;
    }

    public function setPenjas(float $penjas) {
        $this->penjas = $penjas;
    }

    public function getPrakarya() {
        return $this->prakarya;
    }

    public function setPrakarya(float $prakarya) {
        $this->prakarya = $prakarya;
    }

    public function getBhs_inggris() {
        return $this->bhs_inggris;
    }

    public function setBhs_inggris(float $bhs_inggris) {
        $this->bhs_inggris = $bhs_inggris;
    }

    public function getSeni_budaya() {
        return $this->seni_budaya;
    }

    public function setSeni_budaya(float $seni_budaya) {
        $this->seni_budaya = $seni_budaya;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function setDistance(float $distance) {
        $this->distance = $distance;
    }

    public function getJurusan() {
        return $this->jurusan;
    }

    public function setJurusan(string $jurusan) {
        try {
            $this->jurusan = Jurusan::fromName($jurusan);
        } catch (ValueExtractionException $e) {
            throw new ValueExtractionException($e->getMessage());
        }
        return $this;
    }

    public function getBhs_daerah() {
        return $this->bhs_daerah;
    }

    public function setBhs_daerah(float $bhs_daerah) {
        $this->bhs_daerah = $bhs_daerah;
    }

    public function getJurusanPredict() {
        return $this->jurusanPredict;
    }

    public function setJurusanPredict(Jurusan $jurusanPredict) {
        $this->jurusanPredict = $jurusanPredict;
    }

}