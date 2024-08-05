<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
