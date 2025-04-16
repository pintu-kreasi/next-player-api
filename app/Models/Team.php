<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamMatch;


class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'province',
        'coach_id',
        'former_coach',
    ];


    function matches() {
        return $this->hasMany(TeamMatch::class, 'team_id');
    }
}
