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
        Schema::create('yatim_piatus', function (Blueprint $table) {
            $table->uuid('id_yatim_piatu')->primary();
            $table->string('nama');
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->enum('status', ['yatim', 'piatu']);
            $table->enum('pendidikan', ['sd', 'smp', 'sma']);
            $table->integer('biaya');
            $table->text('alamat');
            $table->foreignId('pembuatData_id')->constrained(
                table: 'users',
                indexName: 'pembuatDataYatimPiatu_id'
            );
            $table->uuid('id_RT')->nullable()->constrained(
                table: 'r_t_s',
                indexName: 'id_RT'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yatim_piatus');
    }
};
