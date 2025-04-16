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
        Schema::create('player_game_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id');
            $table->tinyInteger('two_point')->default(0);
            $table->tinyInteger('three_point')->default(0);
            $table->tinyInteger('free_throw')->default(0);
            $table->tinyInteger('assist')->default(0);
            $table->tinyInteger('offensive_rebound')->default(0);
            $table->tinyInteger('defensive_rebound')->default(0);
            $table->tinyInteger('steal')->default(0);
            $table->tinyInteger('block')->default(0);
            $table->tinyInteger('turn_over')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('player_game_stats');
    }
};
