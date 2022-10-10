<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostales extends Model
{
    use HasFactory;
    protected $table = 'hostal';
    protected $fillable = [
        'nombre',
        'descripcion',
        'servicios',
        'precio_noche',
        'direccion',
        'ciudad',
        'municipio',
        'estado',
        'foto',
        'anfitrion_user'
    ];
    public $incrementing = true;
    public $timestamps = false;
}
