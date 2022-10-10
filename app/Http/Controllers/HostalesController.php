<?php

namespace App\Http\Controllers;

use App\Models\Hostales;
use App\Models\Reservaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class HostalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('huesped',['only'=>'index']);
        $this->middleware('huesped',['only'=>'create']);
        $this->middleware('huesped',['only'=>'store']);
        $this->middleware('huesped',['only'=>'show']);
        $this->middleware('huesped',['only'=>'edit']);
        $this->middleware('huesped',['only'=>'update']);
        $this->middleware('huesped',['only'=>'destroy']);
    }

    public function index(Request $request)
    {
        if($request) {
            $place = trim($request->get('place'));
            $hostales = Hostales::where('ciudad', 'LIKE', '%' . $place . '%')
                ->OrWhere('municipio', 'LIKE', '%' . $place . '%')
                ->OrWhere('estado', 'LIKE', '%' . $place . '%')
                ->orderBy('id', 'asc')
                ->get();

            return view('hostal.index', ['hostales' => $hostales, 'place' => $place]);
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar
        $hostal = new Reservaciones();
        $hostal->fecha_llegada = $request->input('f_llegada');
        $hostal->fecha_salida = $request->input('f_salida');
        $hostal->precio_noche = $request->input('precio');

        $llegada = new DateTime($request->input('f_llegada'));
        $salida = new DateTime($request->input('f_salida'));
        $diferencia = $llegada->diff($salida);
 
        $hostal->noches = $diferencia->d;
        $hostal->total = $hostal->precio_noche * $hostal->noches;
        $hostal->id_hostal = $request->input('id_hostal');
        $hostal->huesped_usuario = Auth::user()->user;
        $hostal->anfitrion_usuario = $request->input('user_anfi');
        $hostal->save(); //Guarda los datos en la BD

        return redirect('infoReserva');
        //return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hostal = Hostales::findOrFail($id);
        return view('hostal.details', compact('hostal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hostales  $hostales
     * @return \Illuminate\Http\Response
     */
    public function edit(Hostales $hostales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostales  $hostales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hostales $hostales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostales  $hostales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostales $hostales)
    {
        //
    }
}
