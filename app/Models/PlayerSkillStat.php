<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerSkillStat extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerSkillStatsFactory> */
    use HasFactory;

    protected $fillable = [
        'player_id',
        'dribbling',
        'passing',
        'shooting',
        'defence',
        'durability',
        'power',
        'cooperative',
        'dicipline',
        'effort',
    ];
}
