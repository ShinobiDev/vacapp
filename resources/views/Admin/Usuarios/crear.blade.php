@extends('Admin.layotu')
@section('header')
	<h1>
	    Crear Usuario
	    <small> En esta sección podra registrar los los usuarios.</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Usuarios</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-warning">
			    <div class="box-header bg-warning">
			      <h3 class="box-title">Ingrese los datos del usuario</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('usuarios.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-6">
							<label>Rol</label>
							<select class="form-control" name="rol_id" required>
								<option value="0">Selecciona un rol</option>
								@foreach($roles as $rol)
									<option value="{{ $rol->id }}"> {{$rol->nombreRol}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Finca</label>
							<select class="form-control" name="finca_id" required>
								<option value="0">Selecciona una finca</option>
								@foreach($fincas as $finca)
									<option value="{{ $finca->id }}"> {{$finca->nombreFinca}}</option>
								@endforeach
							</select>
						</div>
			    		<div class="form-group col-md-12">
							<label>Nombre Usuario</label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="form-group col-md-6">
							<label>Documento</label>
							<input type="text" class="form-control" name="documento" required>
						</div>
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="text" class="form-control" name="email" required>
						</div>
						<div class="form-group col-md-6">
			    			<label>Contraseña</label>
			    			<input type="password" minlength="8" maxlength="40" name="password" class="form-control" placeholder="Minimo 8 caracteres" required></input>
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Confirme la contraseña</label>
			    			<input type="password" name="passwordA" class="form-control" placeholder="Confirma Contraseña" required></input>
			    		</div>
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-warning">Registrar Usuario</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop