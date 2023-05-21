<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\detalle_eventos;
use Inertia\Inertia;
use App\Http\Resources\EventoResource;

class DetalleEventosController extends Controller
{
    
    public function index()
    {
        $eventos = EventoResource::collection(detalle_eventos::all());
        return Inertia::render('Eventos/Index',compact('eventos'));
    }

    public function create()
    {
        return Inertia::render('Eventos/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagen'=>['required','image'],
            'nombre'=>['required','min:3'],
            'detalle'=>['required','min:3'],
            'precio'=>['required'],
            'duracion'=>['required'],
        ]);

        
        if($request->hasFile('imagen')){
            $precio = (float)$request->precio;
            $duracion = (int)$request->duracion;
            $imagen = $request->file('imagen')->store('eventos');
            detalle_eventos::create([
                'nombre' => $request->nombre,
                'imagen' => $imagen,
                'detalle' => $request->detalle,
                'precio' => $precio,
                'duracion' => $duracion,
            ]);

            return redirect('miseventos');
        }
        return Redirect::back();
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
