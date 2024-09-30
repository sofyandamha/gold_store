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
        Schema::create('pembelian_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_trans', 50);
            $table->date('jatuh_tempo');
            $table->decimal('berat_real', 11, 3);
            $table->decimal('berat_modal', 11, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_barangs');
    }
};
