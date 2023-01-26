<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranOpsTokoListrik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kulakanListrik()
    {
        return $this->belongsTo(kulakanListrik::class);
    }
}