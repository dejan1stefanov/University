<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $employees = Employee::with('person', 'professors', 'teaching_assistants', 'research_assistants')->get();
        return response()->json(['employees' => $employees], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listGeneral()
    {
        $employees = Person::join('employees', 'people.id', 'employees.person_id')
                            ->join('employees_positions', 'employees.id', 'employees_positions.employee_id')
                            ->join('positions', 'positions.id', 'employees_positions.id')
                            ->get();
        return response()->json(['employees' => $employees], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'social_number' => 'required|min:5',
            'adress' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'salary' => 'required',
            'position_id' => 'required'
        ]);

        $person = new Person();
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->social_number = $request->social_number;
        $person->adress = $request->adress;
        $person->gender = $request->gender;
        $person->date_of_birth = $request->date_of_birth;
        
        if($person->save()) {
            $person_id = $person->id;   
        } else {
            return response()->json(['error' => 1]);
        }

        $employee = new Employee();
        $employee->salary = $request->salary;
        $employee->person_id = $person_id;

        if($employee->save()) {
            $employee_id = $employee->id;  
        } else {
            return response()->json(['error' => 1]);
        }

        $employee_position = DB::table('employees_positions')
        ->insert([
            'employee_id' => $employee_id,
            'position_id' => $request->position_id
        ]);

        if($employee_position) 
            return response()->json(['success' => true, 'employee' => ['employee_info' => $employee, 'personal_info' => $person, 'employee_position' => $employee_position ]]);

        return response()->json(['error' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

}
