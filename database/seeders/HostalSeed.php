<?php

namespace Database\Seeders;

use App\Models\Hostales;
use Illuminate\Database\Seeder;

class HostalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hostal_test=Hostales::create([
            'descripcion' => 'hostal de prueba',
            'servicios' =>'internet, agua caliente, TV por cable',
            'precio_noche' => 250,
            'direccion' => 'periférico sur ote. s/n B. Betania',
            'ciudad' => 'Ocosingo',
            'municipio' => 'Ocosingo',
            'estado' => 'Chiapas',
            'anfitrion_user' => 'anfiTest'
        ]);
    }
}
