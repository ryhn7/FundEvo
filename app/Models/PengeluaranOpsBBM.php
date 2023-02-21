<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class PengeluaranOpsBBM extends Model
{
    use HasFactory, Sortable;

    protected $guarded = ['id'];

    public $sortable = ['created_at', 'harga_penebusan', 'pph', 'tips_sopir', 'oli', 'gas', 'biaya_lain'];

    protected $casts = [
        'nota' => 'array',
    ];
}
