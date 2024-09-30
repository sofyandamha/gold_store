<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
    ];

    protected function casts(): array
    {
        return [
            'item_id' => 'array',
        ];
    }
}
