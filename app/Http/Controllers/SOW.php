<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stage;
use App\Models\Start;
use App\Services\ResultService;

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
        $runners = $category_starts->map(function ($start) {return $start->runner; });
        $results = $resultService->getByCategoryAndStage($category, $stage);

        return view('page.category', compact('stage', 'category', 'category_starts', 'runners', 'results'));
    }
}
