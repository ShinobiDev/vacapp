@extends('Admin.layotu')
@section('header')
	<h1>
	    Control de Peso
	    <small> Detalle del promedio de crecimiento del animal </small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Control de peso</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-danger">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los controles de peso</h3>
	    </div>
	    <div class="body">
	    	<div class="form-group">
	    		<h2 class="text-success">El animal solo tiene un registro de control de peso desde que nació.</h2>
	    		<h4>Fecha de nacimiento: {{ $nacimiento }}.</h4>
	    		<h4> Actualmente tiene, <span class="text-danger">{{ $meses }}</span> meses de vida.</h4>
	    		<h4>El peso de nacimiento es: <span class="text-danger">{{ $pesoNacimiento }}</span> Kgs.</h4>
	    		<h4>El peso actual es de: <span class="text-danger">{{ $pesoActual }}</span> Kgs.</h4>
	    		<h4>Según la raza, <span class="text-danger">{{ $raza->nombreRaza }}</span> y el genero <span class="text-danger">{{ $sexo }}</span>, el promedio esperado de crecimiento mensual es de, <span class="text-danger">{{ $pro }}</span> Kgs, mensuales.</h4>
	    		<h4>El promedio de crecimiento según su peso actual es de: <span class="text-danger">{{ $promedioMensual }}</span> Kgs. por mes, actualmente esta .</h4>
	    	</div> 
	    	
	    </div>
	
@stop	