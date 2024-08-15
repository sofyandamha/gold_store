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
        Schema::create('pembayaran_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nota', 50);
            $table->string('metode_bayar', 50);
            $table->date('tanggal_bayar');
            $table->decimal('denda', 16, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_suppliers');
    }
};
