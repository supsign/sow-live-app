<?php

namespace App\Console;

use App\Jobs\FetchResults;
use App\Jobs\FetchStartlist;
use App\Services\CategoryService;
use App\Services\ClubService;
use App\Services\PicoTimingService;
use App\Services\ResultService;
use App\Services\RunnerService;
use App\Services\StageService;
use App\Services\StartService;
use App\Services\YannisStartlistService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new FetchStartlist(
            new YannisStartlistService(
                new CategoryService(),
                new ClubService(),
                new RunnerService(
                    new ClubService(),
                    new CategoryService()
                ),
                new StartService(),
                new StageService()
            )
        ))->everyTwoHours()->withoutOverlapping();
        $schedule->job(new FetchResults(
            new PicoTimingService(
                new RunnerService(new ClubService(), new CategoryService()),
                new ResultService(
                    new RunnerService(new ClubService(), new CategoryService()),
                    new CategoryService()
                )
            ),
            new StageService()
        ))->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
