@extends('Admin.layotu')
@section('header')
	<h1>
	    Tipos
	    <small> Detalle de las tipos</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Tipos</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-warning col-md-8">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los tipos</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body col-md-12 bg-success table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Nombre</th>
	        		<th>Descripción</th>
	        		@if(auth()->user()->rol_id == 1)
	        		    <th>Acciones</th>
	        		@endif
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($tipos as $tipo)	
	        		<tr>
	        			<td>{{ $tipo->nombreTipo }}</td>
	        			<td>{{ $tipo->descripcion }}</td>
	        			@if(auth()->user()->rol_id == 1)
	        			    <td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$tipo->id}}">Editar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$tipo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{ route('trabajos.tipos.update',[$tipo->id]) }}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">

									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $tipo->nombreTipo }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">

								        	<div class="form-group col-md-12">
								    			<label>Nombre</label>
								    			<input name="nombreTipo" class="form-control" value="{{ $tipo->nombreTipo }}" required></input>
								    		</div>
								    		<div class="form-group col-md-12">
								    			<label>Descripción</label>
								    			<textarea name="descripcion" class="form-control" required>{{ $tipo->descripcion }}</textarea>
								    			
								    		</div>
								    		

									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									        <button type="submit" class="btn btn-success">Editar tipo</button>
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