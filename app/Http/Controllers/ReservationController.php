<?php

namespace App\Http\Controllers;

use App\Models\centers;
use App\Models\doctors;
use App\Models\reservation;
use App\Models\specs;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = reservation::where('status','=','0');
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $unavailble = reservation::where('doctor_id', '=', $request->doctor_id)->where('time', '=', $request->time)->get();
        $isavailble = doctors::where('id', '=', $request->doctor_id)->first();

        $newData = new reservation([
            'date' => $request->get('date'),
            'doctor_id' => $request->get('doctor_id'),
            'center_id' => $request->get('center_id'),
            'spec_id' => $request->get('spec_id'),
            'user_id' => $request->get('user_id'),
            'time' => $request->get('time'),
            "status" => $request->get('status')
        ]);
        $from = strtotime($isavailble->from);
        $from = date('H:i:s', $from);
        $to = strtotime($isavailble->to);
        $to = date('H:i:s', $to);
        $time = strtotime($request->time);
        $time = date('H:i:s', $time);


        if (count($unavailble) == 0 && $time > $from && $time < $to) {
            $newData->save();
            return response()->json($newData);

        } else {
            return response()->json('unAvbailble');
        }
    }

    public function storeCenter(Request $request)
    {

        $unavailble = reservation::where('doctor_id', '=', $request->doctor_id)->where('time', '=', $request->time)->get();
        $isavailble = centers::where('id', '=', $request->doctor_id)->first();

        $newData = new reservation([
            'date' => $request->get('date'),
            'doctor_id' => $request->get('doctor_id'),
            'center_id' => $request->get('center_id'),
            'spec_id' => $request->get('spec_id'),
            'user_id' => $request->get('user_id'),
            'time' => $request->get('time'),
            "status" => $request->get('status')
        ]);
        $from = strtotime($isavailble->from);
        $from = date('H:i:s', $from);
        $to = strtotime($isavailble->to);
        $to = date('H:i:s', $to);
        $time = strtotime($request->time);
        $time = date('H:i:s', $time);


        if (count($unavailble) == 0 && $time > $from && $time < $to) {
            $newData->save();
            return response()->json($newData);

        } else {
            return response()->json('unAvbailble');
        }
    }
    public function storeSpecs(Request $request)
    {

        $unavailble = reservation::where('doctor_id', '=', $request->doctor_id)->where('time', '=', $request->time)->get();
        $isavailble = specs::where('id', '=', $request->doctor_id)->first();

        $newData = new reservation([
            'date' => $request->get('date'),
            'doctor_id' => $request->get('doctor_id'),
            'center_id' => $request->get('center_id'),
            'spec_id' => $request->get('spec_id'),
            'user_id' => $request->get('user_id'),
            'time' => $request->get('time'),
            "status" => $request->get('status')
        ]);
        $from = strtotime($isavailble->from);
        $from = date('H:i:s', $from);
        $to = strtotime($isavailble->to);
        $to = date('H:i:s', $to);
        $time = strtotime($request->time);
        $time = date('H:i:s', $time);


        if (count($unavailble) == 0 && $time > $from && $time < $to) {
            $newData->save();
            return response()->json($newData);

        } else {
            return response()->json('unAvbailble');
        }
    }
    public function getdocReservation($id)
    {
        $data = reservation::where('doctor_id', '=', $id);
        return response()->json($data);
    }
    public function getspecReservation($id)
    {
        $data = reservation::where('spec_id', '=', $id);
        return response()->json($data);
    }
    public function getceenterReservation($id)
    {
        $data = reservation::where('center_id', '=', $id);
        return response()->json($data);
    }
    public function confirmReservation($id)
    {
        $data = reservation::where('id', '=', $id)->update(['status'=>1]);
        return response()->json($data);
    }
    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservation $reservation)
    {
        $reservation::whereId($request->get('id'))->update($request->all());
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        //
    }
}
