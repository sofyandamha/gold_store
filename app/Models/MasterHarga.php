<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class MasterHarga extends Model
{
    use HasFactory;

    protected  $table = 'master_hargas';
    protected $fillable = [
        'hrg_jual',
        'hrg_beli',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'kategori');
    }
}
