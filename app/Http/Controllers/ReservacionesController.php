<?php

namespace App\Http\Controllers;

use App\Models\Hostales;
use App\Models\Reservaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservacionesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {     
        $reservaciones = Reservaciones::where('anfitrion_usuario', '=', Auth::user()->user)
            ->OrWhere('huesped_usuario', '=', Auth::user()->user)
            ->orderBy('id', 'asc')
            //->paginate(5);
            ->get();
        //$hostales::paginate(5);

        return view('reservacion.index')->with('reservaciones', $reservaciones);
    }
}
