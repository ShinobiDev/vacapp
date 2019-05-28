@extends('Admin.layotu')
@section('header')
	<h1>
	    Ganado
	    <small> Detalle del Ganado</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Ganado</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-success">
	    <div class="box-header">
	      <h3 class="box-title">Detalle del Ganado</h3>
	    </div>
	    <!-- /.box-header -->

	    <div class="box-body table-responsive bg-success">
	    	<div class="bg-success">
	    		<h5 class="col-md-3" style="text-align: right">Total de animales</h5>
		    	<h4 class="col-md-1" style="text-align: left">{{ $totalAnimal }}</h4>
		    	<h5 class="col-md-3" style="text-align: right">Total de machos</h5>
		    	<h4 class="col-md-1" style="text-align: left">{{ $totalMachos }}</h4>
		    	<h5 class="col-md-3" style="text-align: right">Total de hembras</h5>
		    	<h4 class="col-md-1" style="text-align: left">{{ $totalHembras }}</h4>
	    	</div>	    	
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		
	        		<th>NUA</th>
	        		<th>Nombre</th>
	        		<th>Padre</th>
	        		<th>Madre</th>
	        		<th>Raza</th>
	        		<th>Finca</th>
	        		<th>Tipo</th>
	        		<th>Genero</th>
	        		<th>Clasificación</th>
	        		<th>Peso</th>
	        		<th>Fecha Nacimiento</th>
	        		<th>Acciones</th>
	        	</tr>
	        </thead>
	        
	        <tbody>

	        	@php
	        		$i = 0;
	        	@endphp
	        	@foreach($animales as $animal)
	        		<tr>
	        			
	        			<td>{{ $animal->nua }}</td>
	        			<td>{{ $animal->nombreAnimal }}</td>
	        			<td>{{ $animal->nombrePadre }}</td>
	        			<td>{{ $animal->nombreMadre }}</td>
	        			<td>{{ $animal->nombreRaza }}</td>
	        			<td>{{ $animal->nombreFinca }}</td>
	        			<td>{{ $animal->nombreTipo }}</td>
	        			<td>{{ $animal->nombreGenero }}</td>
	        			@if($diferencia[$i] <= 540)
	        				@if($animal->nombreGenero == 'Macho')
	        					<td>Ternero</td>
	        				@else
	        					<td>Ternera</td>
	        				@endif	
	        			@elseif($diferencia[$i] >= 540 && $diferencia[$i] <= 720)
	        				@if($animal->nombreGenero == 'Macho')
	        					<td>Novillo</td>
	        				@else
	        					<td>Novilla</td>
	        				@endif
	        			@elseif($diferencia[$i] >= 720)
	        				@if($animal->nombreGenero == 'Macho')
	        					<td>Toro</td>
	        				@else
	        					<td>Vaca</td>
	        				@endif
	        			@endif
	        			<td>{{ $animal->peso }}</td>
	        			<td>{{ $animal->fechaNacimiento }}</td>	

	        			
	        			<td>
	        				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$animal->id}}">Editar</button>
	        				<a href="{{ route('controlPeso.estadisticaCrecimientoIndividual',$animal->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-bar-chart-o"> </i> Crecimiento</a>
		        			
		        			
		        			<div class="modal fade" id="exampleModal{{$animal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{ route('trabajos.animales.update') }}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">

									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $animal->nombreanimal }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">

								        	<div class="form-group col-md-6">
								    			<label>NUA</label>
								    			<input name="nua" class="form-control" value="{{ $animal->nua }}"></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Nombre</label>
								    			<input type="hidden" name="animalId">
								    			<input name="nombreanimal" class="form-control" value="{{ $animal->nombreAnimal }}"></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Finca</label>
												<select name="finca" class="form-control" id="sede" required>
													<option value="{{ $animal->finca_id }}"> {{$animal->nombreFinca}} </option>
													@foreach($fincas as $finca)
														<option value="{{ $finca->id }}">- {{ $finca->nombreFinca }}</option>
													@endforeach
												</select>	    			
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Raza</label>
								    			<select name="raza" class="form-control" id="sede" required>
													<option value="{{ $animal->raza_id }}"> {{$animal->nombreRaza}} </option>
													@foreach($razas as $raza)
														<option value="{{ $raza->id }}">- {{ $raza->nombreRaza }}</option>
													@endforeach
												</select>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Tipo</label>
								    			<select name="tipo" class="form-control" id="sede" required>
													<option value="{{ $animal->tipo_id }}"> {{$animal->nombreTipo}} </option>
													@foreach($tipos as $tipo)
														<option value="{{ $tipo->id }}">- {{ $tipo->nombreRaza }}</option>
													@endforeach
												</select>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Genero</label>
								    			<select name="tipo" class="form-control" id="sede" required>
													<option value="{{ $animal->genero_id }}"> {{$animal->nombreGenero}} </option>
													@foreach($generos as $genero)
														<option value="{{ $genero->id }}">- {{ $genero->nombreGenero }}</option>
													@endforeach
												</select>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Fecha</label>
								    			<input type="date" name="fechaNacimiento" value="{{ $animal->fechaNacimiento }}" class="form-control">
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Peso</label>
								    			<input name="peso" class="form-control" value="{{ $animal->peso }}"></input>
								    		</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									        <button type="submit" class="btn btn-success">Editar animal</button>
									      </div>
									    </div>
									</div>								
								</form>
					  		</div>
		        		</td>

		        		
	        		</tr>
	        		@php	        			
	        			//dd($diferencia[$i]);
	        			$i++;
	        		@endphp	
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>	
@stop