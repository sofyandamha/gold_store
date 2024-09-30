<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PemasukanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_kategori',
        'name',
        'kadar',
        'berat_bersih',
        'harga_modal',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (abs($model->berat_bersih - $model->kadar) > 1) {
                throw ValidationException::withMessages([
                    'berat_bersih' => 'Selisih antara berat bersih dan kadar tidak boleh lebih dari 1 gram.',
                ]);
            }
        });
    }

}
