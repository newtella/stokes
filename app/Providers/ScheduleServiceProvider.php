<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
Use App\Interfaces\ScheduleServiceInterface;
use App\Services\ScheduleService;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ScheduleServiceInterface::class, ScheduleService::class);
    }
}
