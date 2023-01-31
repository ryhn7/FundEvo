<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function itemKategoris()
    {
        return $this->belongsTo(KategoriItem::class, 'kategori');
    }

    public function itemPenjualans()
    {
        return $this->hasMany(PenjualanItemListrik::class);
    }

    public function itemKulakans()
    {
        return $this->hasMany(KulakanItems::class);
    }
}
