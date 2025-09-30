<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model
{
    use SoftDeletes; // 👈 permite soft delete
    protected $fillable = ['nombre'];
}
