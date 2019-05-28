@extends('Admin.layotu')
@section('header')
	<h1>
	    Crear tipos de muertes
	    <small> En esta sección podra registrar los motivos por los cuales muere un animal</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Registro de motivos de muerte de animales</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-danger ">
			    <div class="box-header bg-danger ">
			      <h3 class="box-title">Ingrese los datos del motivo de muerte.</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.muertes.almacenarMotivoMuerte') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		
						<div class="form-group col-md-12">
							<label>Nombre del motivo de muerte</label>
							<input type="input" class="form-control" name="nombreMotivoMuerte">
						</div>
			    		<div class="form-group col-md-12">
			    			<label>Descripción</label>
			    			<textarea name="descripcion" class="form-control" placeholder="Descripción" required></textarea>			    			
			    		</div>
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-danger">Registrar muerte</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop