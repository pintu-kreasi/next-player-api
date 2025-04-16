<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerGameStat extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerGameStatFactory> */
    use HasFactory;
    protected $fillable = [
        'player_id',
        'team_id',
        'match_id',
        'two_point',
        'three_point',
        'free_throw',
        'assist',
        'offensive_rebound',
        'defensive_rebound',
        'steal',
        'block',
        'turn_over',
    ];
}
