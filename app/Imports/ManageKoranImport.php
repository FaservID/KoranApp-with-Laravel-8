<?php

namespace App\Imports;

use App\Models\ManageKoran;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class ManageKoranImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ManageKoran([
            'id_koran'     => $row[1],
            'id_input' => $row[2],
            'id_user'    => $row[3],
            'koran_masuk' => $row[4],
            'koran_terkirim' => $row[5],
            'koran_sisa' => $row[6],
            'tanggal_masuk' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
        ]);
    }
}
