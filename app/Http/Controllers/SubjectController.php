<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $subjects = Subject::all();
        return response()->json(['position' => $subjects], 200);
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
            'subject_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/'
        ]);

        $subject = new Subject();
        $subject->subject_name = $request->subject_name;
     
        if($subject->save())
            return response()->json(['success' => true, 'subject' => $subject]);

        return response()->json(['error' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return response()->json(['subject' => $subject], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/'
        ]);

        $subject->subject_name = $request->subject_name;

        if($subject->save())
            return response()->json(['success' => true, 'subject' => $subject]);

        return response()->json(['error' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        if($subject->delete())
            return response()->json(['success' => true, 'message' => 'The subject was deleted successfully']);
        
        return response()->json(['error' => true, 'message' => 'An error occured please try again']);
    }
}
