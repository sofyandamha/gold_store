<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterCustomer;
use App\Models\MasterEmas;
use App\Models\MasterPembayaran;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JualEmas extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_trans',
        'customer_id',
        'kd_barang',
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
        return $this->belongsTo(MasterEmas::class,'kd_barang', 'id');
    }

    // public function customer(): BelongsTo
    // {
    //     return $this->belongsTo(MasterCustomer::class);
    // }

    // public function masteremas(): BelongsTo
    // {
    //     return $this->belongsTo(MasterEmas::class);
    // }

    public function masterpembayarans()
    {
        return $this->belongsTo(MasterPembayaran::class,'metode_pembayaran','id')->select('id', 'metode_bayar');
    }
}
