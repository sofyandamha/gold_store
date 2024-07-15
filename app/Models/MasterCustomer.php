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
        'address',
        'tgl_lahir',
        'no_rekening',
        'point_member'
    ];
}
