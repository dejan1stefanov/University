<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person = new Person();
        $person->first_name = 'John';
        $person->last_name = 'Doe';
        $person->social_number = '12345678';
        $person->adress = 'Some adress 23';
        $person->gender = 'male';
        $person->date_of_birth = '1993-11-23';
        $person->save();

        $person = new Person();
        $person->first_name = 'Jane';
        $person->last_name = 'Doe';
        $person->social_number = '12345678';
        $person->adress = 'Some adress 26';
        $person->gender = 'female';
        $person->date_of_birth = '1992-08-21';
        $person->save();

        $person = new Person();
        $person->first_name = 'Tomy';
        $person->last_name = 'Dest';
        $person->social_number = '432432433';
        $person->adress = 'Some adress 20';
        $person->gender = 'male';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Dan';
        $person->last_name = 'Dest';
        $person->social_number = '3234324233';
        $person->adress = 'Some adress 20';
        $person->gender = 'male';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Rock';
        $person->last_name = 'Rock';
        $person->social_number = '3424234242';
        $person->adress = 'Some adress 20';
        $person->gender = 'male';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Ana';
        $person->last_name = 'Rose';
        $person->social_number = '432432433';
        $person->adress = 'Some adress 20';
        $person->gender = 'female';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Lara';
        $person->last_name = 'Si';
        $person->social_number = '432432433';
        $person->adress = 'Some adress 20';
        $person->gender = 'female';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Jack';
        $person->last_name = 'Si';
        $person->social_number = '3234242323';
        $person->adress = 'Some adress 20';
        $person->gender = 'male';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Liam';
        $person->last_name = 'Nisson';
        $person->social_number = '432432433';
        $person->adress = 'Some adress 20';
        $person->gender = 'male';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Tom';
        $person->last_name = 'Krus';
        $person->social_number = '432432433';
        $person->adress = 'Some adress 20';
        $person->gender = 'male';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Abraham';
        $person->last_name = 'Tammy';
        $person->social_number = '432432433';
        $person->adress = 'Some adress 20';
        $person->gender = 'male';
        $person->date_of_birth = '1993-12-15';
        $person->save();

        $person = new Person();
        $person->first_name = 'Lora';
        $person->last_name = 'Dest';
        $person->social_number = '432432433';
        $person->adress = 'Some adress 20';
        $person->gender = 'female';
        $person->date_of_birth = '1993-12-15';
        $person->save();
    }
}
