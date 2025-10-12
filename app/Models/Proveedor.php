<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes; // 👈 permite soft delete
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'direccion'
    ];

    public function repuestos()
    {
        return $this->hasMany(Repuesto::class);
    }

}
