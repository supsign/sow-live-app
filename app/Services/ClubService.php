<?php

namespace App\Services;

use App\Models\Club;
use stdClass;

class ClubService
{
    public function updateOrCreate(stdClass $data): Club
    {
        $club = Club::where(['name' => $data->club])->first();

        if ($club) {
            return $club;
        }

        $club = new Club(['name' => $data->club]);

        $club->save();

        return $club;
    }

    public function getByName(string $name): Club | Null
    {
        return Club::where(['name' => $name])->first();
    }
}
