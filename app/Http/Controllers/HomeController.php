<?php

namespace App\Http\Controllers;

use App\Models\Hostales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('host',['only'=>'index']);
        $this->middleware('host',['only'=>'create']);
        $this->middleware('host',['only'=>'store']);
        $this->middleware('host',['only'=>'show']);
        $this->middleware('host',['only'=>'edit']);
        $this->middleware('host',['only'=>'update']);
        $this->middleware('host',['only'=>'destroy']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        if($request) {
            $consulta = trim($request->get('buscar'));
            $hostales = Hostales::where('nombre', 'LIKE', '%' . $consulta . '%')
                ->where('anfitrion_user', '=', Auth::user()->user)
                ->orderBy('id', 'asc')
                ->get();

            return view('host.index', ['hostales' => $hostales, 'buscar' => $consulta]);
        }   
        $hostales = Hostales::where('anfitrion_user', '=', Auth::user()->user)
            ->orderBy('id', 'asc')
            //->paginate(5);
            ->get();
        //$hostales::paginate(5);
        return view('host.index')->with('hostales',$hostales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('host.create');
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
        $hostal = new Hostales();
        $hostal->nombre = $request->input('nombre');
        $hostal->descripcion = $request->input('descripcion');
        $hostal->servicios = $request->input('servicios');
        $hostal->precio_noche = $request->input('precio');
        $hostal->direccion = $request->input('direccion');
        $hostal->ciudad = $request->input('ciudad');
        $hostal->municipio = $request->input('municipio');
        $hostal->estado = $request->input('estado');
        $hostal->foto = $request->file('foto');
        /* $nameImg = time().'.'.$hostal->foto->getClientOriginalExtension();
        $destinoImg = public_path('img/hostales');
        $hostal->foto->move($destinoImg, $nameImg); */
        if ($request->hasFile('foto')) {
            $hostal->foto = $request->file('foto')->store('uploads','public');
        }
        $hostal->anfitrion_user = Auth::user()->user;
        $hostal->save(); //Guarda los datos en la BD

        return redirect()->route('home.index');
        //return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hostales $hostales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hostal = Hostales::findOrFail($id);
        return view('host.edit', compact('hostal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hostal = Hostales::findOrFail($id);
        Storage::delete('public/'.$hostal->foto);
        $hostal->nombre = $request->input('nombre');
        $hostal->descripcion = $request->input('descripcion');
        $hostal->servicios = $request->input('servicios');
        $hostal->precio_noche = $request->input('precio');
        $hostal->direccion = $request->input('direccion');
        $hostal->ciudad = $request->input('ciudad');
        $hostal->municipio = $request->input('municipio');
        $hostal->estado = $request->input('estado');
        $hostal->foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $hostal->foto = $request->file('foto')->store('uploads','public');
        }
        $hostal->save(); //Guarda los datos en la BD

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hostal = Hostales::findOrFail($id);
        $hostal->delete();
        //return view('host.index');
        return redirect()->route('home.index');
    }
}
