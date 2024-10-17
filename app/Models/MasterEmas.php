<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\MasterEmas;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
    public function masteremas(): HasMany
    {
        return $this->HasMany(MasterEmas::class);
    }
    // protected $casts = [
    //     'masteremas' => 'array',
    // ];
}