@extends('Admin.layotu')
@section('header')
	<h1>
	    Servicios
	    <small> En esta sección podra crear los servicios</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Servicios</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-success">
			    <div class="box-header bg-success">
			      <h3 class="box-title">Ingrese los datos para crear un nuevo servicio</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.servicios.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
			    			<label>Nombre del servicio</label>
			    			<input name="nombreServicio" class="form-control" placeholder="Ingrese el nombre del servicio" required></input>
			    		</div>
			    		<div class="form-group col-md-12">
			    			<label>Descripción del servicio</label>
			    			<textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción del servicio" required></textarea>
			    		</div>
			    		
			    		<div class="form-group">
			    			<button type="submit" class="btn btn-success">Crear Servicio</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop