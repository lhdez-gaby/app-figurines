<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fecha_eventos extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','evento_id','fecha','hora','estado','direccion','telefono'];
}
