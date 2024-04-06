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
        Schema::table('loans', function (Blueprint $table) {
            $table->foreignId('id_user_updated')->nullable()->change();
            $table->foreignId('id_user_deleted')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->foreignId('id_user_updated')->nullable(false)->change();
            $table->foreignId('id_user_deleted')->nullable(false)->change();
        });
    }
};
