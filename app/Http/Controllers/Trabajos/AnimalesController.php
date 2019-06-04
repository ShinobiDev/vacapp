<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use App\Raza;
use App\Finca;
use App\Genero;
use App\Tipo;
use App\Clasificacion;
use App\Ordeno;
use App\ControlPeso;
use App\Movimiento;
use App\MotivoMovimiento;
use App\Venta;
use Carbon\Carbon;
use Route;
use App\MotivoMuerte;
use App\Muerte;



class AnimalesController extends Controller
{
    public function index()
    {
        $cliente = auth()->user()->cliente_id;

        $animales = Animal::select('animals.id','nua','nombrePadre','nombreMadre','nombreAnimal','raza_id','finca_id','animals.tipo_id','genero_id','peso','fechaNacimiento','valorCompra','nombreProveedor','fechaCompra','razas.nombreRaza','fincas.nombreFinca','tipos.nombreTipo','generos.nombreGenero','animals.cliente_id')
        ->join('razas','animals.raza_id','razas.id')
        ->join('fincas','animals.finca_id','fincas.id')
        ->join('tipos','animals.tipo_id','tipos.id')
        ->join('generos','animals.genero_id','generos.id')
        ->where('estado_id',1)
        ->where('animals.cliente_id', $cliente)
        ->get();

        $animalesMachos = Animal::all()->where('genero_id',1)->where('estado_id',1);
        $totalMachos = count($animalesMachos);

        $animalesHembras = Animal::all()->where('genero_id',2)->where('estado_id',1);
        $totalHembras = count($animalesHembras);

        $totalAnimal = $totalHembras + $totalMachos;

        $an = count($animales);

        if($an < 1)
        {
            return back()->with('errors','No existen animales creados o en estado vivo');
        }

        //dd($animales[0]->fechaNacimiento);
        $fincas = Finca::all();
        $razas = Raza::all();
        $tipos = Tipo::all();
        $generos = Genero::all();

        foreach ($animales as $key) 
        {
            $now = Carbon::now();
            $diferencia[] = Carbon::parse($now)->diffInDays($key->fechaNacimiento); 
        }

        //dd($diferencia);
        return view('Trabajos.Animales.index', compact('animales','diferencia','fincas','razas','tipos','generos','totalMachos','totalHembras','totalAnimal'));
    }
    
    public function crias()
    {
        $crias = Animal::select('nombreAnimal','hijos','generos.nombreGenero')
        ->join('generos','animals.genero_id','generos.id')
        ->where('hijos','>','0')
        ->get();

        return view('Trabajos.Animales.controlCrias', compact('crias'));
    }


    public function crear()
    {
        $padres = Animal::select('id','nombreAnimal')
        ->where('genero_id','1')
        ->where('estado_id','1')
        ->get();
        $madres = Animal::select('id','nombreAnimal')
        ->where('genero_id','2')
        ->where('estado_id','1')
        ->get();
        $hoy = Carbon::now('America/Bogota')->format('Y-m-d');
        //11dd($hoy);
        $razas = Raza::all();
        $fincas = Finca::all();
        $generos = Genero::all();
        $tipos = Tipo::all();
        $clasificacion = Clasificacion::all();

        $pa = count($padres);
        if($pa < 1)
        {
            return back()->with('errors','No existen animales MACHOS creados, sin crear los animales Machos, no puede registrar un nuevo animal ');
        }
        $ma = count($madres);
        if($ma < 1)
        {
            return back()->with('errors','No existen animales HEMBRAS creadas, sin crear los animales HEMBRAS, no puede registrar un naicmiento de animal ');
        }
        $ra = count($razas = Raza::all());
        $ti = count($tipos = Tipo::all());
        if($ti < 1)
        {
            return back()->with('errors','No existen TIPOS DE ANIMAL creadas, sin crear los TIPOS DE ANIMAL, no puede registrar un nuevo animal ');
        }
        if($ra < 1)
        {
            return back()->with('errors','No existen RAZAS creadas, sin crear las RAZAS, no puede registrar un nuevo animal ');
        }
        $fi = count($fincas = Finca::all());
        if($fi < 1)
        {
            return back()->with('errors','No existen FINCAS creadas, sin crear las FINCAS, no puede registrar un nuevo animal ');
        }
        $ge = count($generos = Genero::all());
        if($ge < 1)
        {
            return back()->with('errors','No existen GENEROS creadas, sin crear los GENEROS, no puede registrar un nuevo animal ');
        }
        
        /*$cla = count($clasificacion = Clasificacion::all());
        if($cla < 1)
        {
            return back()->with('errors','No existen CLASIFICACIONES creadas, sin crear las CLASIFICACIONES, no puede registrar un nuevo animal ');
        }
        */
    	return view('Trabajos.Animales.crear', compact('razas','fincas','generos','tipos','clasificacion','padres','madres','hoy'));
    }

