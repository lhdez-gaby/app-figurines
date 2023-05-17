<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_eventos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','imagen','detalle','precio','duracion'];

    public function eventosRegistrados(){
        return $this->hasMany(fecha_eventos::class);
    }
}
