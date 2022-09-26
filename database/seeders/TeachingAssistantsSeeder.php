<?php

namespace Database\Seeders;

use App\Models\Teaching_Assistant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachingAssistantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teaching_assistant = new Teaching_Assistant();
        $teaching_assistant->is_student = 0;
        $teaching_assistant->employee_id = 6;
        $teaching_assistant->subject_id = 1;
        $teaching_assistant->save();

        $teaching_assistant = new Teaching_Assistant();
        $teaching_assistant->is_student = 1;
        $teaching_assistant->employee_id = 7;
        $teaching_assistant->subject_id = 1;
        $teaching_assistant->save();
    }
}
