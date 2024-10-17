<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\PemasukanBarang;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemasukanBarangTransaksi extends Model
{
    use HasFactory;

    protected $table = 'pemasukan_barang_transaksi';

    protected $fillable = [
        'category_id',
        'pemasukan_barang_id',
        'sub_kategori',
        'name',
        'kadar',
        'berat_bersih',
        'harga_modal'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function pemasukan_barang()
    {
        return $this->belongsTo(PemasukanBarang::class);
    }
}
