<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koran extends Model
{
    use HasFactory;

    protected $table = 'korans';

    protected $primaryKey = 'id_koran';
    protected $fillable = [
        'kode_koran',
        'nama_koran',
        'harga',
        'logo_brand'
    ];
}
