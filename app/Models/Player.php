<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\PlayerGameStat;

class Player extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'dob',
        'position',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function game_stats()
    {
        return $this->hasMany(PlayerGameStat::class, 'player_id');
    }
}
