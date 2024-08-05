<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\MasterCustomer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
        'masterharga_id',
        'keterangan_berat'
    ];



    public function customer(): BelongsTo
    {
        return $this->belongsTo(MasterCustomer::class);
    }

    public function masterharga(): BelongsTo
    {
        return $this->belongsTo(MasterHarga::class);
    }


}
