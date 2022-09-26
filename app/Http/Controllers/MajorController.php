<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $majors = Major::all();
        return response()->json(['majors' => $majors], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        return response()->json(['major' => $major], 200);
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
            'major_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/'
        ]);

        $major = new Major();
        $major->major_name = $request->major_name;
     
        if($major->save())
            return response()->json(['success' => true, 'major' => $major]);

        return response()->json(['error' => 1]);
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $request->validate([
            'major_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/'
        ]);

        $major->major_name = $request->major_name;

        if($major->save())
            return response()->json(['success' => true, 'major' => $major]);

        return response()->json(['error' => 1]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        if($major->delete())
            return response()->json(['success' => true, 'message' => 'The major was deleted successfully']);
        
        return response()->json(['error' => true, 'message' => 'An error occured please try again']);
    }

}
