@extends('Admin.layotu')
@section('header')
	<h1>
	    Ventas
	    <small> Detalle de las ventas</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Ventas</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-warning col-md-8">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de las Ventas</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Animal</th>
	        		<th>Valor</th>
	        		<th>Fecha</th>
	        		
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($ventas as $venta)	
	        		<tr>
	        			<td>{{ $venta->nombreAnimal }}</td>
	        			<td>{{ $venta->valorVenta }}</td>
	        			<td>{{ $venta->created_at }}</td>
	        			

		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>	
@stop