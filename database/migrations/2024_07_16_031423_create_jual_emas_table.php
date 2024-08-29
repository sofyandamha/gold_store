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
        Schema::create('jual_emas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_trans',50);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('kd_barang');
            $table->integer('discount');
            $table->unsignedBigInteger('metode_pembayaran');
            $table->string('bukti_pembayaran',100);
            $table->foreign('customer_id')->references('id')->on('master_customers')->onDelete('cascade');
            $table->foreign('kd_barang')->references('id')->on('master_emas')->onDelete('cascade');
            $table->foreign('metode_pembayaran')->references('id')->on('master_pembayarans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jual_emas');
    }
};
