<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanOliGas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function oliGas()
    {
        return $this->belongsTo(OliGas::class);
    }
}