    public function comprar()
    {   
        $cliente = auth()->user()->cliente_id;

        $razas = Raza::all();
        $fincas = Finca::where('cliente_id',(int)$cliente)
        ->get();
        $generos = Genero::all();
        $tipos = Tipo::all();
        $clasificacion = Clasificacion::all();
        $padres = Animal::select('nombreAnimal')
        ->where('genero_id',1)
        ->whereIn('estado_id',[1,3])
        ->get();
        
        $madres = Animal::select('nombreAnimal')
        ->where('genero_id',2)
        ->whereIn('estado_id',[1,3])
        ->get();
        $ra = count($razas = Raza::all());
        $ti = count($tipos = Tipo::all());
        if($ti < 1)
        {
            return back()->with('errors','No existen TIPOS DE ANIMAL creadas, sin crear los TIPOS DE ANIMAL, no puede registrar un nuevo animal ');
        }
        if($ra < 1)
        {
            //Route::view('/', 'Admin/panelControl', ['message' => 'Este es un mensaje']);
            return back()->with('errors','No existen RAZAS creadas, sin crear las RAZAS, no puede registrar un nuevo animal ');
        }
        $ge = count($generos = Genero::all());
        if($ge < 1)
        {
            return back()->with('errors','No existen GENEROS creadas, sin crear los GENEROS, no puede registrar un nuevo animal ');
        }
        /*
        $cla = count($clasificacion = Clasificacion::all());
        if($cla < 1)
        {
            return back()->with('errors','No existen CLASIFICACIONES creadas, sin crear las CLASIFICACIONES, no puede registrar un nuevo animal ');
        }*/
        $fi = count($fincas);
        if($fi < 1)
        {
            return back()->with('errors','No existen FINCAS creadas, sin crear las FINCAS, no puede registrar un nuevo animal ');
        }
        
        $hoy = Carbon::now('America/Bogota')->format('Y-m-d');

        return view('Trabajos.Animales.comprar', compact('razas','fincas','generos','tipos','clasificacion','hoy','padres','madres'));
    }

    /*Se almacenan los datos de un nuevo animal*/
    public function almacenar(Request $request)
    {
        //dd($request);
        $padre = Animal::where('id',$request->padre_id)
        ->get();
        
        $madre = Animal::where('id',$request->madre_id)
        ->get();
        
        $nua = Animal::where('nua',$request->nua)
        ->get();
        if(count($nua) > 0)
        {
            return back()->with('errors','El Nua('.$request->nua.') Ya Existe');
        }
        //$data = $request->validate([
        //  'nua' => 'required|unique:animals'
        //]);
        $cliente = auth()->user()->cliente_id;
        //dd($madre[0]->nombreAnimal);
        //dd($request);
    	$animal = new Animal;

        $animal->cliente_id = $cliente;
    	$animal->nombreAnimal = $request->get('nombreAnimal');
        $animal->padre_id = $request->get('padre_id');
        $animal->madre_id = $request->get('madre_id');
        $animal->nombrePadre = $padre[0]->nombreAnimal;
        $animal->nombreMadre = $madre[0]->nombreAnimal;
        $animal->nua = $request->get('nua');
        $animal->finca_id = $request->get('finca');
        $animal->fechaNacimiento = $request->get('fechaNacimiento');
        $animal->peso = $request->get('peso');
        $animal->pesoNacimiento = $request->get('pesoNacimiento');
        $animal->raza_id = $request->get('raza');
        $animal->tipo_id = $request->get('tipo');
        $animal->genero_id = $request->get('genero');
        $animal->tipoNacimiento = 1;
        $animal->fechaCompra = $request->get('fechaCompra');
        $animal->valorCompra = $request->get('valorCompra');
        $animal->nombreProveedor = $request->get('nombreProveedor');
        $animal->estado_id = 1;

    	$animal->save();
    	
    	$hijosPadre = (int)$padre[0]->hijos + 1;
        $padre[0]->hijos = $hijosPadre;
        $padre[0]->update();

        $hijosMadre = (int)$madre[0]->hijos + 1;
        $madre[0]->hijos = $hijosMadre;
        $madre[0]->update();

    	return back()->with('flash','La animal ha sido creado');
    }

