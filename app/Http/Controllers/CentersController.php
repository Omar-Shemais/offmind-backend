<?php

namespace App\Http\Controllers;

use App\Models\centers;
use Illuminate\Http\Request;

class CentersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = centers::all();
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
            'address' => 'required'

        ]);
        $newData = new centers([
            'name' => $request->get('name'),
            'tel' => $request->get('tel'),
            'rate' => $request->get('rate'),
            'mail' => $request->get('mail'),
            'address' => $request->get('address')
        ]);


        $newData->save();

        return response()->json($newData);
    }

    /**
     * Display the specified resource.
     */
    public function getCenter($id)
    {
        $row = centers::find($id);
        return response()->json($row);
    }
    public function deleteCenter($id)
    {
        centers::destroy($id);
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
    public function update(Request $request, centers $centers)
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
