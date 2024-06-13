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
        Schema::create('transaksirokoks', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah',50);
            $table->unsignedBigInteger('jenisrokok_id');
            $table->foreign('jenisrokok_id')->references('id_jenis')->on('jenirokoks')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksirokoks');
    }
};
