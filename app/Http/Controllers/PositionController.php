<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $position = Position::all();
        return response()->json(['position' => $position], 200);
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
            'position_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/'
        ]);

        $position = new Position();
        $position->position_name = $request->position_name;
     
        if($position->save())
            return response()->json(['success' => true, 'position' => $position]);

        return response()->json(['error' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'position_name' => 'required|min:2|regex:/^[a-zA-Z ]+$/'
        ]);

        $position->position_name = $request->position_name;

        if($position->save())
            return response()->json(['success' => true, 'person' => $position]);

        return response()->json(['error' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        if($position->delete())
            return response()->json(['success' => true, 'message' => 'The position was deleted successfully']);
        
        return response()->json(['error' => true, 'message' => 'An error occured please try again']);
    }
}
