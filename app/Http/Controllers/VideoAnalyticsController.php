<?php

namespace App\Http\Controllers;

use App\EventLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoAnalyticsController extends Controller{

    public function index()
    {
        return view('videos');
    }
    public function show($id)
    {
        return view('showvideo', ['id' => $id]);
    }

    public function store_play_event(Request $request)
    {
        $event = new EventLog();

        $event->video_id = $request->video_id;
        $event->user_id = $request->user_id;
        $event->event_name = $request->event_name;
        $event->duration = $request->duration;
        $event->percent = $request->percent;
        $event->seconds = $request->seconds;

        $event->save();
    }
}