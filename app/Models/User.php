<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'dni',
        'name',
        'email',
        'telefono',
        'direccion',
        'fecha_alta',
        'tipo',
        'password',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'operario_encargado');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'LIKE', "%$term%")
                     ->orWhere('email', 'LIKE', "%$term%")
                     ->orWhere('telefono', 'LIKE', "%$term%");
    }
}
