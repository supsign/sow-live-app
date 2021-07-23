<?php

namespace App\Services;

use App\Models\Stage;
use stdClass;

class PicoTimingService
{
    private $baseDataUrl = 'http://results.picotiming.ch/SOW2021E0';
    private $baseEndUrl = '/json.php';

    public function __construct(private RunnerService $runnerService, private ResultService $resultService)
    {
    }

    public function loadDataByStage(Stage $stage)
    {
        $json = file_get_contents($this->baseDataUrl.$stage->number.$this->baseEndUrl);

        return json_decode($json);
    }

    public function parseData(array $data, Stage $stage)
    {
        $results = [];
        foreach ($data as $entry) {
            $runner = $this->runnerService->getByStartnumber($entry->stnr);
            if (!$runner) {
                $runnerData = new stdClass();
                $runnerData->startnumber = $entry->stnr;
                $runnerData->club = '';
                $runnerData->name = $entry->name;
                $runnerData->yearOfBirth = $entry->jg;
                $runnerData->category = $entry->kategorie;
                $runner = $this->runnerService->updateOrCreate($runnerData);
            }

            $results[] = $this->resultService->updateOrCreate(data: $entry, stage: $stage);
        }

        return $results;
    }
}
