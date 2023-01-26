<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KulakanItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function pengeluaranOpsTokoListrik()
    {
        return $this->hasMany(pengeluaranOpsTokoListrik::class);
    }
}
