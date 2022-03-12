<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primarykey = 'id_cust';

    protected $fillable = [
        'nama',
        'alamat',
        'id_paket',
        'phone',
        'email',
        'val_id',
        'tanggal_langganan',
        'status_langganan',
        'prices'
    ];

    public function getTanggalLanggananAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_langganan'])
            ->translatedFormat('d F Y');
    }
}