    public function almacenarCompra(Request $request)
    {
        //dd($request);
        
        $nua = Animal::where('nua',$request->nua)
        ->get();
        if(count($nua) > 0)
        {
            return back()->with('errors','El Nua ( '.$request->nua.' ), ya Existe');
        }
        
        $nuaP = Animal::where('nua',$request->nuaPadre)
        ->get();
        if(count($nuaP) > 0)
        {
            return back()->with('errors','El Nua ('.$request->nuaPadre.') del padre, ya Existe');
        }
        
        $nuaM = Animal::where('nua',$request->nua)
        ->get();
        if(count($nuaM) > 0)
        {
            return back()->with('errors','El Nua ('.$request->nuaMadre.') de la madre, ya Existe');
        }

        $cliente = auth()->user()->cliente_id;

        $animal = new Animal;

        $animal->cliente_id = $cliente;
        $animal->nombreAnimal = $request->get('nombreAnimal');
        $animal->nua = $request->get('nua');
        $animal->nuaPadre = $request->get('nuaPadre');
        $animal->nombrePadre = $request->get('nombrePadre');
        $animal->nuaMadre = $request->get('nuaMadre');
        $animal->nombreMadre = $request->get('nombreMadre');
        $animal->finca_id = $request->get('finca');
        $animal->fechaNacimiento = $request->get('fechaNacimiento');
        $animal->peso = $request->get('peso');
        $animal->pesoNacimiento = $request->get('pesoNacimiento');
        $animal->raza_id = $request->get('raza');
        $animal->tipo_id = $request->get('tipo');
        $animal->genero_id = $request->get('genero');
        $animal->tipoNacimiento = 2;
        $animal->fechaCompra = $request->get('fechaCompra');
        $animal->valorCompra = $request->get('valorCompra');
        $animal->nombreProveedor = $request->get('nombreProveedor');
        $animal->estado_id = 1;

        $animal->save();

        return back()->with('flash','La animal ha sido creado');
    }

    /*Editar Animal*/
    public function actualizarAnimal(Request $request)
    {
        dd($request);
    }


