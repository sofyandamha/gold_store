<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_nota',
        'tipe_reparasi',
        'nama_barang',
        'berat_kotor',
        'biaya_reparasi',
        'status_diambil',
        'status_pembayaran'
    ];
}
