<?php

namespace App\Http\Controllers;
use App\Models\detalle_eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Resources\EventoResource;
use Inertia\Inertia;

class FrontEventosController extends Controller
{
    public function index(){
        $eventos = EventoResource::collection(detalle_eventos::all());
        
        return Inertia::render('Eventos', [
            'eventos' => $eventos,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
