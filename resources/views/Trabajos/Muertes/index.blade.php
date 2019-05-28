@extends('Admin.layotu')
@section('header')
	<h1>
	    Animales muertos
	    <small> Detalle de las muertes de los animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Animales muertos</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-success">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de las muertes de los animales</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive col-md-12 bg-success">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Tipo</th>
	        		<th>Raza</th>
	        		<th>Finca</th>
	        		<th>NUA</th>
	        		<th>Genero</th>
	        		<th>Motivo</th>
	        		<th>Fecha</th>
	        		@if(auth()->user()->rol_id == 1)
	        		    <th>Acciones</th>
	        		@endif
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($animales as $animal)	
	        		<tr>
	        			<td>{{ $animal->nombreTipo }}</td>
	        			<td>{{ $animal->nombreRaza }}</td>
	        			<td>{{ $animal->nombreFinca }}</td>
	        			<td>{{ $animal->nua }}</td>
	        			<td>{{ $animal->nombreGenero }}</td>
	        			<td>{{ $animal->nombreMotivoMuerte }}</td>
	        			<td>{{ $animal->fechaMuerte }}</td>
	        			@if(auth()->user()->rol_id == 1)
	        			    <td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$animal->id}}">Editar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$animal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{-- route('trabajos.fincas.update',[$animal->id]) --}}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">

									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $animal->nombreClasificacion }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">

								        	<div class="form-group col-md-6">
								    			<label>Nombre</label>
								    			<input name="nombreFinca" class="form-control" value="{{ $animal->nombreClasificacion }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Departamento</label>
								    			<input name="departamento" class="form-control" value="{{ $animal->nombreClasificacion }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Municipio</label>
								    			<input name="municipio" class="form-control" value="{{ $animal->inicioanimal }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Dirección</label>
								    			<input name="direccion" class="form-control" value="{{ $animal->finEtapa }}" required></input>
								    		</div>
								    		

									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									        <button type="submit" class="btn btn-success">Editar Finca</button>
									      </div>
									    </div>
									</div>								
								</form>
					  		</div>
					  		
		        		</td>
                        @endif
		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>	
@stop