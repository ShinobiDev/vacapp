<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Raza;
use App\Tipo;
use App\Clasificacion;

class RazasController extends Controller
{
    public function index()
    {
    	$razas = Raza::all();
    	//dd($razas);

    	return view('Trabajos.Razas.index', compact('razas'));
    }

    public function crear()
    {
        $tipos = Tipo::all();
    	return view('Trabajos.Razas.crear', compact('tipos'));
    }

    public function almacenar(Request $request)
    {
    	//dd($request);
    	$raza = new Raza;

        $raza->tipo_id = $request->get('tipo_id');
    	$raza->nombreRaza = $request->get('nombreRaza');
        $raza->descripcion = $request->get('descripcion');
        $raza->promedioMacho = $request->get('promedioMacho');
        $raza->promedioHembra = $request->get('promedioHembra');
    	$raza->save();

    	return back()->with('flash','La raza ha sido creada');
    }

    public function actualizar(Request $request, $raza_id)
    {	
    	//dd($request);
    	$raza = Raza::where('id', $raza_id)->first();
    	$raza->nombreRaza = $request->get('nombreRaza');
    	$raza->descripcion = $request->get('descripcion');
    	$raza->update();

        $razas = Raza::all();
        
        //dd($sedes);
        return back()->with('flash','Se actualizo la información exitosamente');
        //return view('admin.variables.index')->with('success','Se actualizo exitosamente');
    }

    public function indexClasificacion()
    {
        $etapas = Clasificacion::all();
        //dd($razas);

        return view('Trabajos.Clasificaciones.index', compact('etapas'));
    }

    public function crearClasificacion()
    {
        $razas = Raza::all();
        return view('Trabajos.Clasificaciones.crear', compact('razas'));
    }

    public function almacenarClasificacion(Request $request)
    {
        //dd($request);

        $clasificaciones = new Clasificacion;

        $clasificaciones->raza_id = $request->get('raza_id');
        $clasificaciones->nombreClasificacion = $request->get('nombreClasificacion');
        $clasificaciones->descripcion = $request->get('descripcion');
        $clasificaciones->inicioEtapa = $request->get('inicioEtapa');
        $clasificaciones->finEtapa = $request->get('finEtapa');
        $clasificaciones->save();

        $raza = Raza::select('nombreRaza')->where('id',$request->get('raza_id'));

        //dd($raza);


        return back()->with('flash','Se creo la nueva etapa para la raza','raza');
    }

    public function actualizarClasificacion(Request $request, $raza_id)
    {   
        //dd($request);
        $raza = Raza::where('id', $raza_id)->first();
        $raza->nombreRaza = $request->get('nombreRaza');
        $raza->descripcion = $request->get('descripcion');
        $raza->update();

        $razas = Raza::all();
        
        //dd($sedes);
        return back()->with('flash','Se actualizo la información exitosamente');
        //return view('admin.variables.index')->with('success','Se actualizo exitosamente');
    }

    public function razas_por_tipo($id_tipo){
        dd('Ya llegue');
        return response()->json(Raza::where('tipo_id',$id_tipo)->get());
    }
}
