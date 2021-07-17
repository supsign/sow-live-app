<?php

namespace App\Services;

class YannisStartlistService
{
    private $dataUrl = 'http://sow2021-server.capricode.ch/data/startlist/startlist.json';

    public function __construct(
        private CategoryService $categoryService,
        private ClubService $clubService,
        private RunnerService $runnerService,
        private StartService $startService,
        private StageService $stageService
    ) {
    }

    public function loadData()
    {
        $json = file_get_contents($this->dataUrl);

        return json_decode($json);
    }

    public function parseData(array $data)
    {
        foreach ($data as $entry) {
            $category = $this->categoryService->updateOrCreate($entry);
            $club = $this->clubService->updateOrCreate($entry);
            $runner = $this->runnerService->updateOrCreate($entry, $club, $category);

            $startTimes = $entry->startTimes;

            if ($startTimes && is_array($startTimes)) {
                foreach ($startTimes as $startTime) {
                    $stage = $this->stageService->getByNumber($startTime->key);
                    if (!$stage) {
                        continue;
                    }
                    $this->startService->updateOrCreate(runner: $runner, category: $category, starttime: $startTime->time, stage: $stage);
                }
            }
        }
    }
}
