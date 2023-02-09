<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_item_listriks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->integer('stock_awal');
            $table->integer('penerimaan');
            $table->integer('penjualan');
            $table->integer('stock_akhir');
            $table->integer('penyusutan');
            $table->decimal('pendapatan', 12, 2);
            $table->timestamp('date')->default(Carbon::today()->toDateString());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_item_listriks');
    }
};
