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
    	$unidades = UnidadOrdeno::all();
    	$u = count($unidades);

    	if($u < 1)
    	{
    		return back()->with('errors','No se ha creado UNIDADES DE MEDIDA para los ordeños, sin unidades de medida no se pueden registrar los ordeños');
    	}
        $animales = Animal::select('id','nua','nombreAnimal')
        ->where('genero_id', 2)
        ->where('estado_id',1)
        ->get();
        //dd($animales);
        $a = count($animales);
        if($a < 1)
        {
        	return back()->with('errors','no se han registrado animales, sin animal no se puede registrar los ordeños');
        }
        return view('Trabajos.Ordenos.crear',compact('animales'));
    }
    /*Almacenamiento en la BD de los ordeños*/
    public function almacenar(Request $request)
    {
        $ordeno = new Ordeno;
        $ordeno->animal_id = $request->animal;
        $ordeno->unidad_id = $request->unidad_id;
        $ordeno->save();
        //dd($ordeno);
        return back()->with('flash','El registro del Ordeño, se realizo exitosamente.');
        
    }
    /*Vista de los registros de los ordeños*/
    public function index()
    {   
        $ordenos = Ordeno::select('nombreAnimal','litros','ordenos.created_at')
        ->join('animals','ordenos.animal_id','animals.id')
        ->get();
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
        $ordeno = new UnidadOrdeno;
        $ordeno->nombreUnidad = $request->nombreUnidad;
        $ordeno->descripcion = $request->descripcion;
        $ordeno->save();
        //dd($ordeno);
        return back()->with('flash','El registro del Ordeño, se realizo exitosamente.');
        
    }
    /*Vista de los registros de los ordeños*/
    public function indexUnidad()
    {   
    	$unidades = UnidadOrdeno::all();

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
