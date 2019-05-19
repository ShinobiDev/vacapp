@extends('Admin.layotu')
@section('header')
	<h1>
	    Ordeños
	    <small> Detalle del registro de los ordeños</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Ordeños</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los ordeños</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Animal</th>
	        		<th>Litros de leche</th>
	        		<th>Fecha del ordeño</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($ordenos as $ordeno)	
	        		<tr>
	        			<td>{{ $ordeno->nombreAnimal }}</td>
	        			<td>{{ $ordeno->litros }}</td>
	        			<td>{{ $ordeno->created_at }}</td>
	        			

		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
  	</div>	
@stop