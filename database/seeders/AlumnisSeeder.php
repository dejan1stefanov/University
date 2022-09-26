<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlumnisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumni = new Alumni();
        $alumni->field_of_graduation = 'communications';
        $alumni->date_of_graduation = '2021-08-23';
        $alumni->diploma_type = 'three years';
        $alumni->person_id = 7;
        $alumni->save();

        $alumni = new Alumni();
        $alumni->field_of_graduation = 'business';
        $alumni->date_of_graduation = '2021-08-23';
        $alumni->diploma_type = 'four years';
        $alumni->person_id = 8;
        $alumni->save();
    }
}
