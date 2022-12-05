<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data) {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'nama','agama','pkn','bhs_indo','matematika','ipa','ips','bhs_inggris','seni_budaya','penjas','prakarya','bhs_daerah','jurusan', 'prediksi'
        ];
    }
}
