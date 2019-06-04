<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipo;

class TiposController extends Controller
{
    public function index()
    {
    	$tipos = Tipo::all();
    	//dd($razas);

    	return view('Trabajos.Tipos.index', compact('tipos'));
    }

    public function crear()
    {
    	return view('Trabajos.Tipos.crear');
    }

    public function almacenar(Request $request)
    {
    	//dd($request);
        $cliente = auth()->user()->cliente_id;
    	$tipo = new Tipo;
        $tipo->cliente_id = $cliente;
    	$tipo->nombreTipo = $request->get('nombreTipo');
        $tipo->descripcion = $request->get('descripcion');
    	$tipo->save();

    	return back()->with('flash','El tipo de animal ha sido creada');
    }

    public function actualizar(Request $request, $tipo_id)
    {	
    	//dd($request);
    	$tipo = Tipo::where('id', $tipo_id)->first();
    	$tipo->nombreTipo = $request->get('nombreTipo');
    	$tipo->descripcion = $request->get('descripcion');
    	$tipo->update();

        $tipos = Tipo::all();
        
        //dd($sedes);
        return back()->with('flash','Se actualizo la información exitosamente');
        //return view('admin.variables.index')->with('success','Se actualizo exitosamente');
    }
}
