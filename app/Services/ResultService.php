<?php

namespace App\Services;

use App\Models\Result;
use App\Models\Runner;
use App\Models\Stage;
use Exception;
use stdClass;

class ResultService
{
    public function __construct(private RunnerService $runnerService)
    {
    }

    public function updateOrCreate(stdClass $data, Stage $stage): Result
    {
        $runner = $this->runnerService->getByStartnumber($data->stnr);

        if (!$runner) {
            new Exception($data->stnr.' nicht gefunden');
        }

        $result = $this->getByRunnerAndStage(runner: $runner, stage: $stage);

        if (!$result) {
            $result = new Result();
            $result->runner_id = $runner->id;
            $result->stage_id = $stage->id;
        }

        if ($result->rank !== intval($data->rang, 10)) {
            $result->rank = intval($data->rang, 10);
        }

        if ($result->start !== $data->start) {
            $result->start = $data->start;
        }

        if ($result->radio1 !== $data->radio1) {
            $result->radio1 = $data->radio1;
        }

        if ($result->radio2 = $data->radio2) {
            $result->radio2 = $data->radio2;
        }

        if ($result->radio3 !== $data->radio3) {
            $result->radio3 = $data->radio3;
        }

        if ($result->radio4 !== $data->radio4) {
            $result->radio4 = $data->radio4;
        }

        if ($result->radio5 !== $data->radio5) {
            $result->radio5 = $data->radio5;
        }

        if ($result->time !== $data->time) {
            $result->time = $data->time;
        }

        if ($result->behind !== $data->behind) {
            $result->behind = $data->behind;
        }

        if ($result->isDirty() || !$result->exists) {
            $result->save();
        }

        return $result;
    }

    public function getByRunnerAndStage(Runner $runner, Stage $stage)
    {
        return Result::where(['runner_id' => $runner->id, 'stage_id' => $stage->id])->first();
    }
}
