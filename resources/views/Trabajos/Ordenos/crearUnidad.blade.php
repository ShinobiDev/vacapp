@extends('Admin.layotu')
@section('header')
	<h1>
	    Unidades de ordeño
	    <small> En esta sección podra crear las unidades utilizadas para medir la cantidad extraida en cada ordeño</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Unidades de ordeño</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-warning">
			    <div class="box-header bg-warning">
			      <h3 class="box-title">Ingrese los datos para crear una nueva unidad de medida para los ordeños</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.ordenos.almacenarUnidad') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
			    			<label>Nombre de la unidad de ordeño</label>
			    			<input name="nombreUnidad" class="form-control" placeholder="Ingrese el nombre de la unidad de ordeño" required></input>
			    		</div>
			    		<div class="form-group col-md-12">
			    			<label>Descripción de la nueva unidad de medida</label>
			    			<textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción de la nueva unidad de medida" required></textarea>			    			
			    		</div>
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-warning">Crear la unidad</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop