<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\detalle_eventos;
use Inertia\Inertia;

class DetalleEventosController extends Controller
{
    
    public function index()
    {
        $eventos = detalle_eventos::all();
        return Inertia::render('Eventos/Index', ['eventos'=>$eventos]);
    }

    public function create()
    {
        return Innertia::render('Eventos/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' =>'required|max:200',
            'imagen' =>'required|max:300',
            'detalle' =>'required|longText',
            'precio' =>'required|float',
            'duracion' =>'required|numeric'
        ]);
        $evento = new detalle_eventos($request->input());
        $evento->save();
        return redirect('miseventos');
    }

 
    public function show(detalle_eventos $detalle_eventos)
    {
        //
    }

 
    public function edit(detalle_eventos $evento)
    {
        return Inertia::render('Eventos/Edit', ['evento'=>$evento]);
    }

    public function update(Request $request, detalle_eventos $evento)
    {
        $request->validate([
            'nombre' =>'required|max:200',
            'imagen' =>'required|max:300',
            'detalle' =>'required|longText',
            'precio' =>'required|float',
            'duracion' =>'required|numeric'
        ]);   
        $evento->update($request->input());
        return redirect('eventos');
    }

    public function destroy(detalle_eventos $evento)
    {
        $evento ->delete();
        return redirect('eventos');
    }
}
