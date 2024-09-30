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
        Schema::create('pemasukan_barang_masmurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id'); // Supplier
            $table->string('no_certificate'); // No Certificate
            $table->date('purchase_date'); // Tanggal Pembelian
            $table->decimal('price_per_gram', 10, 2); // Harga Per Gram (otomatis)
            $table->enum('type', ['ANTM', 'LOKAL', 'UBS']); // Jenis
            $table->decimal('modal_weight', 10, 2); // Berat Modal
            $table->foreign('supplier_id')->references('id')->on('master_suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan_barang_masmurs');
    }
};
