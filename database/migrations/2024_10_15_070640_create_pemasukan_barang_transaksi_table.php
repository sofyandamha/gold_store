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
        Schema::create('pemasukan_barang_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('pemasukan_barang_id');
            $table->string('sub_kategori');
            $table->string('name');
            $table->decimal('kadar', 11, 3);
            $table->decimal('berat_bersih', 11, 3);
            $table->decimal('harga_modal', 18, 2);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('pemasukan_barang_id')->references('id')->on('pemasukan_barangs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan_barang_transaksi');
    }
};
