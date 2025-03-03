<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'tbl_provincias';
    protected $primaryKey = 'cod';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'comunidad_id'
    ];
}