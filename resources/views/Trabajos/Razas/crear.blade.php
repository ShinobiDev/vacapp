@extends('Admin.layotu')
@section('header')
	<h1>
	    Razas
	    <small> En esta sección podra crear las razas</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Razas</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-warning">
			    <div class="box-header bg-warning">
			      <h3 class="box-title">Ingrese los datos para crear una nueva raza</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.razas.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
							<label>Tipo de animal</label>
							<select class="js-example-basic-single form-control" name="tipo_id">
									<option> Seleccione un tipo de animal</option>
								@foreach($tipos as $tipo)
									<option value="{{ $tipo->id }}"> {{$tipo->nombreTipo}}</option>
								@endforeach
							</select>
						</div>
			    		<div class="form-group col-md-12">
			    			<label>Nombre de la Raza</label>
			    			<input name="nombreRaza" class="form-control" placeholder="Ingrese el nombre de la Raza" required></input>
			    		</div>
			    		<div class="form-group col-md-12">
			    			<label>Descripción de la raza</label>
			    			<textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción de la raza" required></textarea>			    			
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Promedio esperado de crecimiento Macho</label>
			    			<input name="promedioMacho" class="form-control" placeholder="Ingrese el promedio esperado" required></input>
			    		</div>
			    		<div class="form-group col-md-6">
			    			<label>Promedio esperado de crecimiento Hembra</label>
			    			<input name="promedioHembra" class="form-control" placeholder="Ingrese el promedio esperado" required></input>
			    		</div>
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-warning">Crear Raza</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop