<?php

namespace App\Jobs;

use App\Services\PicoTimingService;
use App\Services\StageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchResults implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private PicoTimingService $picoTimingService, private StageService $stageService)
    {
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $stage = $this->stageService->getByNumber(4);
        $data = $this->picoTimingService->loadDataByStage($stage);

        return $this->picoTimingService->parseData(data: $data, stage: $stage);
    }
}
