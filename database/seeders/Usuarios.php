<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anfi_user=User::create([
            'name' => 'Anfitrión Test',
            'user' => 'anfiTest',
            'email' => 'anfitrion.test@hostapp.com',
            'password' => Hash::make('anfi'),
            'telefono'  => '9191504427',
            'tipo_usuario' => 'anfitrion',
        ]);

        $hues_user=User::create([
            'name' => 'Huésped Test',
            'user' => 'huesTest',
            'email' => 'huesped.test@hostapp.com',
            'password' => Hash::make('hues'),
            'telefono'  => '9191504427',
            'tipo_usuario' => 'huesped',
        ]);
    }
}
