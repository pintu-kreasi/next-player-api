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
        Schema::create('player_skill_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id');
            $table->tinyInteger('dribbling')->default(0);
            $table->tinyInteger('passing')->default(0);
            $table->tinyInteger('shooting')->default(0);
            $table->tinyInteger('defense')->default(0);
            $table->tinyInteger('speed')->default(0);
            $table->tinyInteger('durability')->default(0);
            $table->tinyInteger('power')->default(0);
            $table->tinyInteger('cooperative')->default(0);
            $table->tinyInteger('dicipline')->default(0);
            $table->tinyInteger('effort')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('player_skill_stats');
    }
};
