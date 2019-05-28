@extends('Admin.layotu')
@section('header')
	<h1>
	    Etapas de clasificación de los animales
	    <small> En esta sección podra crear las etapas de vida de las razas de los animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Etapas de clasificación</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-success">
			    <div class="box-header bg-success">
			      <h3 class="box-title">Ingrese los datos para crear una nueva etapa de clasificación</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.razas.almacenarClasificacion') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
							<label>Raza que se va a parametrizar</label>
							<select class="js-example-basic-single form-control" name="raza_id">
									<option> Seleccione la raza</option>
								@foreach($razas as $raza)
									<option value="{{ $raza->id }}"> {{$raza->nombreRaza}}</option>
								@endforeach
							</select>
						</div>
			    		<div class="form-group col-md-12">
			    			<label>Nombre de la etapa</label>
			    			<input name="nombreClasificacion" class="form-control" placeholder="Ingrese el nombre de la etapa, por ejemplo, cachorro, ternero, etc." required></input>
			    		</div>
			    		<div class="form-group col-md-12">
			    			<label>Descripción de la etapa</label>
			    			<textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción de la etapa." required></textarea>
			    		</div>
	    				<div class="form-group col-md-6">
			    			<label>Inicio de la etapa (En días)</label>
			    			<input name="inicioEtapa" class="form-control" placeholder="Ingrese el inicio de la etapa" required></input>			    			
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Fin de la etapa (En días)</label>
			    			<input name="finEtapa" class="form-control" placeholder="Ingrese el fin de la etapa" required></input>
			    		</div>
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-success">Crear clasificación</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop