<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use App\Ordeno;
use App\UnidadOrdeno;

class OrdenosController extends Controller
{
    /*Formulario para crear un registro de Ordeño*/
    public function registrar()
    {
        $cliente = auth()->user()->cliente_id;
    	$unidades = UnidadOrdeno::where('cliente_id', (int)$cliente)
        ->get();

    	$u = count($unidades);

    	if($u < 1)
    	{
    		return back()->with('errors','No se ha creado UNIDADES DE MEDIDA para los ordeños, sin unidades de medida no se pueden registrar los ordeños');
    	}
        $animales = Animal::select('id','nua','nombreAnimal')
        ->where('genero_id', 2)
        ->where('estado_id',1)
        ->where('cliente_id',(int)$cliente)
        ->get();
        //dd($animales);
        $a = count($animales);
        if($a < 1)
        {
        	return back()->with('errors','no se han registrado animales, sin animal no se puede registrar los ordeños');
        }
        return view('Trabajos.Ordenos.crear',compact('animales','unidades'));
    }
    /*Almacenamiento en la BD de los ordeños*/
    public function almacenar(Request $request)
    {
        //dd($request);
        $cliente = auth()->user()->cliente_id;

        $ordeno = new Ordeno;
        $ordeno->cliente_id = (int)$cliente;
        $ordeno->animal_id = $request->animal;
        $ordeno->unidad_id = (int)$request->unidad_id;
        $ordeno->cantidad = $request->cantidad;
        $ordeno->save();
        //dd($ordeno);
        return back()->with('flash','El registro del Ordeño, se realizo exitosamente.');
        
    }
    /*Vista de los registros de los ordeños*/
    public function index()
    {   
        $ordenos = Ordeno::select('nombreAnimal','cantidad','ordenos.created_at','unidad_id','nombreUnidad')
        ->join('animals','ordenos.animal_id','animals.id')
        ->join('unidad_ordenos','ordenos.unidad_id','unidad_ordenos.id')
        ->get();
        //dd($ordenos);
        return view('Trabajos.Ordenos.index', compact('ordenos'));
    }

    public function registrarUnidad()
    {
        //dd($animales);
        return view('Trabajos.Ordenos.crearUnidad');
    }
    /*Almacenamiento en la BD de los ordeños*/
    public function almacenarUnidad(Request $request)
    {
    	//dd($request);
        $cliente = auth()->user()->cliente_id;

        $ordeno = new UnidadOrdeno;
        $ordeno->cliente_id = (int)$cliente;
        $ordeno->nombreUnidad = $request->nombreUnidad;
        $ordeno->descripcion = $request->descripcion;
        $ordeno->save();
        //dd($ordeno);
        return back()->with('flash','El registro del Ordeño, se realizo exitosamente.');
        
    }
    /*Vista de los registros de los ordeños*/
    public function indexUnidad()
    {   
        $cliente = auth()->user()->cliente_id;
    	$unidades = UnidadOrdeno::where('cliente_id',(int)$cliente)
        ->get();

    	$u = count($unidades);
    	if($u < 1)
    	{
    		$mensaje = 1;
    		return view('Trabajos.Ordenos.indexUnidad', compact('unidades','mensaje'));
    	}

    	$mensaje = 2;
    	return view('Trabajos.Ordenos.indexUnidad', compact('unidades','mensaje'));
        
    }
}
