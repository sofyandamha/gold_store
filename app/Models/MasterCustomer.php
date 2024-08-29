<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nm_customer',
        'no_hp',
        'no_hp2',
        'no_hp3',
        'address',
        'tgl_lahir',
        'bank',
        'atas_nama',
        'no_rekening',
        'point_member'
    ];
}
