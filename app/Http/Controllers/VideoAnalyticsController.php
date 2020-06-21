<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class VideoAnalyticsController extends Controller{

    public function index()
    {
        return view('videos');
    }
    public function show($id)
    {
        return view('showvideo', ['id' => $id]);
    }
}