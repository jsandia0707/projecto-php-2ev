<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $table = 'cuotas';
    protected $primaryKey = 'id_cuota';
    public $timestamps = false;

    protected $fillable = [
        'id_cliente',
        'concepto',
        'fecha_emision',
        'importe',
        'pagada',
        'fecha_pago',
        'notas'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('concepto', 'LIKE', "%$term%")
                     ->orWhere('notas', 'LIKE', "%$term%");
    }
}
