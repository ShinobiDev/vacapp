@extends('Admin.layotu')
@section('header')
	<h1>
	    Control de Peso
	    <small> En esta sección podra registrar el control de peso de los animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Control de Peso</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">
			    <div class="box-header ">
			      <h3 class="box-title">Ingrese los datos del control de peso.</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.controlPeso.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
							<label>Animal</label>
							<select class="js-example-basic-single form-control" name="animal" >
								@foreach($animales as $animal)
									<option value="{{ $animal->id }}">{{$animal->nua}} - {{$animal->nombreAnimal}}</option>
								@endforeach
<							</select>
						</div>
			    		<div class="form-group col-md-12">
			    			<label>Kilogramos</label>
			    			<input name="kilogramos" class="form-control" placeholder="Ingrese los kilogramos que peso el animal" required >
			    			
			    		</div>
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-primary">Registrar Control</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop