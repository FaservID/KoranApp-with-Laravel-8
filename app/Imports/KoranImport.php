<?php

namespace App\Imports;

use App\Models\Koran;
use Maatwebsite\Excel\Concerns\ToModel;

class KoranImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Koran([
            'kode_koran' => $row[1],
            'nama_koran' => $row[2],
            'harga' => $row[3],
            'logo_brand' => $row[4]
        ]);
    }
}
