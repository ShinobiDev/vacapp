@extends('Admin.layotu')
@section('header')
	<h1>
	    Servicios
	    <small> Detalle de los servicios</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Servicios</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-success">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los servicios</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Nombre</th>
	        		<th>Descripción</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($servicios as $servicio)	
	        		<tr>
	        			<td>{{ $servicio->nombreServicio }}</td>
	        			<td>{{ $servicio->descripcion }}</td>
	        			<td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$servicio->id}}">Editar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$servicio->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{ route('trabajos.servicios.update',[$servicio->id]) }}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">

									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $servicio->nombreServicio }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">

								        	<div class="form-group col-md-12">
								    			<label>Nombre</label>
								    			<input name="nombreServicio" class="form-control" value="{{ $servicio->nombreServicio }}" required></input>
								    		</div>
								    		<div class="form-group col-md-12">
								    			<label>Descripción</label>
								    			<textarea name="descripcion" class="form-control" required>{{ $servicio->descripcion }}</textarea>
								    			
								    		</div>
								    		

									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									        <button type="submit" class="btn btn-success">Editar Servicio</button>
									      </div>
									    </div>
									</div>								
								</form>
					  		</div>
		        		</td>

		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>	
@stop