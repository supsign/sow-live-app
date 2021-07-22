<?php

namespace App\Http\Controllers;

use App\Services\PicoTimingService;
use App\Services\StageService;
use App\Services\YannisStartlistService;

class TestController extends Controller
{
    public function test(PicoTimingService $picoTimingService, StageService $stageService, YannisStartlistService $yannisStartlistService)
    {
        // $stage = $stageService->getByNumber(4);
        // $data = $picoTimingService->loadDataByStage($stage);

        // return $picoTimingService->parseData(data: $data, stage: $stage);
        $yannisStartlistService->fetchAndParseData();
    }
}
