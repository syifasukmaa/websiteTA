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
        Schema::create('pendaftar_qurbans', function (Blueprint $table) {
            $table->uuid('id_pendaftar_qurban')->primary();
            $table->integer('nomor_antrian')->nullable();
            $table->year('tahun')->nullable();
            $table->string('nama');
            $table->text('tujuan_pahala')->nullable();
            $table->string('hak_pengqurban');
            $table->enum('jenis_hewan', ['kambing', 'domba', 'sapi', 'kerbau']);
            $table->integer('biaya');
            $table->string('status_pembayaran');
            $table->enum('RW', ['16', '21', 'lainnya']);
            $table->foreignId('pembuatData_id')->constrained(
                table: 'users',
                indexName: 'pembuatDataQurban_id'
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
        Schema::dropIfExists('pendaftar_qurbans');
    }
};
