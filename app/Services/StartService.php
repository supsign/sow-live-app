<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Runner;
use App\Models\Stage;
use App\Models\Start;

class StartService
{
    public function updateOrCreate(Runner $runner, Stage $stage, Category $category, string $starttime): Start
    {
        $start = $this->findOneStart(runner: $runner, stage: $stage, category: $category);

        if (!$start) {
            $start = new Start();
            $start->runner_id = $runner->id;
            $start->stage_id = $stage->id;
            $start->category_id = $category->id;
        }

        if ($start->start_time !== $starttime) {
            $start->start_time = $starttime;
        }

        if ($start->isDirty() || !$start->exists) {
            $start->save();
        }

        return $start;
    }

    public function findOneStart(Runner $runner, Stage $stage, Category $category): Start | null
    {
        return Start::where([
            'runner_id' => $runner->id,
            'stage_id' => $stage->id,
            'category_id' => $category->id,
        ])->first();
    }
}
