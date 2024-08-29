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
        Schema::create('beli_emas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_trans',50);
            $table->unsignedBigInteger('customer_id');
            $table->string('metode_pembayaran',100);
            $table->string('bukti_pembayaran',100);
            $table->decimal('berat', 5, 2);
            $table->integer('kadar_emas');
            $table->unsignedBigInteger('masterharga_id');
            $table->string('keterangan_berat', 25);
            $table->foreign('customer_id')->references('id')->on('master_customers')->onDelete('cascade');
            $table->foreign('masterharga_id')->references('id')->on('master_hargas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beli_emas');
    }
};
