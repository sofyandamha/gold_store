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
        Schema::create('returs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id'); // ID Barang
            $table->string('receipt_number');
            $table->foreign('item_id')->references('id')->on('labels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returs');
    }
};
