<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\imagenes;
use Inertia\Inertia;
use App\Http\Resources\ImagenResource;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    
    public function index()
    {
        $images = ImagenResource::collection(imagenes::all());
        return Inertia::render('Imagenes/Index',compact('images'));
    }

    public function create()
    {
      return Inertia::render('Imagenes/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagen'=>['required','image'],
            'nombre'=>['required','min:3']
        ]);

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen')->store('imagenes');
            imagenes::create([
                'nombre' => $request->nombre,
                'imagen' => $imagen
            ]);

            // return Redirect::route('misimagenes.index')->with('message', 'Imagen agregada de manera exitosa.');
            return redirect('misimagenes');
        }

        
        return redirect()->back();
    }

    public function show(imagenes $imagenes)
    {
        
    }


    public function edit($id)
    {
        $imagen = imagenes::findOrFail($id);
    
        return Inertia::render('Imagenes/Edit',compact('imagen'));
    }

    public function update(Request $request, $id)
    {
        $image =imagenes::findOrFail($id);
        $imagen = $image->imagen;
        
        $request->validate([
            'nombre'=>['required','min:3']
        ]);
        
        
        
         if($request->hasFile('imagen')){
            
            Storage::delete($image->imagen);
            $imagen = $request->file('imagen')->store('imagenes');
           
        }
        
        $image->update([
            'nombre' => $request->nombre,
            'imagen' => $imagen
        ]);

        return redirect('misimagenes');
    }

  
    public function destroy($id)
    {
        $image =imagenes::findOrFail($id);
        
        Storage::delete($image->imagen);
        $image->delete();
        return redirect()->back();
    }
}
