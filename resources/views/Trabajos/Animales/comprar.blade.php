@extends('Admin.layotu')
@section('header')
	<h1>
	    Animales
	    <small> En esta sección se registran las compras de animales</small>
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
			      <h3 class="box-title">Ingrese los datos del animal comprado.</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.animales.almacenarCompra') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">			    		
			    		<div class="form-group col-md-6">
			    			<label>Nombre Animal</label>
			    			<input name="nombreAnimal" class="form-control" placeholder="Ingrese el nombre del animal" value="{{ old('nombreAnimal') }}" required>			    			
			    		</div>
			    		
			    		
			    		<div class="form-group col-md-6">
			    			<label>NUA </label><label class="text-success">(Numero Unico Animal)</label>
			    			<input name="nua" class="form-control" placeholder="Ingrese el NUA del animal" value="{{ old('nua') }}" ></input>
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>NUA Padre </label>
			    			<input name="nuaPadre" class="form-control" placeholder="Ingrese el NUA del padre" value="{{ old('nuaPadre') }}"></input>
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Nombre Padre</label>
			    			<input list="anis" name="nombrePadre" class="form-control" placeholder="Ingrese el nombre del animal"  value="{{ old('nombrePadre') }}" required>
							<datalist id="anis">
							  	@foreach($padres as $padre)
									<option value="{{$padre->nombreAnimal}}"></option>
								@endforeach
							</datalist>			    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>NUA Madre </label>
			    			<input name="nuaMadre" class="form-control" placeholder="Ingrese el NUA de la madre" value="{{ old('nuaMadre') }}" ></input>
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Nombre Madre</label>
			    			<input name="nombreMadre" class="form-control" placeholder="Ingrese el nombre de la madre" value="{{ old('nombreMadre') }}">	
			    			<datalist id="anis">
							  	@foreach($madres as $madre)
									<option value="{{$madre->nombreAnimal}}"></option>
								@endforeach
							</datalist>	
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Finca</label>
							<select name="finca" class="form-control"  value="{{ old('finca') }}" required>
								<option value="0">Selecciona una Finca</option>
								@foreach($fincas as $finca)
									<option value="{{ $finca->id }}">- {{ $finca->nombreFinca }}</option>
								@endforeach
							</select>	    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Fecha de nacimiento</label>
			    			<input type="date" name="fechaNacimiento" max="{{$hoy}}" class="form-control" value="{{ old('fechaNacimiento') }}" required>			    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Peso en Kg</label>
			    			<input name="peso" class="form-control" placeholder="Ingrese el peso en kilogramos"  value="{{ old('peso') }}" required>			    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Raza</label>
							<select name="raza" class="form-control"  value="{{ old('raza') }}" required>
								<option value="0">Selecciona una Raza</option>
								@foreach($razas as $raza)
									<option value="{{ $raza->id }}">- {{ $raza->nombreRaza }}</option>
								@endforeach
							</select>
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Tipo</label>
							<select name="tipo" class="form-control"  value="{{ old('tipo') }}" required>
								<option value="0">Selecciona un Tipo</option>
								@foreach($tipos as $tipo)
									<option value="{{ $tipo->id }}">- {{ $tipo->nombreTipo }}</option>
								@endforeach
							</select>	    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label>Genero</label>
							<select name="genero" class="form-control"  value="{{ old('genero') }}" required>
								<option value="0">Selecciona un genero</option>
								@foreach($generos as $genero)
									<option value="{{ $genero->id }}">- {{ $genero->nombreGenero }}</option>
								@endforeach
							</select>	    			
			    		</div>
			    		<div class="form-group col-md-3 compra" >
			    			<label>Fecha de la compra</label>
			    			<input type="date" name="fechaCompra" max="{{$hoy}}" class="form-control"  value="{{ old('fechaCompra') }}" required>		
			    		</div>
		                <div class="form-group col-md-3 compra" >
			    			<label>Valor de la compra</label>
			    			<input name="valorCompra" class="form-control" placeholder="Ingrese el valor de la compra"  value="{{ old('valorCompra') }}" required>		
			    		</div>
			    		<div class="form-group col-md-6 col-md-offset-3 compra" 
			    			<label>Nombre Proveedor</label>
			    			<input name="nombreProveedor" class="form-control" placeholder="Ingrese el nombre del proveedor"  value="{{ old('nombreProveedor') }}" required>		
			    		</div>
		           
			    							    		
			    		<div class="form-group col-md-2 col-md-offset-5">
			    			<button type="submit" class="btn btn-success">Crear Animal</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop