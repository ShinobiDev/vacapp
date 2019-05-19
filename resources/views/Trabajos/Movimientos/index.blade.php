@extends('Admin.layotu')
@section('header')
	<h1>
	    Movimientos
	    <small> Detalle del registro de los movimientos</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Movimientos</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los movimientos</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Animal</th>
	        		<th>Finca Origen</th>
	        		<th>Finca Destino</th>
	        		<th>Motivo</th>
	        		<th>Fecha Traslado</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($movimientos as $movimiento)	
	        		<tr>
	        			<td>{{ $movimiento->animal }}</td>
	        			<td>{{ $movimiento->fincaActual }}</td>
	        			<td>{{ $movimiento->fincaDestino }}</td>
	        			<td>{{ $movimiento->nombreMotivo }}</td>
	        			<td>{{ $movimiento->created_at }}</td>
	        			<td>	        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
  	</div>	
@stop