<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\imagenes;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Resources\ImagenResource;

class FrontImagenesController extends Controller
{
    public function index(){

        $images = ImagenResource::collection(imagenes::all());

       
            return Inertia::render('Imagenes', [
                'imagenes' => $images,
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]);
        
    }
}
