@extends('Admin.layotu')
@section('header')
	<h1>
	    Registro de animales muertos
	    <small> En esta sección podra registrar los animales muertos</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Registro de animales muertos</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-danger ">
			    <div class="box-header bg-danger ">
			      <h3 class="box-title">Ingrese los datos del animal muerto.</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.muertes.almacenarMuerte') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
							<label>Animal</label>
							<select class="js-example-basic-single form-control" name="animal_id" >
								@foreach($animales as $animal)
									<option value="{{ $animal->id }}">{{$animal->nua}} - {{$animal->nombreAnimal}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Motivo de la muerte</label>
							<select class="js-example-basic-single form-control" name="motivo_id" >
								<option>Seleccione un motivo de la muerte</option>
								@foreach($motivos as $motivo)
									<option value="{{ $motivo->id }}"> {{$motivo->nombreMotivoMuerte}}</option>
								@endforeach
							</select>
							
						</div>
			    		<div class="form-group col-md-12">
			    			<label>Observaciones</label>
			    			<textarea name="observacion" class="form-control" placeholder="Observaciones" required></textarea>			    			
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