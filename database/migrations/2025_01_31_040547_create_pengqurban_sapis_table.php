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
        Schema::create('pengqurban_sapis', function (Blueprint $table) {
            $table->uuid('id_pengqurban_sapi')->primary();
            $table->integer('nomor_antrian')->nullable();
            $table->year('tahun')->nullable();
            $table->string('nama_satu');
            $table->string('nama_dua');
            $table->string('nama_tiga');
            $table->string('nama_empat');
            $table->string('nama_lima');
            $table->string('nama_enam');
            $table->string('nama_tujuh');
            $table->string('pahala_satu');
            $table->string('pahala_dua');
            $table->string('pahala_tiga');
            $table->string('pahala_empat');
            $table->string('pahala_lima');
            $table->string('pahala_enam');
            $table->string('pahala_tujuh');
            $table->string('hak_pengqurban');
            $table->enum('jenis_hewan', ['sapi', 'kerbau']);
            $table->integer('biaya');
            $table->string('status_pembayaran');
            $table->foreignId('pembuatData_id')->constrained(
                table: 'users',
                indexName: 'pembuatDataQurbanSapi_id'
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
        Schema::dropIfExists('pengqurban_sapis');
    }
};
