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
        Schema::create('kulakan_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->integer('kulakan_per_item')->nullable();
            $table->decimal('harga_kulakan', 12, 2)->nullable();
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
        Schema::dropIfExists('kulakan_items');
    }
};
