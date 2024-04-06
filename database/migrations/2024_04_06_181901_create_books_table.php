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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
            $table->string('author');
            $table->string('year');
            $table->foreignId('id_department')->constrained('departments');
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
        Schema::dropIfExists('books');
    }
};
