<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenerosController extends Controller
{
    public function index()
    {
    	$generos = Genero::all();
    	//dd($generos);

    	return view('Trabajos.Generos.index', compact('generos'));
    }

    public function crear()
    {
    	return view('Trabajos.Generos.crear');
    }

    public function almacenar(Request $request)
    {
    	//dd($request);
    	$genero = new Genero;

    	$genero->nombreGenero = $request->get('nombreGenero');
        $genero->descripcion = $request->get('descripcion');
    	$genero->save();

    	return back()->with('flash','El genero ha sido creado');
    }

    public function actualizar(Request $request, $genero_id)
    {	
    	//dd($request);
    	$genero = genero::where('id', $genero_id)->first();
    	$genero->nombreGenero = $request->get('nombreGenero');
    	$genero->descripcion = $request->get('descripcion');
    	$genero->update();

        $generos = Genero::all();
        
        //dd($sedes);
        return back()->with('flash','Se actualizo la información exitosamente');
        //return view('admin.variables.index')->with('success','Se actualizo exitosamente');
    }
}
