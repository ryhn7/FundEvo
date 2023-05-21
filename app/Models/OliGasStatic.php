<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OliGasStatic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function oliGases()
    {
        return $this->hasMany(OliGas::class);
    }
}
