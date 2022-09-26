<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = new Position();
        $position->position_name = 'administrator';
        $position->save();

        $position = new Position();
        $position->position_name = 'IT security';
        $position->save();
    }
}
