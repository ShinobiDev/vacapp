@extends('Admin.layotu')
@section('header')
	<h1>
	    Fincas
	    <small> Detalle de las fincas</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Fincas</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de las fincas</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive col-md-12 bg-warning">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Nombre</th>
	        		<th>Departamento</th>
	        		<th>Municipio</th>
	        		<th>Dirección</th>
	        		<th>Telefono</th>
	        		<th>Encargado</th>
	        		@if(auth()->user()->rol_id == 1)
	        		    <th>Acciones</th>
	        		@endif
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($fincas as $finca)	
	        		<tr>
	        			<td>{{ $finca->nombreFinca }}</td>
	        			<td>{{ $finca->departamento }}</td>
	        			<td>{{ $finca->municipio }}</td>
	        			<td>{{ $finca->direccion }}</td>
	        			<td>{{ $finca->telefono }}</td>
	        			<td>{{ $finca->nombreEncargado }}</td>
	        			@if(auth()->user()->rol_id == 1)
	        			    <td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$finca->id}}">Editar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$finca->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{ route('trabajos.fincas.update',[$finca->id]) }}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">

									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $finca->nombreFinca }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">

								        	<div class="form-group col-md-12">
								    			<label>Nombre</label>
								    			<input name="nombreFinca" class="form-control" value="{{ $finca->nombreFinca }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Departamento</label>
								    			<input name="departamento" class="form-control" value="{{ $finca->departamento }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Municipio</label>
								    			<input name="municipio" class="form-control" value="{{ $finca->municipio }}" required></input>
								    		</div>
								    		<div class="form-group col-md-12">
								    			<label>Dirección</label>
								    			<input name="direccion" class="form-control" value="{{ $finca->direccion }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Telefono</label>
								    			<input name="telefono" class="form-control" value="{{ $finca->telefono }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Nombre Encargado</label>
								    			<input name="nombreEncargado" class="form-control" value="{{ $finca->nombreEncargado }}" required></input>
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