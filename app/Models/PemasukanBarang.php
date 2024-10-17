<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\PembelianBarang;
use App\Models\PemasukanBarangTransaksi;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class PemasukanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_trans_id',
        'total_berat_pemasukan',
        'total_berat_pembelian',
    ];


    public function beliBarang(): HasMany
    {
        return $this->HasMany(PembelianBarang::class);
    }

    public function pemasukanbarangTransaksi(): HasMany
    {
        return $this->HasMany(PemasukanBarangTransaksi::class);
    }
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

}
