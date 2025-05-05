<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public static function getIdByEventName($theme)
    {
        $id = Event::where('theme', $theme)->value('event_id');
        return $id;
    }

    public function insert(Request $request)
    {
        $request->validate([
            'dateTime' => 'required|date',
            'duration' => 'required|integer',
            'theme' => 'required|string',
        ]);

        $dateTime = $request->input('dateTime');
        $duration = $request->input('duration');
        $theme = $request->input('theme');


        $event = new Event();
        $event->date_time = $dateTime;
        $event->duration = $duration;
        $event->theme = $theme;
        $event->save();

        return response()->json($event, 201);
    }

}
