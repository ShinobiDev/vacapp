<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Finca;
use App\Tarifa;
use App\Rol;
use App\User;
use Carbon\carbon;

class UsuariosController extends Controller
{
    public function panelProximoVencer()
    {
        return view('Admin.panelControl');
    }
    public function panel()
	{  
        $user = auth()->user();
        $fechaSus = auth()->user()->created_at;
        $now = Carbon::now();
        $diasSuscripcion = Carbon::parse($now)->diffInDays($fechaSus);
        $fechaSus = $fechaSus->toFormattedDateString(); 

        //dd($fechaSus);
        if($diasSuscripcion <= 365)
        {
            if($diasSuscripcion <= 355)
            {
                return view('Admin.panelControl');    
            }
            
            $usuario = User::select('users.id','name','email','nombreTarifa','valorTarifa','tarifa_id')
                    ->join('tarifas','users.tarifa_id','tarifas.id')
                    ->get();
            $tarifas = Tarifa::all();

            $valor = (float)$usuario[0]->valorTarifa;
            //$valor = number_format($valor);
            //$valor = number_format ( float $valor [, int $decimals = 2 ] ) : string;
            //dd($valor);

            return view('Admin.usuarioProximoPasar', compact('tarifas','usuario','valor'));

        }

        $usuario = User::select('users.id','name','email','nombreTarifa','valorTarifa','tarifa_id')
                    ->join('tarifas','users.tarifa_id','tarifas.id')
                    ->get();

            //dd($usuario[0]->name);

        $tarifas = Tarifa::all();

        $valor = (float)$usuario[0]->valorTarifa;
        //$valor = number_format($valor);
        //$valor = number_format ( float $valor [, int $decimals = 2 ] ) : string;
        //dd($valor);

        return view('Admin.usuarioPasado', compact('tarifas','usuario','valor'));    
		
	}

	public function crear()
    {
        $roles=Rol::all();
        $fincas=Finca::all();
				//dd($roles);
        return view('Admin.Usuarios.crear',compact('roles','fincas'));
    }

    public function almacenar(Request $request)
    {
        $doc = User::where('documento',$request->documento)
        ->get();
        //dd($doc);
        if(count($doc) > 0)
        {
            return back()->with('errors','El Numero de documento ('.$request->documento.') Ya Existe');
        }

        $mail = User::where('email',$request->email)
        ->get();
        //dd($doc);
        if(count($mail) > 0)
        {
            return back()->with('errors','El correo electronico, ('.$request->email.'). Ya Existe');
        }
        if($request->password == $request->passwordA)
        {
            $cliente = auth()->user()->cliente_id;
            dd($cliente);
            $user = new User;

            $pass = $request->get('password');
            $user->estado_id = 1;
            $user->cliente_id = (int)$cliente;
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($pass);
            $user->rol_id = $request->get('rol_id');
            $user->finca_id = $request->get('finca_id');
            //$user->finca_id = $request->get('finca_id');
            $user->documento = $request->get('documento');
            $user->save();

            return back()->with('flash','El usuario fue creado satisfactoriamente.');
        }else{
            dd('llegue aqui');
            return back()->with('errors','Los datos de la contraseña no concide.');
        }
    }

    public function index()
    {
        $cliente = auth()->user()->cliente_id;
        $fincas = Finca::all();
        $roles = Rol::all();
        $user = User::select('users.id','name','email','documento','nombreRol','nombreFinca')
        ->join('rols','users.rol_id','rols.id')
        ->join('fincas','users.finca_id','fincas.id')
        ->where('cliente_id', (int)$cliente)
        ->get();

        //dd($user);
        return view('Admin.Usuarios.index',compact('user','fincas','roles'));
    }

    public function actualizar(Request $request, $usuario_id)
    {
     //dd([$request,$request->get('nombre')]);

        $usuario = User::where('id', $usuario_id)->first();
        $usuario->name = $request->get('name');
        $usuario->documento = $request->get('documento');
        $usuario->email = $request->get('email');
        $usuario->rol_id = $request->get('rol_id');
        $usuario->update();

        return back()->with('flash','Se actulizó el usuario exitosamente');
    }

    public function cambioContrasena()
    {
        $user = User::where('id',auth()->user()->id)->first();

        //dd($user);
        return view('Admin.Usuarios.cambioContrasena',compact('usesr'));
    }

    public function actualizarContrasena(Request $request)
    {
        $user = User::where('id',auth()->user()->id)->first();
        //dd($request);
        //$pass = bcrypt($request->pass);
        //dd($user->password);
        /*if($request->pass == $user->password)
        {*/
            if($request->password == $request->passwordA)
            {
                //dd('Vamos a Cambiar la contraseña');
                $user->password = bcrypt($request->password);
                $user->update();
                //dd($user);
                $user = $user->email;
                $pass = $request->password;
                //UsuarioCreado::dispatch($user, $pass);
                return back()->with('flash','Se ha realizado el cambio de contraseña');
            }
            else
            {
                dd('Los nuevos datos no son iguales');
                return back()->with('flash','Los nuevos datos estan errados');
            }
        /*}
        else
        {
            dd('La contraseña actual esta errada');
        }*/
    }
}
