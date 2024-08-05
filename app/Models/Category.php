<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterHarga;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'klasifikasi',
        'kategori',
        'keterangan',
    ];


    public function harga(): HasMany
    {
        return $this->HasMany(MasterHarga::class);
    }

    public function masteremas(): HasMany
    {
        return $this->HasMany(MasterHarga::class);
    }


}
