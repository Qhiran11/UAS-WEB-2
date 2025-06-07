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
        Schema::create('komponen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_komponen');
            $table->unsignedBigInteger('jenis_komponen_id'); // Foreign key
            $table->integer('harga_komponen');
            $table->integer('stok_komponen');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('jenis_komponen_id')->references('id')->on('jenis_komponen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponen');
    }
};
