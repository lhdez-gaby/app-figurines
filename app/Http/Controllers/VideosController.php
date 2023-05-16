<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VideosController extends Controller
{
    
    public function index()
    {
        $videos = videos::all();
        return Inertia::render('Videos/Index',['videos'=>$videos]);
    }

    public function create()
    {
        return Inertia::render('Videos/Create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required|max:150']);
        $video = new videos($request ->input());
        $video->save();
        return redirect('misvideos');
    }

    public function show(videos $videos)
    {
        
    }


    public function edit(videos $video)
    {
        return Inertia::render('Videos/Edit', ['video'=>$video]);
    }

    public function update(Request $request, videos $video)
    {
        $request->validate(['name'=>'required|max:150']);
        $video->update($request->all());
        return redirect('misvideos');
    }

   
    public function destroy(videos $video)
    {
        $video->delete();
        return redirect('misvideos');
    }
}
