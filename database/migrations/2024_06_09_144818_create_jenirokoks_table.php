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
        Schema::create('jenirokoks', function (Blueprint $table) {
            $table->id('id_jenis');
            $table->string('gambar', 100);
            $table->string('nama',50);
            $table->string('jenis',50);
            $table->integer('isi');
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenirokoks');
    }
};
