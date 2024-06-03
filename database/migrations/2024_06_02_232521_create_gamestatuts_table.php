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
        Schema::create('gamestatuts', function (Blueprint $table) {
            $table->id();
            $table->string('auth_id');
            $table->string('user_id')->nullable();
            $table->string('email');
            $table->string('activate');
            $table->string('accepted');
            $table->string('role');
            $table->string('team_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamestatuts');
    }
};
