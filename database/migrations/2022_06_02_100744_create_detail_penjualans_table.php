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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_faktur', 25)->references('nomor_faktur')->on('penjualans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('merk_id')->references('id')->on('harga_products')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('varian');
            $table->integer('kuantitas');
            $table->bigInteger('harga_satuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
