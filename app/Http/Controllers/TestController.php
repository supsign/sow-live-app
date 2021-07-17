<?php

namespace App\Http\Controllers;

use App\Services\YannisStartlistService;

class TestController extends Controller
{
    public function test(YannisStartlistService $yannisStartlistService)
    {
        $yannisStartlistService->fetchAndParseData();
    }
}
