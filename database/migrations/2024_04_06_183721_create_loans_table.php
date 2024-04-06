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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->date('loan_date');
            $table->date('return_date');
            $table->foreignId('id_book')->constrained('books');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_user_created')->constrained('users');
            $table->foreignId('id_user_updated')->constrained('users');
            $table->foreignId('id_user_deleted')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
