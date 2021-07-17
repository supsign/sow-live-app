<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class StagesSeeder extends Seeder
{
    private $stages = [
        [
            'name' => 'Arosa Obersee',
            'shortname' => 'E1',
            'number' => 1,
        ],
        [
            'name' => 'Scharmoin',
            'shortname' => 'E2',
            'number' => 2,
        ],
        [
            'name' => 'Urdental',
            'shortname' => 'E3',
            'number' => 3,
        ],
        [
            'name' => 'Weisshorn',
            'shortname' => 'E4',
            'number' => 4,
        ],
        [
            'name' => 'Grüenseeli',
            'shortname' => 'E5',
            'number' => 5,
        ],
        [
            'name' => 'Schwellisee',
            'shortname' => 'E6',
            'number' => 6,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach ($this->stages as $stage) {
            DB::table('stages')->insert([
                'name' => $stage['name'],
                'shortname' => $stage['shortname'],
                'number' => $stage['number'],
            ]);
        }
    }
}
