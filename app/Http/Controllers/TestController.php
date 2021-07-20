<?php

namespace App\Http\Controllers;

use App\Services\PicoTimingService;
use App\Services\StageService;

class TestController extends Controller
{
    public function test(PicoTimingService $picoTimingService, StageService $stageService)
    {
        $stage = $stageService->getByNumber(3);
        $data = $picoTimingService->loadDataByStage($stage);

        return $picoTimingService->parseData(data: $data, stage: $stage);
    }
}
