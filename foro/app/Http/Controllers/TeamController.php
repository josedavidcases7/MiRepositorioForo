<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public static function getIdByParams($theme, $teamName)
    {
        $eventId = EventController::getIdByEventName($theme);
        if ($eventId == null) {
            return null;
        }
        
        $id = Team::where('event_id', $eventId)
                  ->where('team_name', $teamName)
                  ->value('id');
                  
        return $id;
    }

    public function insert(Request $request)
    {
        $request->validate([
            'eventId' => 'required|integer',
            'teamName' => 'required|string',
        ]);

        $eventId = $request->input('eventId');
        $teamName = $request->input('teamName');

        $team = new Team();
        $team->event_id = $eventId;
        $team->team_name = $teamName;
        $team->save();

        return response()->json($team, 201);
    }
}
