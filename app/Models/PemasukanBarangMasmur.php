<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterSupplier;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemasukanBarangMasmur extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'no_certificate',
        'purchase_date',
        'price_per_gram',
        'type',
        'modal_weight',
        // 'real_weight',
    ];

    public function mastersupplier(): BelongsTo
    {
        return $this->BelongsTo(MasterSupplier::class, 'supplier_id', 'id');
    }
}

