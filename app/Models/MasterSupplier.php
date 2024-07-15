<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nm_supplier',
        'no_hp',
        'address',
    ];
}
