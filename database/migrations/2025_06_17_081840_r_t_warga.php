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
        Schema::table('mustahiks', function (Blueprint $table) {
            $table->uuid('id_RT')->nullable()->after('pembuatData_id')->constrained(
                table: 'r_t_s',
                indexName: 'id_RT'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mustahiks', function (Blueprint $table) {
            $table->dropColumn('id_RT');
        });
    }
};
