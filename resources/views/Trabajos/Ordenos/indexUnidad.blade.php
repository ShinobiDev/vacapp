@extends('Admin.layotu')

@section('header')
	
	<h1>
	    Unidades de Medidas para los ordeños
	    <small> Detalle de las unidades de medidas para los ordeños</small>
	    <br><br>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Unidades de ordeño</li>
  	</ol>
@stop

@section('contenido') 

	<div class="box box-danger">
		@if($mensaje == 1)
			<h2 class="bg-danger col-md-12 text-danger" style="text-align: center">No se han creado unidades de medida</h2>
		@endif
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los ordeños</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Nombre unidad</th>
	        		<th>Descripción</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($unidades as $unidad)	
	        		<tr>
	        			<td>{{ $unidad->nombreUnidad }}</td>
	        			<td>{{ $unidad->descripcion }}</td>    		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
  	</div>	
@stop