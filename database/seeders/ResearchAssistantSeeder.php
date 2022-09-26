<?php

namespace Database\Seeders;

use App\Models\Research_Assistant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchAssistantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $research_assistant = new Research_Assistant();
        $research_assistant->project = 'Project 1';
        $research_assistant->is_student = 1;
        $research_assistant->employee_id = 5;
        $research_assistant->save();
    }
}
