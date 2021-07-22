<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stage;
use App\Models\Start;
use App\Services\PicoTimingService;
use App\Services\ResultService;
use Illuminate\Http\Request;

class SOW extends Controller
{
    public function competition()
    {
        $stages = Stage::all();

        return view('page.competition', compact('stages'));
    }

    public function stage(Stage $stage)
    {
        $categories = Category::all();

        return view('page.stage', compact(['stage', 'categories']));
    }

    public function category(Stage $stage, Category $category, ResultService $resultService)
    {
        $category_starts = Start::where(['stage_id' => $stage->id, 'category_id' => $category->id])->get();

        $results = $resultService->getByCategoryAndStage($category, $stage);
        $runners = $results->map(function ($result) {return $result->runner; });

        return view('page.category', compact('stage', 'category', 'category_starts', 'runners', 'results'));
    }

    public function getResults(Request $request, ResultService $resultService)
    {
        $ids = $request->ids;
        if (!$ids) {
            abort(400);
        }

        return $resultService->getByIds($ids);
    }

    public function loadResultsByStage(Request $request, Stage $stage, PicoTimingService $picoTimingService)
    {
        $data = $picoTimingService->loadDataByStage($stage);

        return $picoTimingService->parseData(data: $data, stage: $stage);
    }
}
