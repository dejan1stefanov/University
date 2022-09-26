<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Employee;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $professors = Professor::with('employees', 'person')->get();
        return response()->json(['professors' => $professors], 200);
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
            'rank' => 'required'
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

        $professor = new Professor();
        $professor->rank = $request->rank;
        $professor->employee_id = $employee_id;

        if($professor->save()) 
            return response()->json(['success' => true, 'employee' => $employee, 'person' => $person, 'professor' => $professor ]);

        return response()->json(['error' => 1]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'first_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'social_number' => 'required|min:5',
            'adress' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'salary' => 'required',
            'rank' => 'required'
        ]);
        
        $professor->rank = $request->rank;

        Employee::where('id', $professor->employee_id)
        ->update([
            'salary' => $request->salary,
        ]);

        $employee = Employee::where('id', $professor->employee_id)->get();
        
        Person::where('id', $employee[0]->person_id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'social_number' => $request->social_number,
            'adress' => $request->adress,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth
        ]);
        if($professor->save()) 
            return response()->json(['success' => true, 'employee' => $employee]);

        return response()->json(['error' => 1]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        //
    }
}
