<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = ['evento_id', 'pago', 'dni'];
    protected $table = "entrada";

    // Definición de la relación con el modelo Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
