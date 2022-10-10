<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservaciones extends Model
{
    use HasFactory;
    protected $table = 'reservacion';
    protected $fillable = [
        'fecha_llegada',
        'fecha_salida',
        'precio_noche',
        'noches',
        'total',
        'id_hostal',
        'huesped_usuario',
        'anfitrion_usuario',
    ];

    public $incrementing = true;
    public $timestamps = false;

    /* public function usuarios() {
        return $this->belongsTo('App\Models\User', 'user');
    } */
}
