<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        return view('home_visitante', ['videos' => $videos]);
    }

    public function show($id)
    {
    $video = Video::find($id);

    if (!$video) {
        abort(404); 
    }

    return view('view_video', compact('video'));
    }
}
