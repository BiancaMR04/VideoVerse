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

    public function index2()
    {
        $videos = Video::all();

        return view('home', ['videos' => $videos]);
    }

    public function show($id)
{
    $video = Video::find($id);
    return view('view_video', $video);
}

}