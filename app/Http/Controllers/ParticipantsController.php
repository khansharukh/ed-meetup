<?php

namespace App\Http\Controllers;

use App\Models\Participants;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    private $_profession = ['Student', 'Employed'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function read()
    {
        $participants = Participants::all();
        return response()->json([
            "data" => $participants
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $guests = $request->guests;
        if (!$this->check_guests($guests)) {
            return response()->json([
                "message" => $guests." are not allowed. You cannot have more than 2 guests"
            ], 200);
        }
        $profession = $request->profession;
        if (!in_array($profession, $this->_profession)) {
            return response()->json([
                "message" => $profession . " is not allowed to meet, only Student and Employee can join"
            ], 200);
        }
        $participant = new Participants;
        $participant->name = $request->name;
        $participant->age = $request->age;
        $participant->dob = $request->dob;
        $participant->profession = $profession;
        $participant->locality = $request->locality;
        $participant->guests = $guests;
        $participant->address = $request->address;
        $participant->save();

        return response()->json([
            "message" => "Participant added successfully"
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $guests = $request->guests;
        if (!$this->check_guests($guests)) {
            return response()->json([
                "message" => $guests." are not allowed. You cannot have more than 2 guests"
            ], 200);
        }
        $profession = $request->profession;
        if (!in_array($profession, $this->_profession)) {
            return response()->json([
                "message" => $profession . " is not allowed to meet, only Student and Employee can join"
            ], 200);
        }
        if (Participants::where('id', $id)->exists()) {
            $participant = Participants::find($id);
            $participant->name = !empty($request->name) ? $request->name : $participant->name;
            $participant->age = !empty($request->age) ? $request->age : $participant->age;
            $participant->dob = !empty($request->dob) ? $request->dob : $participant->dob;
            $participant->profession = !empty($request->profession) ? $request->profession : $participant->profession;
            $participant->locality = !empty($request->locality) ? $request->locality : $participant->locality;
            $participant->guests = !empty($request->guests) ? $request->guests : $participant->guests;
            $participant->address = !empty($request->address) ? $request->address : $participant->address;
            $participant->save();

            return response()->json([
                "message" => "Participant record updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Please make sure the id is correct"
            ], 404);
        }
    }
    public function check_guests($g) {
        return $g > 2 ? false : true;
    }
}
