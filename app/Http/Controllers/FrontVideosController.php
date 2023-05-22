<?php

namespace App\Http\Controllers;
use App\Models\videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Resources\VideoResource;
use Inertia\Inertia;

class FrontVideosController extends Controller
{
    public function index(){
        
        $videos = VideoResource::collection(videos::all());


            return Inertia::render('Videos', [
                'videos' => $videos,
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]);
        
    }
}
