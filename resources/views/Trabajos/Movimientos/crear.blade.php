@extends('Admin.layotu')
@section('header')
	<h1>
	    Movimientos
	    <small> En esta sección podra registrar los movimientos de los animales entre fincas.</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Movimientos</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-warning">
			    <div class="box-header bg-warning">
			      <h3 class="box-title">Ingrese los datos del movimiento</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.movimientos.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
							<label>Animal</label>
							<select class="js-example-basic-single form-control" name="animal" >
							        <option value="0" required>Seleccione un animal</option>
								@foreach($animales as $animal)
									<option value="{{ $animal->id }}">{{$animal->nua}} - {{$animal->nombreAnimal}}</option>
								@endforeach
<							</select>
						</div>
			    		<div class="form-group col-md-6">
							<label>Finca</label>
							<select class="form-control" name="finca_id" required>
								<option value="0" required>Selecciona la finca destino</option>
								@foreach($fincas as $finca)

									<option value="{{ $finca->id }}">{{$finca->nombreFinca}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Motivo</label>
							<select class="form-control" name="motivo_id" required>
								<option value="0" required>Selecciona un motivo del movimiento</option>
								@foreach($motivos as $motivo)
									<option value="{{ $motivo->id }}">{{$motivo->nombreMotivo}}</option>
								@endforeach
							</select>
						</div>
			    		
			    		<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-warning">Regitrar Movimiento</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			
		</div>
	</div>
	
@stop
<script type="text/javascript">
	function vistas(animal)
	{
		var op = document.getElementById('animal').getElementByTagElement('option');

	}
</script>