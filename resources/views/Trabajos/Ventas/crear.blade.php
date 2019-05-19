@extends('Admin.layotu')
@section('header')
	<h1>
	    Ventas
	    <small> En esta sección podra registrar las ventas de los animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Ventas</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-success">
			    <div class="box-header bg-success">
			      <h3 class="box-title">Ingrese los datos de la venta</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.ventas.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
							<label>Animal</label>
							<select class="form-control" name="animal_id" required>
								<option value="0">Selecciona un animal</option>
								@foreach($animales as $animal)
									<option value="{{ $animal->id }}">{{$animal->nua}} - {{$animal->nombreAnimal}}</option>
								@endforeach
							</select>
						</div>
			    		<div class="form-group col-md-12">
			    			<label>Valor Venta</label>
			    			<input type="text" name="valorVenta" class="form-control" placeholder="Ingrese el valor de la venta" required>
			    		</div>
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-success">Registrar Venta</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop