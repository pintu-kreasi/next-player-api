<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PlayerRepositoryInterface;
use App\Repositories\PlayerRepository;
use App\Interfaces\TeamRepositoryInterface;
use App\Repositories\TeamRepository;
use App\Interfaces\PlayerSkillStatRepositoryInterface;
use App\Repositories\PlayerSkillStatRepository;
use App\Interfaces\PlayerGameStatRepositoryInterface;
use App\Repositories\PlayerGameStatRepository;
use App\Interfaces\PlayerGameStateaRepository;
use App\Repositories\TeamMatchRepository;
use App\Interfaces\TeamMatchRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(PlayerSkillStatRepositoryInterface::class, PlayerSkillStatRepository::class);
        $this->app->bind(PlayerGameStatRepositoryInterface::class, PlayerGameStatRepository::class);
        $this->app->bind(TeamMatchRepositoryInterface::class, TeamMatchRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
