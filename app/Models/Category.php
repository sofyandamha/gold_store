<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterHarga;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'klasifikasi',
        'kategori',
        'keterangan',
    ];

    public function harga()
    {
        return $this->belongsTo(MasterHarga::class)->select('id', 'hrg_jual','hrg_beli');
    }
}
