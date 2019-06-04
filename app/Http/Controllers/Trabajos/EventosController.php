<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eventos;
use App\Pais;
use App\Ciudad;

class EventosController extends Controller
{
    public function index()
    {
        $cliente = auth()->user()->cliente_id;

    	$eventos = Eventos::select('nombreEvento','nombrePais','eventos.descripcion','ciudad')
        ->join('pais','eventos.pais_id','pais.id')
        ->where('cliente_id', (int)$cliente)
        ->get();

        $paises = Pais::all();
        $ciudades = Ciudad::all();

        //dd($eventos);

    	return view('Trabajos.Eventos.index', compact('eventos','paises','ciudades'));
    }

    public function crear()
    {
        $paises = Pais::all();
        $ciudades = Ciudad::all();
    	return view('Trabajos.Eventos.crear', compact('paises','ciudades'));
    }

    public function almacenar(Request $request)
    {
    	//dd($request);
        $cliente = auth()->user()->cliente_id;

    	$evento = new Eventos;
        $evento->cliente_id = (int)$cliente;
    	$evento->nombreEvento = $request->get('nombreEvento');
        $evento->descripcion = $request->get('descripcion');
        $evento->pais_id = $request->get('pais_id');
        $evento->ciudad = $request->get('ciudad');
    	$evento->save();

    	return back()->with('flash','El evento ha sido creado');
    }

    public function actualizar(Request $request, $tipo_id)
    {	
    	//dd($request);
    	$evento = Evento::where('id', $evento_id)->first();
    	$evento->nombreEvento = $request->get('nombreEvento');
    	$evento->descripcion = $request->get('descripcion');
        $evento->pais_id = $reques->get('pais_id');
        $evento->ciudad = $request->get('ciudad');
    	$evento->update();

        $tipos = Tipo::all();
        
        //dd($sedes);
        return back()->with('flash','Se actualizo la información exitosamente');
        //return view('admin.variables.index')->with('success','Se actualizo exitosamente');
    }
}
