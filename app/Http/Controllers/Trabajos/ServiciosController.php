<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servicio;
use App\Animal;
use App\historialServicio;

class ServiciosController extends Controller
{
    public function index()
    {
        $cliente = auth()->user()->cliente_id;
    	$servicios = Servicio::where('cliente_id',(int)$cliente)
        ->get();
    	//dd($razas);

    	return view('Trabajos.Servicios.index', compact('servicios'));
    }

    public function crear()
    {
    	return view('Trabajos.Servicios.crear');
    }

    public function almacenar(Request $request)
    {
    	//dd($request);
        $cliente = auth()->user()->cliente_id;
    	$servicio = new Servicio;
        $servicio->cliente_id = (int)$cliente;
    	$servicio->nombreServicio = $request->get('nombreServicio');
        $servicio->descripcion = $request->get('descripcion');
    	$servicio->save();

    	return back()->with('flash','El servicio ha sido creado');
    }

    public function actualizar(Request $request, $servicio_id)
    {	
    	//dd($request);
    	$servicio = Servicio::where('id', $servicio_id)->first();
    	$servicio->nombreServicio = $request->get('nombreServicio');
    	$servicio->descripcion = $request->get('descripcion');
    	$servicio->update();

        $servicios = Servicio::all();
        
        //dd($sedes);
        return back()->with('flash','Se actualizo la información exitosamente');
        //return view('admin.variables.index')->with('success','Se actualizo exitosamente');
    }

    public function registrar()
    {
        $servicios = Servicio::all();
        $animales = Animal::all();
        return view('Trabajos.Servicios.registrar', compact('servicios','animales'));
    }

    public function ingresarServicio(Request $request)
    {
        //dd($request);
        $servicio = new historialServicio;

        $servicio->animal_id = $request->get('animal_id');
        $servicio->servicio_id = $request->get('servicio_id');
        $servicio->save();

        return back()->with('flash','El servicio se registro exitosamente.');
    }
    
    public function vistaHistorial()
    {
        $servicios = historialServicio::select('animals.nombreAnimal','servicios.nombreServicio','historial_servicios.created_at')
        ->join('animals','historial_servicios.animal_id','animals.id')
        ->join('servicios','historial_servicios.servicio_id','servicios.id')
        ->get();
        //dd($servicios);

        return view('Trabajos.Servicios.vistaHistorial', compact('servicios'));
    }
}
