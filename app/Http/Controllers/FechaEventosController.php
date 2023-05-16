<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\detalle_eventos;
use App\Models\fecha_eventos;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class FechaEventosController extends Controller
{
    
    public function index()
    {
        $eventosReservados = fecha_eventos::select('fecha_eventos.id','fecha','hora','estado','direccion','telefono')
        ->join('users','users.id','=','fecha_eventos.user_id')
        ->join('detalle_eventos','detalle_eventos.id','=','fecha_eventos.evento_id')
        ->paginate(10);
        
        $users = user::all();

        $eventos = detalle_eventos::all();
        return Inertia::render('EventosReservados/Index', ['eventosReservados'=>$eventosReservados, 'users'=> $users,'eventos'=>$eventos]);
    }

    
    public function create()
    {
        
        return Innertia::render('EventosReservados/Create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required | numeric',
            'evento_id' => 'required | numeric',
            'fecha' => 'required | date',
            'hora' => 'required | time',
            'estado' => 'required | max:30',
            'direccion' => 'required | longText',
            'telefono' => 'required | max: 15',
        ]);
        $eventoReservado = new fecha_eventos($request->input());
        $eventoReservado->save();
        return redirect('miseventos');
    }

    
    public function show(fecha_eventos $eventoReservado)
    {
        
    }

    
    public function edit(fecha_eventos $eventoReservado)
    {
        return Inertia::render('Eventos/Edit', ['imagen'=>$eventoReservado]);
    }

    
    public function update(Request $request, fecha_eventos $eventoReservado)
    {
        $request->validate([
            'user_id' => 'required | numeric',
            'evento_id' => 'required | numeric',
            'fecha' => 'required | date',
            'hora' => 'required | time',
            'estado' => 'required | max:30',
            'direccion' => 'required | longText',
            'telefono' => 'required | max: 15',
        ]);
        $eventoReservado->update($request->input());
        return redirect('miseventos');
    }

   
    public function destroy(fecha_eventos $eventoReservado)
    {
        $eventoReservado ->delete();
        return redirect('miseventos');
    }

    public function reports(){
        $eventosReservados = fecha_eventos::select('fecha_eventos.id','fecha','hora','estado','direccion','telefono')
        ->join('users','users.id','=','fecha_eventos.user_id')
        ->join('detalle_eventos','detalle_eventos.id','=','fecha_eventos.evento_id')
        ->get();
        
        $users = user::all();

        $eventos = detalle_eventos::all();
        return Inertia::render('EventosReservados/Reports', ['eventosReservados'=>$eventosReservados, 'users'=> $users,'eventos'=>$eventos]);
    }
}
