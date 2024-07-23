<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterCustomer;
use App\Models\MasterEmas;

class JualEmas extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_trans',
        'customer_id',
        'masteremas_id',
        'discount',
        'metode_pembayaran',
        'bukti_pembayaran',
    ];

    public function customer()
    {
        return $this->belongsTo(MasterCustomer::class)->select('id', 'nm_customer');
    }

    public function masteremas()
    {
        return $this->belongsTo(MasterEmas::class)->select('id', 'kd_barang');
    }
}
