<?php

namespace App\Http\Controllers;

use App\Models\centers;
use App\Models\specs;
use Illuminate\Http\Request;

class SpecsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = specs::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tel' => 'required',
            'rate' => 'required',
            'mail' => 'required',
            'title'=>'required',
            'address' => 'required'

        ]);
        $newData = new specs([
            'name' => $request->get('name'),
            'tel' => $request->get('tel'),
            'rate' => $request->get('rate'),
            'title'=>$request->get('title'),
            'mail' => $request->get('mail'),
            'address' => $request->get('address')
        ]);


        $newData->save();

        return response()->json($newData);
    }

    /**
     * Display the specified resource.
     */
    public function getSpecs($id)
    {
        $row = specs::find($id);
        return response()->json($row);
    }
    public function deleteSpecs($id)
    {
        specs::destroy($id);
        return response()->json($id);
    }
    /**
     * Display the specified resource.
     */
    public function show(centers $centers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, specs $centers)
    {
        $centers::whereId($request->get('id'))->update($request->all());
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
