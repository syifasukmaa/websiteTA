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
        Schema::create('duafas', function (Blueprint $table) {
            $table->uuid('id_duafa')->primary();
            $table->string('nama');
            $table->string('nama_istri')->nullable();
            $table->string('nama_suami')->nullable();
            $table->enum('status', ['Janda', 'Duda']);
            $table->integer('jumlah_uang');
            $table->string('keterangan');
            $table->enum('penerimaan', ['selesai', 'belum']);
            $table->uuid('id_RT')->nullable()->constrained(
                table: 'r_t_s',
                indexName: 'id_RT'
            );
            $table->enum('RW', ['16', '21', 'lainnya']);
            $table->foreignId('pembuatData_id')->constrained(
                table: 'users',
                indexName: 'pembuatDataDuafa_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duafas');
    }
};
