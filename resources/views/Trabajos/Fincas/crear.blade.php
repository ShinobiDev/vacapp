@extends('Admin.layotu')
@section('header')
	<h1>
	    Fincas
	    <small> En esta sección podra crear las fincas</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Fincas</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="box box-danger">
			    <div class="box-header bg-danger">
			      <h3 class="box-title">Ingrese los datos para crear una nueva finca</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.fincas.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
			    			<label>Nombre de la Finca</label>
			    			<input name="nombreFinca" class="form-control" placeholder="Ingrese el nombre de la Finca" required></input>
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Departamento de la Finca</label>
			    			<input name="departamento" class="form-control" placeholder="Ingrese el pais de la Finca" required></input>
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Municipio de la Finca</label>
			    			<input name="municipio" class="form-control" placeholder="Ingrese el estado o departamento de la Finca" required></input>
			    		</div>
			    		
			    		<div class="form-group col-md-12">
			    			<label>Dirección de la Finca</label>
			    			<input name="direccion" class="form-control" placeholder="Ingrese la dirección de la Finca" required></input>
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Teléfono de la Finca</label>
			    			<input type="number" name="telefono" class="form-control" placeholder="Ingrese el teléfono de la Finca" required></input>
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Nombre del encargado de la Finca</label>
			    			<input name="nombreEncargado" class="form-control" placeholder="Ingrese el nombre del contacto" required></input>
			    		</div>
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-danger">Crear Finca</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop