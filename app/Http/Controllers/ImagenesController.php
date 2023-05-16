<?php

namespace App\Http\Controllers;

use App\Models\imagenes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ImagenesController extends Controller
{
    
    public function index()
    {
        $imagenes = imagenes::all();
        return Inertia::render('Imagenes/Index',['imagenes'=>$imagenes]);
    }

    public function create()
    {
      return Inertia::render('Imagenes/Create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre'=>'required|max:150']);
        $request->validate(['imagen'=>'required']);
        $imagen = new imagenes($request ->input());
        $imagen->save();
        return redirect('misimagenes');
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
