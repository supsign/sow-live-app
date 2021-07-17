<?php

namespace App\Services;

use App\Models\Stage;

class StageService
{
    public function getByNumber(int $number): Stage | Null
    {
        return Stage::where(['number' => $number])->first();
    }
}
