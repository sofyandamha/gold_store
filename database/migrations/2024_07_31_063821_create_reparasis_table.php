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
        Schema::create('reparasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_nota',50)->nullable();
            $table->string('tipe_reparasi',50);
            $table->string('nama_barang',100);
            $table->decimal('berat_kotor', 8, 2);
            $table->string('biaya_reparasi',50);
            $table->string('status_diambil', 50);
            $table->enum('status_pembayaran',['Pending','Lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparasis');
    }
};
