<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Student();
        $student->index_number = 2413;
        $student->person_id = 4;
        $student->major_id = 4;
        $student->save();

        $student = new Student();
        $student->index_number = 2453;
        $student->person_id = 5;
        $student->major_id = 1;
        $student->save();

        $student = new Student();
        $student->index_number = 2323;
        $student->person_id = 6;
        $student->major_id = 4;
        $student->save();
    }
}
