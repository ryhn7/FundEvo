<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanItemListrik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function penjualanKategoris()
    {
        return $this->belongsTo(KategoriItem::class, 'kategori');
    }
}
