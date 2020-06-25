<?php

namespace App\Http\Controllers;

use App\EventLog;
use App\Http\Controllers\Controller;
use App\IntervalsLog;
use Illuminate\Http\Request;

class VimeoIntervalsController extends Controller{

    public function index()
    {
        return view('videos');
    }
    public function show($id)
    {
        return view('showvideo', ['id' => $id]);
    }

    public function store_error_event(Request $request)
    {
        $event = new EventLog();
        $data = $request->json()->all();

        $event->video_id = $data['video_id'];
        $event->user_id = $data['user_id'];
        $event->event_name = $data['event_name'];
        $event->message = $data['message'];
        $event->method = $data['methodd'];
        $event->name = $data['name'];

        $event->save();
    }
    public function store_function_error(Request $request)
    {
        $event = new EventLog();
        $data = $request->json()->all();

        $event->video_id = $data['video_id'];
        $event->user_id = $data['user_id'];
        $event->event_name = $data['event_name'];
        $event->message = $data['message'];

        $event->save();
    }


    public function record_intervals(Request $request)
    {
        $intervals = new IntervalsLog();

        $data = $request->json()->all();

        $intervals->user_id = $data['user_id'];
        $intervals->video_id = $data['video_id'];
        $intervals->start_interval = $data['start_interval'];
        $intervals->end_interval = $data['end_interval'];
        $intervals->video_duration = $data['video_duration'];

        $intervals->save();
    }
}