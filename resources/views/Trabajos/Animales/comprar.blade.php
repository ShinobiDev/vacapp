@extends('Admin.layotu')
@section('header')
	<h1>
	    Animales
	    <small> En esta sección se registran las compras de animales</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Animales</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="box box-success">
			    <div class="box-header bg-success">
			      <h3 class="box-title">Ingrese los datos del animal comprado.</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('trabajos.animales.almacenarCompra') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">	
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Tipo</label>
							<select id="selTipoAnimal" name="tipo" class="form-control"  value="{{ old('tipo') }}" onchange="cargar_razas(this)" required>
								<option value="0">Selecciona un Tipo</option>
								@foreach($tipos as $tipo)
									<option value="{{ $tipo->id }}">- {{ $tipo->nombreTipo }}</option>
								@endforeach
							</select>	    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Raza</label>
							<select name="raza" id="SelRazas" class="form-control"  value="{{ old('raza') }}" required>
								<option value="0">Selecciona una Raza</option>
								@foreach($razas as $raza)
									<option value="{{ $raza->id }}">- {{ $raza->nombreRaza }}</option>
								@endforeach
							</select>
			    		</div>		    		
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Nombre Animal</label>
			    			<input name="nombreAnimal" class="form-control" placeholder="Ingrese el nombre del animal" value="{{ old('nombreAnimal') }}" required>			    			
			    		</div>
			    		
			    		
			    		<div class="form-group col-md-3">
			    			<label >NUA </label><label class="text-success">(Numero Unico Animal)</label>
			    			<input name="nua" class="form-control" placeholder="Ingrese el NUA del animal" value="{{ old('nua') }}" ></input>
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">NUA Padre </label>
			    			<input name="nuaPadre" class="form-control" placeholder="Ingrese el NUA del padre" value="{{ old('nuaPadre') }}"></input>
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Nombre Padre</label>
			    			<input list="anis" name="nombrePadre" class="form-control" placeholder="Ingrese el nombre del animal"  value="{{ old('nombrePadre') }}" required>
							<datalist id="anis">
							  	@foreach($padres as $padre)
									<option value="{{$padre->nombreAnimal}}"></option>
								@endforeach
							</datalist>			    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">NUA Madre </label>
			    			<input name="nuaMadre" class="form-control" placeholder="Ingrese el NUA de la madre" value="{{ old('nuaMadre') }}" ></input>
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Nombre Madre</label>
			    			<input name="nombreMadre" class="form-control" placeholder="Ingrese el nombre de la madre" value="{{ old('nombreMadre') }}">	
			    			<datalist id="anis">
							  	@foreach($madres as $madre)
									<option value="{{$madre->nombreAnimal}}"></option>
								@endforeach
							</datalist>	
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Finca</label>
							<select name="finca" class="form-control"  value="{{ old('finca') }}" required>
								<option value="0">Selecciona una Finca</option>
								@foreach($fincas as $finca)
									<option value="{{ $finca->id }}">- {{ $finca->nombreFinca }}</option>
								@endforeach
							</select>	    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Fecha de nacimiento</label>
			    			<input type="date" name="fechaNacimiento" max="{{$hoy}}" class="form-control" value="{{ old('fechaNacimiento') }}" required>			    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Peso Nacimiento</label>
			    			<input name="pesoNacimiento" class="form-control" placeholder="Ingrese el peso en kilogramos"  value="{{ old('peso') }}">			    			
			    		</div>
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Peso actual</label>
			    			<input name="peso" class="form-control" placeholder="Ingrese el peso en kilogramos"  value="{{ old('peso') }}" required>			    			
			    		</div>
			    		
			    		
			    		<div class="form-group col-md-3">
			    			<label class="text-success">Genero</label>
							<select name="genero" class="form-control"  value="{{ old('genero') }}" required>
								<option value="0">Selecciona un genero</option>
								@foreach($generos as $genero)
									<option value="{{ $genero->id }}">- {{ $genero->nombreGenero }}</option>
								@endforeach
							</select>	    			
			    		</div>
			    		<div class="form-group col-md-3 compra" >
			    			<label class="text-success">Fecha de la compra</label>
			    			<input type="date" name="fechaCompra" max="{{$hoy}}" class="form-control"  value="{{ old('fechaCompra') }}" required>		
			    		</div>
		                <div class="form-group col-md-3 compra" >
			    			<label class="text-success">Valor de la compra</label>
			    			<input name="valorCompra" class="form-control" placeholder="Ingrese el valor de la compra"  value="{{ old('valorCompra') }}" required>		
			    		</div>
			    		<div class="form-group col-md-3 compra">
			    			<label class="text-success">Nombre Proveedor</label>
			    			<input name="nombreProveedor" class="form-control" placeholder="Ingrese el nombre del proveedor"  value="{{ old('nombreProveedor') }}" required>		
			    		</div>
		           
			    							    		
			    		<div class="form-group col-md-2 col-md-offset-5">
			    			<button type="submit" class="btn btn-success">Crear Animal</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			<input type="hidden" id="inpUrl" value="{{config('app.url')}}">
		</div>
	</div>
	<script type="text/javascript">

		function cargar_razas(e){
				
				peticion_ajax("GET",'trabajos/razas_por_tipo/'+e.value,{},function(respuesta_servidor){
					crear_select_razas(respuesta_servidor);
				},function(e){
					console.log(e);
				});
			
		}
		function crear_select_razas(datos){
			document.getElementById("SelRazas").innerHTML="";
			var sel=document.getElementById("SelRazas");
			
			var opt = document.createElement("option");
			opt.innerHTML="Selecciona una raza";
			opt.value="0";
			sel.appendChild(opt);	
		
			for(var d in datos){
				
				
				var opt = document.createElement("option");
				opt.innerHTML=datos[d].nombreRaza;
				opt.value=datos[d].id;
				sel.appendChild(opt);
			}
		}

		 /*funcion que hace la peticion ajax 
			Metodo POST O GET
		 */ 

      function peticion_ajax(metodo,url,datos,funsuccess,funerror){
              //debe ir como core y no public la url en producccion
             $.ajaxSetup({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });

             var url_global =document.getElementById("inpUrl").value;
             $.ajax({
                   type: metodo,
                   url: url_global+"/"+url,
                   dataType: "json",
                   data:datos,
                   success: function(result){
                         
                         funsuccess(result);
                   },
	               error: function(err){
	                  if(funerror!=undefined){
	                     funerror(err);
	                  }
	                }  
	                  
	                  
               });
      }
	</script>
@stop