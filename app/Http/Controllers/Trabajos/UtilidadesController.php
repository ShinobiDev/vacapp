<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilidad;

class UtilidadesController extends Controller
{
    public function index()
    {
        $cliente = auth()->user()->cliente_id;
        $cliente = (int)$cliente;
    	$utilidades = Utilidad::where('cliente_id', $cliente)
        ->get();
    	//dd($utilidades);

    	return view('Trabajos.Utilidades.index', compact('utilidades'));
    }

    public function crear()
    {	
    	return view('Trabajos.Utilidades.crear');
    }

    public function almacenar(Request $request)
    {
    	//dd($request);
        $cliente = auth()->user()->cliente_id;
    	$utilidad = new Utilidad;

    	$utilidad->cliente_id = (int)$cliente;
        $utilidad->nombreUtilidad = $request->get('nombreUtilidad');
        $utilidad->descripcion = $request->get('descripcion');
    	$utilidad->save();

    	return back()->with('flash','La nueva utilidad ha sido creado');
    }

    public function actualizar(Request $request, $utilidad_id)
    {	
    	//dd($request);
    	$utilidad = Utilidad::where('id', $utilidad_id)->first();
    	$utilidad->nombreUtilidad = $request->get('nombreUtilidad');
    	$utilidad->descripcion = $request->get('descripcion');
    	$utilidad->update();

        $utilidades = Utilidad::all();
        
        //dd($sedes);
        return back()->with('flash','Se actualizo la información exitosamente');
        //return view('admin.variables.index')->with('success','Se actualizo exitosamente');
    }
}
