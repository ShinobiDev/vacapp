@extends('Admin.layotu')
@section('header')
	<h1>
	    Servicios
	    <small> En esta sección se registran los servicios realizados a los animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Animales</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-success">
			    <div class="box-header bg-success">
			      <h3 class="box-title">Ingrese los datos del servicios.</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.servicios.ingresarServicio') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">			    		
			    		
			    		<div class="form-group col-md-6">
			    			<label>Animal</label>
							<select class="js-example-basic-single form-control" name="animal">
								@foreach($animales as $animal)
									<option value="{{ $animal->id }}">{{$animal->nua}} - {{$animal->nombreAnimal}}</option>
								@endforeach
<							</select>	    			
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Servicio Realizado</label>
							<select name="servicio_id" class="form-control" id="sede" required>
								<option value="0">Selecciona un servicio</option>
								@foreach($servicios as $servicio)
									<option value="{{ $servicio->id }}">- {{ $servicio->nombreServicio }}</option>
								@endforeach
							</select>	    			
			    		</div>    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-success">Registrar Servicio</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop