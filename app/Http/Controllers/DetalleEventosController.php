<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\detalle_eventos;
use Inertia\Inertia;
use App\Http\Resources\EventoResource;
use Illuminate\Support\Facades\Storage;

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

 
    public function edit($id)
    {
       
        $evento = detalle_eventos::findOrFail($id);
        
        return Inertia::render('Eventos/Edit',compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $evento =detalle_eventos::findOrFail($id);
        $imagen = $evento->imagen;

        $request->validate([
            'nombre'=>['required','min:3'],
            'detalle'=>['required','min:3'],
            'precio'=>['required'],
            'duracion'=>['required'],
        ]);

        if($request->hasFile('imagen')){
            Storage::delete($evento->imagen);
            $imagen = $request->file('imagen')->store('eventos');
        }

        $precio = (float)$request->precio;
        $duracion = (int)$request->duracion;

        $evento->update([
            'nombre' => $request->nombre,
            'imagen' => $imagen,
            'detalle' =>$request->detalle,
            'precio' =>$precio,
            'duracion' =>$duracion
        ]);

        return redirect('miseventos');  
    }

    public function destroy($id)
    {
        $evento = detalle_eventos::findOrFail($id);
        
        Storage::delete($evento->imagen);
        $evento->delete();
        return redirect()->back();
      
    }
}
