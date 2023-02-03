<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategoriItems()
    {
        return $this->hasMany(Item::class);
    }

    public function kategoriPenjualans()
    {
        return $this->hasMany(PenjualanItemListrik::class);
    }
}