    /*Formulario para crear los registros del control de peso*/
    public function registrarControlPeso()
    {
        $animales = Animal::all();

        return view('Trabajos.ControlPeso.crear', compact('animales'));
    }
    /*Almacenamiento en la BD de los controles de peso*/
    public function almacenarControlPeso(Request $request)
    {   
        $animal = Animal::where('id',(int)$request->animal)->first();
        $pesoAntiguo = $animal->peso;

        $animal->peso = $request->kilogramos;
        $animal->update();
        //dd($pesoAntiguo);
        $controlAntiguo = ControlPeso::where('animal_id', $request->animal)->first();
        


        if($controlAntiguo == null)
        {
            $control = new ControlPeso; 
            $control->animal_id = $request->animal;
            $control->pesoAntiguo = $pesoAntiguo;
            $control->kilogramos = $request->kilogramos;
            $control->save();

            return back()->with('flash','El registro del Control de Peso, se realizo exitosamente.');
        }
        //$conAn = $controlAntiguo->created_at->toFormattedDateString();
        //dd($conAn);

        dd($controlAntiguo->created_at);
        
        $control = new ControlPeso; 
        $control->animal_id = $request->animal;
        $control->fechaAntigua = $controlAntiguo->created_at;
        $control->pesoAntiguo = $pesoAntiguo;
        $control->kilogramos = $request->kilogramos;
        $control->save();

        
        return back()->with('flash','El registro del Control de Peso, se realizo exitosamente.');
        
    }
    /*Vista de todos los registros de control de peso*/
    public function indexControlPeso()
    {
        $controles = ControlPeso::select('control_pesos.id','nombreAnimal','kilogramos','control_pesos.created_at')
        ->join('animals','control_pesos.animal_id','animals.id')
        ->get();
        return view('Trabajos.ControlPeso.index', compact('controles'));
    }

    public function eliminarControlPeso($control_id)
    {
        //dd($control_id);
        $control = ControlPeso::where('id', $control_id)->first();
        $control->delete();

        return back()->with('flash','Se ha Eliminado el Control del Peso N° $controlId');
    }

     /*Formulario para crear los movimientos*/
    public function registrarMovimientos()
    {
        $cliente = auth()->user()->cliente_id;

        $animales = Animal::all();
        $fincas = Finca::where('cliente_id',(int)$cliente)->get();
        $motivos = MotivoMovimiento::all();

        return view('Trabajos.Movimientos.crear', compact('animales','fincas','motivos'));
    }
    /*Almacenamiento en la BD de los movimientos*/
    public function almacenarMovimientos(Request $request)
    {   
        //dd($request);
        
        if($request->animal == 0)
        {
            return back()->with('errors','No ingreso ningún animal');
        }
        
        if($request->finca_id == 0)
        {
            return back()->with('errors','No ingreso ninguna finca');
        }
        if($request->motivo_id == 0)
        {
            return back()->with('errors','No ingreso ningún motivo');
        }
        $animal = Animal::select('nombreAnimal')
        ->where('id',$request->animal)->first();
        //dd($request);
        $fincaO = Animal::select('finca_id')
        ->where('id',$request->animal)->first();
        //dd($fincaO);
        $fincaActual = Finca::select('nombreFinca')
        ->where('id',$fincaO->finca_id)->first();

        $fincaDestino = Finca::select('nombreFinca')
        ->where('id',$request->finca_id)->first();
        //dd($fincaDestino);
        //dd($request);
        $animal = Animal::where('id',(int)$request->animal)->first();
        $animal->finca_id = $request->finca_id;
        $animal->update();
        //dd($request);
        $movimiento = new Movimiento;
        $movimiento->animal = $animal->nombreAnimal;
        $movimiento->fincaActual = $fincaActual->nombreFinca;
        $movimiento->fincaDestino = $fincaDestino->nombreFinca;
        $movimiento->motivo_id = $request->motivo_id;
        $movimiento->save();

        
        return back()->with('flash','El movimiento se registro exitosamente.');
        
    }
    /*Vista de todos los registros de los movimientos*/
    public function indexMovimientos()
    {
        $movimientos = Movimiento::select('animal','fincaActual','fincaDestino','movimientos.created_at','nombreMotivo')
        ->join('motivo_movimientos','movimientos.motivo_id','motivo_movimientos.id')
        ->get();
        return view('Trabajos.Movimientos.index', compact('movimientos'));
    }

    public function registrarVentas()
    {
        $animales = Animal::all();

        return view('Trabajos.Ventas.crear', compact('animales','fincas','motivos'));
    }
    /*Almacenamiento en la BD de los Ventas*/
    public function almacenarVentas(Request $request)
    {   
        //dd($request);
        if($request->animal_id == 0)
        {
            return back()->with('errors','No seleccionó ningún animal.');
        }
        $animal = Animal::where('id',(int)$request->animal_id)->first();
        $animal->estado_id = 2;
        $animal->update();
        //dd($request);
        $venta = new Venta;
        $venta->animal_id = $request->animal_id;
        $venta->valorVenta = $request->valorVenta;
        $venta->save();

        
        return back()->with('flash','La venta se registro exitosamente.');
        
    }

