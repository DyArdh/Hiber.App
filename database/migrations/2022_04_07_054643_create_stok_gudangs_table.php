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
        Schema::create('stok_gudangs', function (Blueprint $table) {
            $table->id();
            $table->integer('berat');
            $table->enum('status', ['Gabah', 'Pengeringan', 'Penggilingan', 'Penyortiran', 'Produk Jadi']);
            $table->string('penanggung_jawab');
            $table->enum('jenis', ['Polos', 'Medium', 'Super']);
            $table->string('merk')->nullable();
            $table->bigInteger('harga')->nullable();
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
        Schema::dropIfExists('stok_gudangs');
    }
};
