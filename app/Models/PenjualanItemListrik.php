<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PenjualanItemListrik extends Model
{
    use HasFactory, Sortable;
    protected $guarded = ['id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function penjualanKategoris()
    {
        return $this->belongsTo(KategoriItem::class, 'kategori');
    }
    public $sortable = ['created_at', 'stock_awal', 'penerimaan', 'penjualan', 'stock_akhir', 'penyusutan', 'pendapatan'];

}
