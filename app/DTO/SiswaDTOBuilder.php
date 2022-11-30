<?php 

namespace App\DTO;

use Ramsey\Collection\Exception\ValueExtractionException;

class SiswaDTOBuilder {
    
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

    public function setNama(string $nama) : SiswaDTOBuilder
    {
        $this->nama = $nama;
        return $this;
    }

    public function setAgama(float $agama) : SiswaDTOBuilder
    {
        $this->agama = $agama;
        return $this;
    }

    public function setPkn(float $pkn) : SiswaDTOBuilder
    {
        $this->pkn = $pkn;
        return $this;
    }

    public function setBhs_indo(float $bhs_indo) : SiswaDTOBuilder
    {
        $this->bhs_indo = $bhs_indo;
        return $this;
    }

    public function setMatematika(float $matematika) : SiswaDTOBuilder
    {
        $this->matematika = $matematika;
        return $this;
    }

    public function setIpa(float $ipa) : SiswaDTOBuilder
    {
        $this->ipa = $ipa;
        return $this;
    }

    public function setIps(float $ips) : SiswaDTOBuilder
    {
        $this->ips = $ips;
        return $this;
    }

    public function setPenjas(float $penjas) : SiswaDTOBuilder
    {
        $this->penjas = $penjas;
        return $this;
    }

    public function setPrakarya(float $prakarya) : SiswaDTOBuilder
    {
        $this->prakarya = $prakarya;
        return $this;
    }

    public function setBhs_inggris(float $bhs_inggris) : SiswaDTOBuilder
    {
        $this->bhs_inggris = $bhs_inggris;
        return $this;
    }

    public function setSeni_budaya(float $seni_budaya) : SiswaDTOBuilder
    {
        $this->seni_budaya = $seni_budaya;
        return $this;
    }

    public function setBhs_daerah(float $bhs_daerah) : SiswaDTOBuilder
    {
        $this->bhs_daerah = $bhs_daerah;
        return $this;
    }

    public function setJurusan(string $jurusan) : SiswaDTOBuilder
    {
        try {
            $this->jurusan = Jurusan::fromName($jurusan);
        } catch (ValueExtractionException $e) {
            throw new ValueExtractionException($e->getMessage());
        }
        return $this;
    }

    public function build() : SiswaDTO {
        return new SiswaDTO(
            $this->nama,
            $this->agama,
            $this->pkn,
            $this->bhs_indo,
            $this->matematika,
            $this->ipa,
            $this->ips,
            $this->bhs_inggris,
            $this->seni_budaya,
            $this->penjas,
            $this->prakarya,
            $this->bhs_daerah,
            $this->jurusan
        );
    }


}