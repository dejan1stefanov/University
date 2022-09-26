<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee();
        $employee->salary = 1200;
        $employee->person_id = 9;
        $employee->save();

        $employee = new Employee();
        $employee->salary = 1000;
        $employee->person_id = 10;
        $employee->save();

        $employee = new Employee();
        $employee->salary = 1400;
        $employee->person_id = 11;
        $employee->save();

        $employee = new Employee();
        $employee->salary = 1500;
        $employee->person_id = 12;
        $employee->save();

        $employee = new Employee();
        $employee->salary = 1550;
        $employee->person_id = 13;
        $employee->save();

        $employee = new Employee();
        $employee->salary = 1200;
        $employee->person_id = 14;
        $employee->save();

        $employee = new Employee();
        $employee->salary = 1100;
        $employee->person_id = 15;
        $employee->save();
    }
}
