@extends('Admin.layotu')
@section('header')
	<h1>
	    Control de Peso
	    <small> Detalle de los controles de peso realizados al animal </small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Control de peso</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los controles de peso</h3>
	      <table class="table table-bordered table-striped">
	      		<thead>
		        	<tr>
		        		
		        		<th class="text-danger">Fecha del ultimo control realizado</th>
		        		<th class="text-danger">Peso ultimo control</th>
		        		<th class="text-danger">Peso anterior al ultimo</th>
		        		
		        		@if(auth()->user()->rol_id == 1)
		        			<th>Acciones</th>
		        		@endif	
		        	</tr>
		        </thead>
		        <tbody>
		        	<tr>
		        		<td>{{ $ultimoControl->created_at }}</td>
		        		<td>{{ $ultimoControl->kilogramos }} Kgs.</td>
		        		<td>{{ $ultimoControl->pesoAntiguo }} Kgs.</td>
		        		@if(auth()->user()->rol_id == 1)
		        			<th>Acciones</th>
		        		@endif
		        	</tr>
		        </tbody>
	      </table>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		
	        		<th>Fecha del control</th>
	        		<th>Peso</th>
	        		
	        		@if(auth()->user()->rol_id == 1)
	        			<th>Acciones</th>
	        		@endif	
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($controles as $control)	
	        		<tr>
	        			
	        			<td>{{ $control->created_at }}</td>
	        			<td>{{ $control->kilogramos }}</td>
	        			
	        			@if(auth()->user()->rol_id == 1)
	        				<td>
	        					<input type="hidden" name="controlId" value="{{ $control->id }}">
	        					<a href="{{-- route('controlPeso.eliminarControlPeso', $control->id) --}}"><i class="btn btn-xs btn-danger fa fa-close"></i></a>
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