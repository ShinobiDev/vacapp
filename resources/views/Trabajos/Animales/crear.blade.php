@extends('Admin.layotu')
@section('header')
	<h1>
	    Animales
	    <small> En esta sección se registran los nacimientos de los animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Animales</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="box box-success">
			    <div class="box-header bg-success">
			      <h3 class="box-title">Ingrese los datos del animal recien nacido.</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.animales.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">			    		
			    		<div class="form-group col-md-4">
			    			<label>Nombre Animal</label>
			    			<input name="nombreAnimal" class="form-control" placeholder="Ingrese el nombre del animal" required>			    			
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>NUA </label><label class="text-success">(Numero Unico Animal)</label>
			    			<input name="nua" class="form-control" placeholder="Ingrese el NUA del animal" required></input>
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Finca</label>
							<select name="finca" class="form-control" id="sede" required>
								<option value="0">Selecciona una Finca</option>
								@foreach($fincas as $finca)
									<option value="{{ $finca->id }}">- {{ $finca->nombreFinca }}</option>
								@endforeach
							</select>	    			
			    		</div>
			    			<div class="form-group col-md-6">
			    			<label>Padre del Animal</label>
			    			<select class="js-example-basic-single form-control" name="padre_id" required>
								@foreach($padres as $padre)
									<option value="{{ $padre->id }}"> {{$padre->nombreAnimal}}</option>
								@endforeach
<							</select>
								    			
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Madre del Animal</label>
							<select class="js-example-basic-single form-control" name="madre_id" required>
								@foreach($madres as $madre)
									<option value="{{ $madre->id }}"> {{$madre->nombreAnimal}}</option>
								@endforeach
<							</select>	    			
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Fecha de nacimiento</label>
			    			<input type="date" name="fechaNacimiento" max="{{$hoy}}" class="form-control" placeholder="Ingrese el nombre del animal">			    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Peso en Kg</label>
			    			<input name="peso" class="form-control" placeholder="Ingrese el nombre del animal">			    			
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Raza</label>
							<select name="raza" class="form-control" required>
								<option value="0">Selecciona una Raza</option>
								@foreach($razas as $raza)
									<option value="{{ $raza->id }}">- {{ $raza->nombreRaza }}</option>
								@endforeach
							</select>
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Tipo</label>
							<select name="tipo" class="form-control" id="sede" required>
								<option value="0">Selecciona un Tipo</option>
								@foreach($tipos as $tipo)
									<option value="{{ $tipo->id }}">- {{ $tipo->nombreTipo }}</option>
								@endforeach
							</select>	    			
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Genero</label>
							<select name="genero" class="form-control" id="sede" required>
								<option value="0">Selecciona un genero</option>
								@foreach($generos as $genero)
									<option value="{{ $genero->id }}">- {{ $genero->nombreGenero }}</option>
								@endforeach
							</select>	    			
			    		</div>
		           
			    		<div class="col-md-12"></div>					    		
			    		<div class="form-group">
			    			<button type="submit" class="btn btn-success">Crear Animal</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop