<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PengeluaranOpsTokoListrik extends Model
{
    use HasFactory, Sortable;

    protected $guarded = ['id'];

    public $sortable = ['created_at', 'biaya_kulakan', 'gaji_karyawan', 'reward_karyawan', 'pbb', 'biaya_lain'];

    protected $casts = [
        'nota' => 'array',
    ];
}
