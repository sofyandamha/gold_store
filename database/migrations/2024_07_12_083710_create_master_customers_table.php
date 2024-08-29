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
        Schema::create('master_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nm_customer', 100);
            $table->integer('no_hp');
            $table->integer('no_hp2')->nullable();
            $table->integer('no_hp3')->nullable();
            $table->text('address');
            $table->date('tgl_lahir');
            $table->string('bank', 50);
            $table->string('atas_nama', 100);
            $table->bigInteger('no_rekening')->default(20);
            $table->bigInteger('point_member')->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_customers');
    }
};
