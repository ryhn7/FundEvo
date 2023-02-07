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
        Schema::create('pengeluaran_ops_b_b_m_s', function (Blueprint $table) {
            $table->id();
            $table->decimal('harga_penebusan_bbm', 12, 2)->nullable();
            $table->decimal('pph', 12, 2)->nullable();
            $table->decimal('tips_sopir', 12, 2)->nullable();
            $table->decimal('oli', 12, 2)->nullable();
            $table->decimal('gas', 12, 2)->nullable();
            $table->decimal('gaji_supervisor', 12, 2)->nullable();
            $table->decimal('gaji_karyawan', 12, 2)->nullable();
            $table->decimal('reward_karyawan', 12, 2)->nullable();
            $table->decimal('pln', 12, 2)->nullable();
            $table->decimal('pdam', 12, 2)->nullable();
            $table->decimal('iuran_rt', 12, 2)->nullable();
            $table->decimal('pbb', 12, 2)->nullable();
            $table->decimal('biaya_lain', 12, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->string('nota')->nullable();
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
        Schema::dropIfExists('pengeluaran_ops_b_b_m_s');
    }
};
