<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = ['repuesto_id','vehiculo_id'];

    // Relación muchos a muchos con Repuesto
    public function repuestos()
    {
        return $this->belongsToMany(Repuesto::class, 'repuesto_vehiculo', 'vehiculo_id', 'repuesto_id');
    }
}
