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
        Schema::create('muzakkis', function (Blueprint $table) {

            $table->uuid('id_muzakki')->primary();
            $table->string('nama_muzakki');
            $table->integer('jumlah_jiwa');
            $table->integer('beras')->nullable();
            $table->integer('uang')->nullable();
            $table->integer('infaq')->nullable();
            $table->text('alamat')->nullable();
            $table->text('keterangan')->nullable();
            $table->foreignId('penerima_id')->constrained(
                table: 'users',
                indexName: 'penerima_id'
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
        Schema::dropIfExists('muzakkis');
    }
};
