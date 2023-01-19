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
        Schema::create('b_b_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_bbm');
            $table->decimal('harga_beli', 12, 2);
            $table->decimal('harga_jual', 12, 2);
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
        Schema::dropIfExists('b_b_m_s');
    }
};
