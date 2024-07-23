<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\MasterCustomer;

class BeliEmas extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_trans',
        'customer',
        'metode_pembayaran',
        'bukti_pembayaran',
        'berat',
        'kadar_emas',
        'category_id',
        'keterangan_berat'
    ];

    public function customer()
    {
        return $this->belongsTo(MasterCustomer::class)->select('id', 'nm_customer');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'kategori');
    }

}
