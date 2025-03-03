<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'id_tarea';
    public $timestamps = false;

    protected $fillable = [
        'id_cliente',
        'persona_contacto',
        'telefono_contacto',
        'descripcion',
        'correo_contacto',
        'direccion',
        'poblacion',
        'codigo_postal',
        'provincia',
        'estado',
        'operario_encargado',
        'fecha_realizacion',
        'anotaciones_anteriores',
        'anotaciones_posteriores',
        'fichero_resumen'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function operario()
    {
        return $this->belongsTo(User::class, 'operario_encargado');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('descripcion', 'LIKE', "%$term%")
                     ->orWhere('persona_contacto', 'LIKE', "%$term%")
                     ->orWhere('telefono_contacto', 'LIKE', "%$term%")
                     ->orWhere('correo_contacto', 'LIKE', "%$term%")
                     ->orWhere('poblacion', 'LIKE', "%$term%")
                     ->orWhere('estado', 'LIKE', "%$term%");
    }
}