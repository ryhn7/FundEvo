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
        Schema::create('pengeluaran_ops_toko_listriks', function (Blueprint $table) {
            $table->id();
            $table->decimal('biaya_kulakan', 12, 2)->nullable();
            // $table->decimal('gaji_supervisor', 12, 2)->nullable();
            $table->decimal('gaji_karyawan', 12, 2)->nullable();
            $table->decimal('reward_karyawan', 12, 2)->nullable();
            // $table->decimal('pln', 12, 2)->nullable();
            // $table->decimal('pdam', 12, 2)->nullable();
            $table->decimal('pbb', 12, 2)->nullable();
            $table->decimal('biaya_lain', 12, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->string('nota')->nullable();
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
        Schema::dropIfExists('pengeluaran_ops_toko_listriks');
    }
};
