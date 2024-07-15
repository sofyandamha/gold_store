<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class MasterEmas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_barang',
        'nm_barang',
        'category_id',
        'karat',
        'berat_modal',
        'harga_modal'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'kategori');
    }
}
