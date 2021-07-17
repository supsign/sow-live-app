<?php

namespace App\Jobs;

use App\Services\YannisStartlistService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchStartlist implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private YannisStartlistService $yannisStartlistService)
    {
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $this->yannisStartlistService->fetchAndParseData();
    }
}
