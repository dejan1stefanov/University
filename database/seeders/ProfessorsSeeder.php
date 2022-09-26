<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professor = new Professor();
        $professor->rank = 'full';
        $professor->employee_id = 1;
        $professor->save();

        $professor = new Professor();
        $professor->rank = 'assistant';
        $professor->employee_id = 2;
        $professor->save();

        $professor = new Professor();
        $professor->rank = 'full';
        $professor->employee_id = 3;
        $professor->save();
    }
}
