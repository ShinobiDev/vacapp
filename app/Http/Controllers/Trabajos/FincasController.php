<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Finca;

class FincasController extends Controller
{
    public function index()
    {
        $cliente = auth()->user()->cliente_id;
        //dd($cliente);
    	$fincas = Finca::where('cliente_id', (int)$cliente)->get();
    	//dd($fincas);

    	return view('Trabajos.Fincas.index', compact('fincas'));
    }

    public function crear()
    {
    	return view('Trabajos.Fincas.crear');
    }

    public function almacenar(Request $request)
    {
    	//dd($request);
        $cliente = auth()->user()->cliente_id;
        //dd($cliente);

    	$finca = new Finca;

        $finca->cliente_id = (int)$cliente;
    	$finca->nombreFinca = $request->get('nombreFinca');
        $finca->departamento = $request->get('departamento');
        $finca->municipio = $request->get('municipio');
    	$finca->direccion = $request->get('direccion');
    	$finca->telefono = $request->get('telefono');
    	$finca->nombreEncargado = $request->get('nombreEncargado');
    	$finca->save();

    	return back()->with('flash','¡La finca ha sido creada exitosamente!');
    }

    public function actualizar(Request $request, $finca_id)
    {	
    	//dd($request);
    	$finca = Finca::where('id', $finca_id)->first();
    	$finca->nombreFinca = $request->get('nombreFinca');
    	$finca->departamento = $request->get('departamento');
    	$finca->municipio = $request->get('municipio');
    	$finca->direccion = $request->get('direccion');
    	$finca->telefono = $request->get('telefono');
    	$finca->nombreEncargado = $request->get('nombreEncargado');
    	$finca->update();

        $fincas = Finca::all();
        
        //dd($sedes);
        return back()->with('flash','Se actualizo la información exitosamente');
        //return view('admin.variables.index')->with('success','Se actualizo exitosamente');
    }
}
