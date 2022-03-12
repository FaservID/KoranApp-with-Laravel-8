<?php

namespace App\Exports;

use App\Models\Koran;
use Maatwebsite\Excel\Concerns\FromCollection;

class KoranExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Koran::all();
    }
}
