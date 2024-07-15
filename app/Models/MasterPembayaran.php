<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'metode_bayar',
        'add_fee',
        'keterangan',
    ];
}
