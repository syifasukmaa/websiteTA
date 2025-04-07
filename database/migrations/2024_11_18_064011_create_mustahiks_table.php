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
        Schema::create('mustahiks', function (Blueprint $table) {
            $table->uuid('id_mustahik')->primary();
            $table->string('nama_keluarga')->nullable();
            $table->enum('kelompok', ['fakir miskin', 'fisabilillah', 'mualaf', 'amilin', 'tidak semua', 'duafa']);
            $table->string('nama_suami')->nullable();
            $table->string('nama_istri')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->foreignId('pembuatData_id')->constrained(
                table: 'users',
                indexName: 'pembuatData_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahiks');
    }
};
