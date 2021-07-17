<?php

namespace App\Services;

use App\Models\Hash;

class YannisStartlistService
{
    private $dataUrl = 'http://sow2021-server.capricode.ch/data/startlist/startlist.json';
    private $hashUrl = 'http://sow2021-server.capricode.ch/data/startlist/hash';

    public function __construct(
        private CategoryService $categoryService,
        private ClubService $clubService,
        private RunnerService $runnerService,
        private StartService $startService,
        private StageService $stageService
    ) {
    }

    public function fetchAndParseData()
    {
        if (!$this->hashHasUpdated()) {
            return;
        }
        $data = $this->loadData();
        $this->parseData($data);
    }

    private function hashHasUpdated(): bool
    {
        $hash = Hash::where(['name' => 'startlist'])->first();
        $hashFromServer = file_get_contents($this->hashUrl);

        if (!$hash) {
            $hash = Hash::create(['name' => 'startlist', 'hash' => $hashFromServer]);

            return true;
        }

        if ($hash->hash !== $hashFromServer) {
            $hash->hash = $hashFromServer;
            $hash->save();

            return true;
        }

        return false;
    }

    private function loadData()
    {
        $json = file_get_contents($this->dataUrl);

        return json_decode($json);
    }

    private function parseData(array $data)
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
