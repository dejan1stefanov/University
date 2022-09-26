<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Person;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $alumnis = Alumni::with('person')->get();
        return response()->json(['alumnis' => $alumnis], 200);
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
            'field_of_graduation' => 'required',
            'date_of_graduation' => 'required|date',
            'diploma_type' => 'required'
        ]);

        $person = new Person();
        $alumni = new Alumni();
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->social_number = $request->social_number;
        $person->adress = $request->adress;
        $person->gender = $request->gender;
        $person->date_of_birth = $request->date_of_birth;
        $alumni->field_of_graduation = $request->field_of_graduation;
        $alumni->date_of_graduation = $request->date_of_graduation;
        $alumni->diploma_type = $request->diploma_type;
        
        if($person->save()) {
            $person_id = $person->id;   
        } else {
            return response()->json(['error' => 1]);
        }
        
        $alumni->person_id = $person_id;

        if($alumni->save()) {
            return response()->json(['success' => true, 'alumni' => ['alumni_info' => $alumni, 'personal_info' => $person]]);
        } else {
            $person->delete();
            return response()->json(['error' => 1]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show(Alumni $alumni)
    {
        $person = Person::where('id', $alumni->person_id)->get();
        return response()->json(['success' => true, 'alumni' => ['info' => $alumni, 'personal_info' => $person]], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'first_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/',
            'social_number' => 'required|min:5',
            'adress' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'field_of_graduation' => 'required',
            'date_of_graduation' => 'required|date',
            'diploma_type' => 'required'
        ]);

        $alumni->field_of_graduation = $request->field_of_graduation;
        $alumni->date_of_graduation = $request->date_of_graduation;
        $alumni->diploma_type = $request->diploma_type;

        Person::where('id', $alumni->person_id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'social_number' => $request->social_number,
            'adress' => $request->adress,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth
        ]);
        
        if($alumni->save()) 
            return response()->json(['success' => true, 'alumni' => $alumni]);

        return response()->json(['error' => 1]);
    }

}
