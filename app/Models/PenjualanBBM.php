<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PenjualanBBM extends Model
{
    use HasFactory, Sortable;

    protected $guarded = ['id'];

    public $sortable = ['created_at', 'stock_awal', 'penerimaan', 'tera_densiti', 'penjualan', 'stock_adm', 'stock_fakta', 'penyusutan', 'pendapatan'];

    public function bbm()
    {
        return $this->belongsTo(BBM::class);
    }
}
