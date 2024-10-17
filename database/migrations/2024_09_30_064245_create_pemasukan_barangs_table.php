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
        Schema::create('pemasukan_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('no_trans_id');
            $table->decimal('total_berat_pemasukan',11, 3)->nullable();
            $table->decimal('total_berat_pembelian',11, 3)->nullable();
            $table->foreign('no_trans_id')->references('id')->on('pembelian_barangs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan_barangs');
    }
};
