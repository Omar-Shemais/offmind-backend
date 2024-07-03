<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=note::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required',

            'date' => 'required',
            'user_id' => 'required'

        ]);
        $newData = new note([
            'note' => $request->get('note'),
            'date' => $request->get('date'),
            'user_id' => $request->get('user_id'),

        ]);


        $newData->save();

        return response()->json($newData);
    }
public function notebyID($id){
$data=note::find($id);
return response()->json($data);
}
    /**
     * Display the specified resource.
     */
    public function show(note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(note $note)
    {
        //
    }
}
