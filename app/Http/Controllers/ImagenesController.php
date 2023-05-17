<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\imagenes;
use Inertia\Inertia;
use App\Http\Resources\ImagenResource;

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

            // return Redirect::route('misimagenes.index');
            return redirect('misimagenes');
        }

        // $imagen = new imagenes($request ->input());
        // $imagen->save();
        return Redirect::back();
    }

    public function show(imagenes $imagenes)
    {
        
    }


    public function edit(imagenes $imagen)
    {
        return Inertia::render('Imagenes/Edit', ['imagen'=>$imagen]);
    }

    public function update(Request $request, imagenes $imagen)
    {
        $request->validate(['name'=>'required|max:150']);
        $imagen->update($request->all());
        return redirect('misimagenes');
    }

  
    public function destroy(imagenes $imagen)
    {
        $imagen->delete();
        return redirect('misimagenes');
    }
}
