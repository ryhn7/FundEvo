<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BBM extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bbmPenjualans()
    {
        return $this->hasMany(PenjualanBBM::class);
    }

    public function bbmPengeluaran()
    {
        return $this->hasMany(PengeluaranOpsBBM::class);
    }
}
