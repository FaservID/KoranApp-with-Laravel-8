<?php

namespace App\Exports;

use App\Models\ManageKoran;
use Maatwebsite\Excel\Concerns\FromCollection;

class ManageKoranExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ManageKoran::all();
    }
}
