<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\VideoResource;

class VideosController extends Controller
{
    
    public function index()
    {
        $videos = VideoResource::collection(videos::all());
        return Inertia::render('Videos/Index',compact('videos'));
        // $images = ImagenResource::collection(imagenes::all());
        // return Inertia::render('Imagenes/Index',compact('images'));
    }

    public function create()
    {
        return Inertia::render('Videos/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required','min:3'],
            'url_link'=>['required','min:3'],
        ]);

        videos::create([
            'nombre' => $request->nombre,
            'url_link' => $request->url_link,
        ]);

        return redirect('misvideos');
    }

    public function show(videos $videos)
    {
        
    }


    public function edit($id)
    {
        $video = videos::findOrFail($id);
        return Inertia::render('Videos/Edit',compact('video'));
       
    }

    public function update(Request $request, $id)
    {
        $video =videos::findOrFail($id); 

        $request->validate([
            'nombre'=>['required','min:3'],
            'url_link'=>['required','min:3'],
        ]);

        $video->update([
            'nombre' => $request->nombre,
            'url_link' => $request->url_link
        ]);

        return redirect('misvideos');
    }

   
    public function destroy($id)
    {
        $video =videos::findOrFail($id);
        $video->delete();
        return redirect()->back();
    }
}
