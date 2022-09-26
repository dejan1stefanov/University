<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Research_Assistant;

class ResearchAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $research_assistant = Research_Assistant::with('employees', 'person')->get();
        return response()->json(['research_assistant' => $research_assistant], 200);
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
            'project' => 'required',
            'is_student' => 'required'
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

        $research_assistant = new Research_Assistant();
        $research_assistant->project = $request->project;
        $research_assistant->is_student = $request->is_student;
        $research_assistant->employee_id = $employee_id;

        if($research_assistant->save()) 
            return response()->json(['success' => true, 'employee' => $employee, 'person' => $person, 'research_assistant' => $research_assistant ]);

        return response()->json(['error' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Research_Assistant  $research_Assistant
     * @return \Illuminate\Http\Response
     */
    public function show(Research_Assistant $research_Assistant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Research_Assistant  $research_Assistant
     * @return \Illuminate\Http\Response
     */
    public function edit(Research_Assistant $research_Assistant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Research_Assistant  $research_Assistant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Research_Assistant $research_assistant)
    {
        $request->validate([
            'first_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'social_number' => 'required|min:5',
            'adress' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'project' => 'required',
            'is_student' => 'required',
            'salary' => 'required'
        ]);
        
        $research_assistant->project = $request->project;
        $research_assistant->is_student = $request->is_student;

        Employee::where('id', $research_assistant->employee_id)
        ->update([
            'salary' => $request->salary
        ]);

        $employee = Employee::where('id', $research_assistant->employee_id)->get();

        Person::where('id', $employee[0]->person_id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'social_number' => $request->social_number,
            'adress' => $request->adress,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth
        ]);
        if($research_assistant->save()) 
            return response()->json(['success' => true, 'research_Assistant' => $research_assistant]);

        return response()->json(['error' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Research_Assistant  $research_Assistant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research_Assistant $research_Assistant)
    {
        //
    }
}
