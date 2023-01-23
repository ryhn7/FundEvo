<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenebusanBBM extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function bbm()
    {
        return $this->belongsTo(BBM::class);
    }

    public function pengeluaranOpsBBMs()
    {
        return $this->hasMany(PengeluaranOpsBBM::class);
    }
}
