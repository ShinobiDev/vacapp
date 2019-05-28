@extends('Admin.layotu')
@section('header')
	<h1>
	    Motivos de muerte
	    <small> Detalle de los motivos de las muertes de animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Motivos muerte</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los motivos de las muertes de animales</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive col-md-12 bg-warning">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		
	        		<th>Nombre motivo</th>
	        		<th>Descripción</th>
	        		@if(auth()->user()->rol_id == 1)
	        		    <th>Acciones</th>
	        		@endif
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($motivos as $motivo)	
	        		<tr>
	        			
	        			<td>{{ $motivo->nombreMotivoMuerte }}</td>
	        			<td>{{ $motivo->descripcion }}</td>
	        			
	        			@if(auth()->user()->rol_id == 1)
	        			    <td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$motivo->id}}">Editar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$motivo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{-- route('trabajos.fincas.update',[$motivo->id]) --}}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">

									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $motivo->nombreMotivoMuerte }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">

								        	
								    		<div class="form-group col-md-6">
								    			<label>Nombre</label>
								    			<input name="descripcion" class="form-control" value="{{ $motivo->nombreMotivoMuerte }}" required></input>
								    		</div>
								    		<div class="form-group col-md-12">
								    			<label>Descripción</label>
								    			<textarea name="descripcion" class="form-control" required> {{ $motivo->descripcion }}</textarea>
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