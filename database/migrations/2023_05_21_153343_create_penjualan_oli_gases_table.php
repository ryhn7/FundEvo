<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_oli_gases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oli_gas_id')->constrained('oli_gases')->onDelete('cascade');
            $table->string('nama');
            $table->double('stock_awal');
            $table->double('penerimaan');
            $table->double('penjualan');
            $table->double('stock_akhir');
            $table->decimal('pendapatan', 12, 2);
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
        Schema::dropIfExists('penjualan_oli_gases');
    }
};