    public function indexVentas()
    {
        $ventas = Venta::select('ventas.id','animals.nombreAnimal','valorVenta','ventas.created_at')
        ->join('animals','ventas.animal_id','animals.id')
        ->get();
        return view('Trabajos.Ventas.index', compact('ventas'));
    }

    public function registroMuerte()
    {
        $cliente = auth()->user()->cliente_id;
        $animales = Animal::where('cliente_id', (int)$cliente);
        $motivos = MotivoMuerte::where('cliente_id', (int)$cliente);

        $a = count($animales);
        $m = count($motivos);

        if($a < 1)
        {
            return back()->with('errors','No existen Animales creados, sin crear los ANIMALES, no puede registrar una muerte de animal ');
        }

        if($m < 1)
        {
            return back()->with('errors','No existen MOTIVOS DE MUERTES creadas, sin crear los MOTIVOS DE MUERTE, no puede registrar una muerte de animal ');
        }


        return view('Trabajos.Muertes.crear', compact('animales','motivos'));
    }

    public function almacenarMuerte(Request $request)
    {
        //dd($request);
        $muerte = new Muerte;

        $muerte->animal_id = $request->get('animal_id');
        $muerte->motivo_id = $request->get('motivo_id');
        $muerte->observacion = $request->observacion;
        $muerte->save();
        $id = (int)$request->get('animal_id');
        //dd($request->animal_id);
        $animal = Animal::where('id', $id)->first();
        $animal->estado_id = 4;
        $animal->motivoMuerte_id = $request->get('motivo_id');
        $animal->fechaMuerte = Carbon::now();
        $animal->update();
        

        return back()->with('flash','La muerte del animal se registro satisfactoriamente.');

    }

    public function indexMuerte()
    {
        $cliente = auth()->user()->cliente_id;
        $animales = Animal::select('animals.id','nua','nombreAnimal','raza_id','finca_id','animals.tipo_id','genero_id','peso','fechaNacimiento','valorCompra','nombreProveedor','fechaCompra','razas.nombreRaza','fincas.nombreFinca','tipos.nombreTipo','generos.nombreGenero','nombreMotivoMuerte','motivoMuerte_id','fechaMuerte')
        ->join('razas','animals.raza_id','razas.id')
        ->join('fincas','animals.finca_id','fincas.id')
        ->join('tipos','animals.tipo_id','tipos.id')
        ->join('generos','animals.genero_id','generos.id')
        ->join('motivo_muertes','animals.motivoMuerte_id','motivo_muertes.id')
        ->where('estado_id',4)
        ->where('cliente_id',(int)$cliente)
        ->get();

        return view('Trabajos.Muertes.index',compact('animales'));
    }

    public function registroMotivoMuerte()
    {   
        $tipos = Tipo::all();
        $motivos = MotivoMuerte::all();
        //dd($tipos);
        return view('Trabajos.Muertes.crearMotivoMuerte', compact('tipos','motivos'));
    }

    public function almacenarMotivoMuerte(Request $request)
    {
        //dd($request);
        $cliente = auth()->user()->cliente_id;
        $motivo = new MotivoMuerte;

        $motivo->cliente_id = (int)$cliente;
        $motivo->nombreMotivoMuerte = $request->nombreMotivoMuerte;
        $motivo->descripcion = $request->descripcion;
        $motivo->save();

        return back()->with('flash','El nuevo motivo de muerte.');
    }

    public function indexMotivoMuerte()
    {   
        $cliente = auth()->user()->cliente_id;
        $motivos = MotivoMuerte::where('cliente_id', (int)$cliente)
        ->get();

        //dd($motivos);

        return view('Trabajos.Muertes.indexMotivoMuerte', compact('motivos'));
    }

}
