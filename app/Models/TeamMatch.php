<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMatch extends Model
{
    /** @use HasFactory<\Database\Factories\TeamMatchFactory> */
    use HasFactory;

    protected $fillable = [
        'opponent',
        'location',
        'type',
        'team_id',
    ];
}
