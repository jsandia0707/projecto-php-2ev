<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = [
        'cif',
        'nombre',
        'telefono',
        'correo',
        'cuenta_corriente',
        'pais',
        'moneda',
        'importe_cuota'
    ];

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'id_cliente');
    }

    public function cuotas()
    {
        return $this->hasMany(Cuota::class, 'id_cliente');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('nombre', 'LIKE', "%$term%")
                     ->orWhere('correo', 'LIKE', "%$term%")
                     ->orWhere('telefono', 'LIKE', "%$term%");
    }
}
