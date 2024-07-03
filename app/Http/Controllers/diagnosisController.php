<?php

namespace App\Http\Controllers;

use App\Models\centers;
use App\Models\diagnosis;
use App\Models\doctors;
use App\Models\specs;
use Illuminate\Http\Request;

class diagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = diagnosis::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'diagnosis' => 'required'
        ]);
        $newData = new diagnosis([
            'user_id' => $request->get('user_id'),
            'diagnosis' => $request->get('diagnosis')
        ]);


        $newData->save();

        return response()->json($newData);
    }

    /**
     * Display the specified resource.
     */
    public function getDoctor($id)
    {
        $row = diagnosis::find($id);
        return response()->json($row);
    }
    public function deleteDoctor($id)
    {
        diagnosis::destroy($id);
        return response()->json($id);
    }
    /**
     * Display the specified resource.
     */
    public function show(diagnosis $centers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, diagnosis $doctor)
    {
        $doctor::whereId($request->get('id'))->update($request->all());
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(centers $centers)
    {
        //
    }
}
