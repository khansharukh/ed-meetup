<?php

namespace App\Http\Controllers;

use App\Models\Participants;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch_participants()
    {
        $participants = Participants::get()->toJson(JSON_PRETTY_PRINT);
        return response($participants, 200);
    }
}
