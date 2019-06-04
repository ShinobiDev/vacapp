<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\carbon;
use DB;

class UsuariosController extends Controller
{
    public function crear(Request $request)
    {
    	$email = DB::table('users')->where('email',$request->email)->get();
            $nit = DB::table('users')->where('documento',$request->documento)->get();
            //dd($dato);
            if(count($email)>0)
            {
                return back()->with('error','El email ya esta registrado');
            }
            if(count($nit)>0)
            {
                return back()->with('error','El documento ya esta registrado');
            }

            //dd('llegue aca');
            $hoy = Carbon::now();
            //$hoy = $hoy->format('d-m-Y');
            //dd($hoy);

            $user = new User;

            //$pass = str_random(8);
            $user->estado_id = 1;
            $user->rol_id = 1;
            $user->name = $request->get('nombre');
            $user->email = $request->get('mail');
            $user->documento = $request->get('documento');
            $user->password = bcrypt($request->get('password'));
            $user->fechaSuscripcion = $hoy;
            $user->telefono = $request->get('telefono');
            $user->estado_id = 1;
            $user->save();
            
            $user->cliente_id = $user->id;
            $user->save();

            //dd($user->cliente_id);

        return back()->with('flash','El usuario a sido creado con exito');
    }
}
