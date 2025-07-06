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
        Schema::table('muzakkis', function (Blueprint $table) {
            $table->dropColumn('beras');
        });
        Schema::table('muzakkis', function (Blueprint $table) {
            $table->decimal('beras', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('muzakkis', function (Blueprint $table) {
            Schema::table('muzakkis', function (Blueprint $table) {
                $table->dropColumn('beras');
            });

            Schema::table('muzakkis', function (Blueprint $table) {
                $table->integer('beras')->nullable();
            });
        });
    }
};
