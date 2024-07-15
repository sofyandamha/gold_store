<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_emas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kd_barang');
            $table->string('nm_barang', 100);
            $table->unsignedBigInteger('category_id');
            $table->integer('karat');
            $table->integer('berat_modal');
            $table->decimal('harga_modal', 12,2)->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_emas');
    }
};
