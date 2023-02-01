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
        Schema::create('penjualan_b_b_m_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bbm_id')->constrained('b_b_m_s')->onDelete('cascade');
            $table->double('stock_awal');
            $table->double('penerimaan');
            $table->double('tera_densiti')->nullable();
            $table->double('penjualan');
            $table->double('stock_adm');
            $table->double('stock_fakta');
            $table->double('penyusutan');
            $table->decimal('pendapatan', 12, 2);
            $table->timestamp('date')->default(Carbon::now()->toDateString());
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
        Schema::dropIfExists('penjualan_b_b_m_s');
    }
};
