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
    public function store_bufferend_event(Request $request)
    {
        $event = new EventLog();

        $event->video_id = $request->video_id;
        $event->user_id = $request->user_id;
        $event->event_name = $request->event_name;

        $event->save();
    }
    public function store_bufferstart_event(Request $request)
    {
        $event = new EventLog();

        $event->video_id = $request->video_id;
        $event->user_id = $request->user_id;
        $event->event_name = $request->event_name;

        $event->save();
    }
    public function store_ended_event(Request $request)
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
    public function store_error_event(Request $request)
    {
        $event = new EventLog();

        $event->video_id = $request->video_id;
        $event->user_id = $request->user_id;
        $event->event_name = $request->event_name;
        $event->message = $request->message;
        $event->method = $request->methodd;
        $event->name = $request->name;

        $event->save();
    }
    public function store_function_error(Request $request)
    {
        $event = new EventLog();

        $event->video_id = $request->video_id;
        $event->user_id = $request->user_id;
        $event->event_name = $request->event_name;
        $event->message = $request->message;

        $event->save();
    }
    public function store_pause_event(Request $request)
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
    public function store_progress_event(Request $request)
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
    public function store_seeked_event(Request $request)
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
    public function store_timeupdate_event(Request $request)
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
    public function store_volumechange_event(Request $request)
    {
        $event = new EventLog();

        $event->video_id = $request->video_id;
        $event->user_id = $request->user_id;
        $event->event_name = $request->event_name;
        $event->volume = $request->volume;

        $event->save();
    }
    public function store_chapterchange_event(Request $request)
    {
        $event = new EventLog();

        $event->video_id = $request->video_id;
        $event->user_id = $request->user_id;
        $event->event_name = $request->event_name;
        $event->chapter_index = $request->chapter_index;
        $event->chapter_startTime = $request->chapter_startTime;
        $event->chapter_title = $request->chapter_title;

        $event->save();
    }
}