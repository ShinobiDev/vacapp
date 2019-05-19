@extends('Admin.layotu')
@section('header')
	<h1>
	    Servicios
	    <small> Detalle de los servicios realizados a los animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Servicios</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los servicios</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Animal</th>
	        		<th>Servicio</th>
	        		<th>Fecha</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($servicios as $servicio)	
	        		<tr>
	        			<td>{{ $servicio->nombreAnimal }}</td>
	        			<td>{{ $servicio->nombreServicio }}</td>
	        			<td>{{ $servicio->created_at }}</td>		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>	
@stop