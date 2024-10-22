<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Evento extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin'];
    protected $table = "evento";
}
