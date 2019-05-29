<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use App\Raza;
use App\ControlPeso;
use Carbon\Carbon;

class EstadisticaCrecimientoController extends Controller
{
    public function vistaIndividual($animal_id)
    {
    	//dd($animal_id);
    	$a = (int)$animal_id;
 		//dd($a);                    
 		/*Seleccionamos el animal que vamos a consultar*/                                               
    	$animal = Animal::select('id','nombreAnimal','fechaNacimiento','pesoNacimiento','raza_id','genero_id','peso')->where('id', $a)->first();
    	/*Hallamos la raza del animal*/
    	$raza = Raza::where('id', (int)$animal->raza_id)->get();
    	/*Hallamos el genero del animal*/
    	//dd($raza);
    	$genero = $animal->genero_id;
    	/*Hallamos el promedio de crecimiento si es macho*/
    	//dd($genero);
    	if($genero == 1)	
    	{
    		$raza = Raza::select('nombreRaza','promedioMacho')->where('id', (int)$animal->raza_id)->first();
    		$promedioRaza = $raza;
    		$pro = floatval($promedioRaza->promedioMacho);    		
    		$sexo = "Macho";
    	}
    	/*Hallamos el promedio de crecimiento si es hembra*/
    	if($genero == 2)
    	{
    		$raza = Raza::select('nombreRaza','promedioHembra')->where('id', (int)$animal->raza_id)->first();
    		//dd($raza);
    		$promedioRaza = $raza;
    		$pro = floatval($promedioRaza->promedioHembra);
    		$sexo = 'Hembra';
    	}    	
    	/*Buscamos el ultimo control de peso realizado al animal*/

    	$control = ControlPeso::select('animal_id','pesoAntiguo','kilogramos','created_at')->where('animal_id', $a)->get();
    	//dd($control);
    	
		$co = count($control);
		//dd($co);
		if($co == 0)
		{
			return back()->with('errors','No se ha realizado control de peso al animal, sin estos datos no se puede saber el promedio. Por favor realizce un control de peso para poder tener un promedio de creciemiento');
		}
		if($co == 1)
		{
			//$hoy = Carbon::now();
			//$edad = $animal->fechaNacimiento;
			//$ed = $edad->format('d-m-Y');
			$control = ControlPeso::select('animal_id','pesoAntiguo','kilogramos','created_at')->where('animal_id', $a)->first();
			$now = Carbon::now();
			$nacimiento = $animal->fechaNacimiento;
        	$diferenciaFecha = Carbon::parse($now)->diffInDays($animal->fechaNacimiento);
        	$meses = (int)$diferenciaFecha/12;
        	$pesoNacimiento = $animal->pesoNacimiento;
        	$pesoActual = $animal->peso;
        	$diferenciaPeso = $pesoActual - $animal->pesoNacimiento;

        	$promedioMensual = $diferenciaPeso / $meses;

        	$promedioMensual = number_format($promedioMensual);
        	$meses = number_format($meses);
        	$pesoNacimiento = number_format($pesoNacimiento);
        	$pesoActual = number_format($pesoActual);
        	//dd($int, $pesoNacimiento, $pesoActual, $diferenciaPeso, $promedioMensual, $pro);
        	return view('Trabajos.ControlPeso.promedioCrecimientoPrimeraVez', compact('meses','pesoNacimiento','pesoActual','promedioMensual','nacimiento','control','raza','sexo','pro'));

			//dd('Tiene solo una toma de peso', $edad);

		}else{

            $controles = ControlPeso::select('id','animal_id','pesoAntiguo','fechaAntigua','kilogramos','created_at')->where('animal_id', $a)->get();

            $ultimoControl = ControlPeso::select('id','animal_id','pesoAntiguo','fechaAntigua','kilogramos','created_at')->where('animal_id', $a)->orderBy('id','DESC')->first();

            $pesoAntiguo = $ultimoControl->pesoAntiguo;
            
            $fechaAntigua = date('Y-m-d', strtotime($ultimoControl->fechaAntigua));
            $fechaActual = date('Y-m-d', strtotime($ultimoControl->created_at));

            
            $kilogramos = $ultimoControl->kilogramos;

            $prom = $kilogramos - $pesoAntiguo;
            $prom = number_format($prom);
            $kilogramos = number_format($kilogramos);
            $pesoAntiguo = number_format($pesoAntiguo);

            $now = Carbon::now();

            $diferenciaEntreFecha = Carbon::parse($fechaActual)->diffInDays($fechaAntigua);
            dd($diferenciaEntreFecha);

			return view('Trabajos.ControlPeso.promedioCrecimiento', compact('controles','prom','ultimoControl','fechaAntigua','fechaActual','kilogramos','pesoAntiguo'));

		}    		
    	
    }
}
