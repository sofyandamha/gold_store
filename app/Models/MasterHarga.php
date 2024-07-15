<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterHarga extends Model
{
    use HasFactory;

    protected  $table = 'master_hargas';
    protected $fillable = [
        'hrg_jual',
        'hrg_beli'
    ];
}
