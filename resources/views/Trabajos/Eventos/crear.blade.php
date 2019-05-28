@extends('Admin.layotu')
@section('header')
	<h1>
	   Ferias y eventos
	    <small> En esta sección podra crear las ferias y eventos, en los cuales participan los animales.</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Ferias y eventos</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">
			    <div class="box-header bg-info">
			      <h3 class="box-title">Ingrese los datos para crear una nueva feria o evento</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.eventos.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
			    			<label>Nombre de la feria o evento</label>
			    			<input name="nombreEvento" class="form-control" placeholder="Ingrese el nombre del nuevo tipo" required></input>
			    		</div>
			    		<div class="form-group col-md-12">
			    			<label>Descripción de la feria o evento</label>
			    			<textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción del nuevo tipo" required></textarea>			    			
			    		</div>
			    		<div class="form-group col-md-6">
							<label>Pais</label>
							<select class="js-example-basic-single form-control" name="pais_id" >
								@foreach($paises as $pais)
									<option value="{{ $pais->id }}"> {{$pais->nombrePais}}</option>
								@endforeach
							</select>
						</div>
			    		<div class="form-group col-md-6">
			    			<label>Ciudad</label>
			    			<input name="ciudad" list="ciudades" class="form-control" placeholder="Ingrese la descripción del nuevo tipo" required>
			    			<datalist id="ciudades">
			    				@foreach($ciudades as $ciudad)
									<option value="{{$ciudad->nombreCiudad}}"></option>
								@endforeach
			    			</datalist>
			    			
			    		</div>			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-primary">Crear la feria</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop