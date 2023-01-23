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
        Schema::create('penebusan_b_b_m_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bbm_id');
            $table->double('tebusan_per_liter')->nullable();
            $table->decimal('harga_tebusan', 12, 2)->nullable();
            $table->decimal('pph', 12, 2)->nullable();
            $table->decimal('tips_sopir', 12, 2)->nullable();
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
        Schema::dropIfExists('penebusan_b_b_m_s');
    }
};
