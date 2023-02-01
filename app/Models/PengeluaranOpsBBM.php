<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranOpsBBM extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bbm()
    {
        return $this->belongsTo(BBM::class);
    }
}
