@extends('Admin.layotu')
@section('header')
	<h1>
	    Control de Crias
	    <small> Detalle de las cantidades de las crias por animal</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Crias</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger ">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de las crias por animal</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Animal</th>
	        		<th>Genero</th>
	        		<th>Crias</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($crias as $cria)	
	        		<tr>
	        			<td>{{ $cria->nombreAnimal }}</td>
	        			<td>{{ $cria->nombreGenero }}</td>
	        			<td>{{ $cria->hijos }}</td>
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>	
@stop