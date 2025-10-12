<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepuestoVehiculo extends Model
{
    // Si quieres usar factories con la tabla pivote
    protected $fillable = [
        'repuesto_id',
        'vehiculo_id'
    ];
}
