@extends('Admin.layotu')
@section('header')
	<h1>
	    Ordeños
	    <small> En esta sección podra registrar los litros de leche, del proceso de ordeño del animal</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Ordeños</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-warning">
			    <div class="box-header bg-warning">
			      <h3 class="box-title">Ingrese los datos del ordeño</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.ordenos.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
							<label>Animal</label>
							<select class="js-example-basic-single form-control" name="animal">
								@foreach($animales as $animal)
									<option value="{{ $animal->id }}">{{$animal->nua}} - {{$animal->nombreAnimal}}</option>
								@endforeach
<							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Animal</label>
							<select class="js-example-basic-single form-control" name="unidad_id">
								@foreach($unidades as $unidad)
									<option value="{{ $unidad->id }}">{{$unidad->nombreUnidad}}</option>
								@endforeach
<							</select>
						</div>
			    		<div class="form-group col-md-12">
			    			<label>Cantidad</label>
			    			<input name="cantidad" class="form-control" placeholder="Ingrese los litros de leche" required />
			    		</div>
			    		
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-warning">Registrar Ordeño</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop