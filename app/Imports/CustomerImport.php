<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Customer([
            'nama' => $row[1],
            'alamat' => $row[2],
            'phone' => $row[3],
            'email' => $row[4],
            'id_paket' => $row[5],
            'val_id' => $row[6],
            'tanggal_langganan' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
            'status_langganan' => $row[8],
        ]);
    }
}
