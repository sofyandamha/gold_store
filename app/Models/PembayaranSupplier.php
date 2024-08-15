<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota',
        'tanggal_bayar',
        'metode_bayar',
        'denda',
    ];
}
