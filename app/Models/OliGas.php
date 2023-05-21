<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OliGas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function oliGasPenjualans()
    {
        return $this->hasMany(PenjualanOliGas::class);
    }

    public function oliGasStatics()
    {
        return $this->belongsTo(OliGasStatic::class);
    }
}
