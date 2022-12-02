<?php

namespace App\Imports;

use App\Models\Dataset\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nama' => $row['nama'],
            'agama' => $row['agama'],
            'pkn' => $row['pkn'],
            'bhs_indo' => $row['bhs_indo'],
            'matematika' => $row['matematika'],
            'ipa' => $row['ipa'],
            'ips' => $row['ips'],
            'bhs_inggris' => $row['bhs_inggris'],
            'seni_budaya' => $row['seni_budaya'],
            'penjas' => $row['penjas'],
            'prakarya' => $row['prakarya'],
            'bhs_daerah' => $row['bhs_daerah'],
            'jurusan' => $row['jurusan'],
        ]);
    }
}
