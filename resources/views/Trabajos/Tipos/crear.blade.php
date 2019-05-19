@extends('Admin.layotu')
@section('header')
	<h1>
	    Tipos de animales
	    <small> En esta sección podra crear las Tipos de animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Tipos de animales</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-warning">
			    <div class="box-header bg-warning">
			      <h3 class="box-title">Ingrese los datos para crear un nuevo tipo para el animal</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.tipos.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
			    			<label>Nombre del nuevo tipo</label>
			    			<input name="nombreTipo" class="form-control" placeholder="Ingrese el nombre del nuevo tipo" required></input>
			    		</div>
			    		<div class="form-group col-md-12">
			    			<label>Descripción del nuevo tipo</label>
			    			<textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción del nuevo tipo" required></textarea>
			    			
			    		</div>
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-warning">Crear el tipo</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop