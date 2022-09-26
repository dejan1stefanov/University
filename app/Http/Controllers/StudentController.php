<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Person;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $students = Student::with('person', 'majors')->get();
        return response()->json(['students' => $students], 200);
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
            'index_number' => 'required|min:2',
            'major_id' => 'required'
        ]);

        $person = new Person();
        $student = new Student();
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->social_number = $request->social_number;
        $person->adress = $request->adress;
        $person->gender = $request->gender;
        $person->date_of_birth = $request->date_of_birth;
        $student->index_number = $request->index_number;
        $student->major_id = $request->major_id;
        
        if($person->save()) {
            $person_id = $person->id;
            
        } else {
            return response()->json(['error' => 1]);
        }
        
        $student->person_id = $person_id;

        if($student->save()) {
            return response()->json(['success' => true, 'student' => ['student_info' => $student, 'personal_info' => $person]]);
        } else {
            $person->delete();
            return response()->json(['error' => 1]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $person = Person::where('id', $student->person_id)->get();
        $major = Major::select('major_name')
                        ->where('id', $student->major_id)
                        ->get();
        return response()->json(['success' => true, 'student' => ['info' => $student, 'personal_info' => $person, 'major' => $major]], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'social_number' => 'required|min:5',
            'adress' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'index_number' => 'required|min:2',
            'major_id' => 'required'
        ]);

        $student->index_number = $request->index_number;
        $student->major_id = $request->major_id;

        Person::where('id', $student->person_id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'social_number' => $request->social_number,
                'adress' => $request->adress,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth
            ]);
        
            if($student->save()) {
                return response()->json(['success' => true, 'student' => $student]);
            } else {
                $person->delete();
                return response()->json(['error' => 1]);
            }
            
        
    }

}
