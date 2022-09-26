<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major = new Major();
        $major->major_name = 'Architecture';
        $major->save();

        $major = new Major();
        $major->major_name = 'Business';
        $major->save();

        $major = new Major();
        $major->major_name = 'Communications';
        $major->save();

        $major = new Major();
        $major->major_name = 'Computer & Information Sciences';
        $major->save();

        $major = new Major();
        $major->major_name = 'English and Foreign Languages';
        $major->save();
    }
}
