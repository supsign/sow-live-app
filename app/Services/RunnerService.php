<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Club;
use App\Models\Runner;
use stdClass;

class RunnerService
{
    public function __construct(private ClubService $clubService, private CategoryService $categoryService)
    {
    }

    public function updateOrCreate(stdClass $data, Club | null $club = null, Category | null $category = null): Runner
    {
        $runner = $this->getByStartnumber($data->startnumber);

        if (!$runner) {
            $runner = new Runner();
            $runner->startnumber = $data->startnumber;
        }

        if (!$club) {
            $club = $this->clubService->getByName($data->club);
        }

        if ($club && $runner->club_id !== $club->id) {
            $runner->club_id = $club->id;
        }

        if (!$category) {
            $category = $this->categoryService->getByShortname($data->category);
        }

        if ($category && $runner->category_id !== $category->id) {
            $runner->category_id = $category->id;
        }

        if ($runner->name !== trim($data->name)) {
            $runner->name = trim($data->name);
        }

        if ($runner->year_of_birth !== $data->yearOfBirth) {
            $runner->year_of_birth = $data->yearOfBirth;
        }

        if ($runner->isDirty() || !$runner->exists) {
            $runner->save();
        }

        return $runner;
    }

    public function getByStartnumber(int $startnumber): Runner | null
    {
        return Runner::where(['startnumber' => $startnumber])->first();
    }

    public function getByCategory(Category $category)
    {
        return Runner::where(['category_id' => $category->id])->get();
    }
}
