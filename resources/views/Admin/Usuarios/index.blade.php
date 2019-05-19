@extends('Admin.layotu')
@section('header')
	<h1>
	    Usuarios
	    <small> Detalle de los Usuarios</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Usuarios</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los Usuarios</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Nombre</th>
	        		<th>Rol</th>
	        		<th>Documento</th>
	        		<th>E-mail</th>
	        		<th>Finca</th>
	        		<th>Acciones</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($user as $usuario)	
	        		<tr>
	        			<td>{{ $usuario->name }}</td>
	        			<td>{{ $usuario->nombreRol }}</td>
	        			<td>{{ $usuario->documento }}</td>
	        			<td>{{ $usuario->email }}</td>
	        			<td>{{ $usuario->nombreFinca }}</td>
	        			<td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$usuario->id}}">Editar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{ route('usuarios.update',[ $usuario->id ]) }}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">

									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $usuario->name }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">

								        	<div class="form-group col-md-12">
								    			<label>Nombre</label>
								    			<input name="name" class="form-control" value="{{ $usuario->name }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
												<label>Rol</label>
												<select class="form-control" name="rol_id" required>
													<option value="0">Selecciona un rol</option>
													@foreach($roles as $rol)
														<option value="{{ $rol->id }}"> {{$rol->nombreRol}}</option>
													@endforeach
												</select>
											</div>
								    		<div class="form-group col-md-6">
								    			<label>Documento</label>
								    			<input name="documento" class="form-control" value="{{ $usuario->documento }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>E-mail</label>
								    			<input name="email" class="form-control" value="{{ $usuario->email }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
												<label>Finca</label>
												<select class="form-control" name="finca_id" required>
													<option value="0">Selecciona una finca</option>
													@foreach($fincas as $finca)
														<option value="{{ $finca->id }}"> {{$finca->nombreFinca}}</option>
													@endforeach
												</select>
											</div>

									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									        <button type="submit" class="btn btn-success">Editar usuario</button>
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