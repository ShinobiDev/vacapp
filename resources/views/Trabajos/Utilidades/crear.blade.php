@extends('Admin.layotu')
@section('header')
	<h1>
	    Utilidades de animales
	    <small> En esta sección podra crear las utilidades de animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Utilidades de animales</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-warning">
			    <div class="box-header bg-warning">
			      <h3 class="box-title">Ingrese los datos para crear una nueva utilidad para el animal</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.utilidades.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
			    			<label>Nombre de la nueva utilidad</label>
			    			<input name="nombreUtilidad" class="form-control" placeholder="Ingrese el nombre de la nueva utilidad" required></input>
			    		</div>
			    		<div class="form-group col-md-12">
			    			<label>Descripción de la nueva utilidad</label>
			    			<textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción de la nueva utilidad" required></textarea>
			    			
			    		</div>
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-warning">Crear la utilidad</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop