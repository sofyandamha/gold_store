<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Label;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Retur extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'receipt_number',
    ];

    public function labels(): BelongsTo
    {
        return $this->belongsTo(Label::class, 'item_id', 'id');
    }
}
