<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fecha_eventos extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','evento_id','fecha','hora','estado','direccion','telefono'];

    public function evento(){
        return $this->belongsTo(detalle_eventos::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
