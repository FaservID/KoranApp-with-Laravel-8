<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ManageKoran extends Model
{
    use HasFactory;


    protected $table = 'manage_korans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_koran',
        'id_input',
        'id_user',
        'koran_masuk',
        'koran_terkirim',
        'koran_sisa',
        'tanggal_masuk'
    ];

    public function getTanggalMasukAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_masuk'])
            ->translatedFormat('d F Y');
    }
}
