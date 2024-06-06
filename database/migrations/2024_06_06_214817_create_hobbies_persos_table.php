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
        Schema::create('hobbies_persos', function (Blueprint $table) {
            $table->id();
            $table->string('auth_id');
            $table->string('nom');
            $table->string('icon');
            $table->string('description');
            $table->string('banniere');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hobbies_persos');
    }
};
