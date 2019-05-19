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
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle del Ganado</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <table id="sedes-table" class="table table-bordered table-striped">
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
	        		<th>Valor Compra</th>
	        		<th>Nombre Proveedor</th>
	        		<th>Fecha Compra</th>
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
	        			<td>{{ $animal->valorCompra }}</td>
	        			<td>{{ $animal->nombreProveedor }}</td>
	        			<td>{{ $animal->fechaCompra }}</td>
	        			{{--<td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$animal->id}}">Editar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$animal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{ route('trabajos.animals.update',[$animal->id]) }}">
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

								        	<div class="form-group col-md-12">
								    			<label>Nombre</label>
								    			<input name="nombreanimal" class="form-control" value="{{ $animal->nombreanimal }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Departamento</label>
								    			<input name="departamento" class="form-control" value="{{ $animal->departamento }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Municipio</label>
								    			<input name="municipio" class="form-control" value="{{ $animal->municipio }}" required></input>
								    		</div>
								    		<div class="form-group col-md-12">
								    			<label>Dirección</label>
								    			<input name="direccion" class="form-control" value="{{ $animal->direccion }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Telefono</label>
								    			<input name="telefono" class="form-control" value="{{ $animal->telefono }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Nombre Encargado</label>
								    			<input name="nombreEncargado" class="form-control" value="{{ $animal->nombreEncargado }}" required></input>
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
		        		</td>--}}

		        		
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