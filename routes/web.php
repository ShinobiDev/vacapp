<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::auth();

Route::get('/', function () {
    return redirect()->route('login');
});

	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register/CrearUsuario', 'Auth\UsuariosController@crear')->name('registrarNuevoUsuario');

    // Password Reset Routes...
    /*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
	*/
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'], function(){
	/*Vista del panel administrativo*/
	Route::get('/', 'UsuariosController@panel');

	Route::get('/usaurio', 'UsuariosController@panelProximoVencer')->name('Usaurio.proximoVencer');

	/*Vista de todas las Fincas*/
	Route::get('usuarios','UsuariosController@index')->name('usuarios.index');
	/*Vista para Crear usuarios*/
	Route::get('usuarios/crear','UsuariosController@crear')->name('usuarios.crear');
	/*Ingreso de datos de la nueva Finca*/
	Route::post('usuarios/almacenar','UsuariosController@almacenar')->name('usuarios.almacenar');
	/*Vista del formulario para actuzalizar las usuarios*/
	Route::post('usuarios/editar/{usuario_id}','UsuariosController@actualizar')->name('usuarios.update');
	/*Vista del formulario para actuzalizar la contraseña*/
	Route::get('usuarios/cambioContrasena','UsuariosController@cambioContrasena')->name('usuarios.cambioContrasena');
	/*Ingreso de datos de la nueva Finca*/
	Route::post('usuarios/actualizarContrasena','UsuariosController@actualizarContrasena')->name('usuarios.actualizarContrasena');

});

Route::group(['prefix'=>'trabajos','namespace'=>'Trabajos','middleware'=>'auth'], function(){

	/*Vista de todas los Tipos de animal*/
	Route::get('tipos','TiposController@index')->name('tipos.index');
	/*Vista para Crear tipos de animal*/
	Route::get('tipos/crear','TiposController@crear')->name('tipos.crear');
	/*Ingreso de datos del nuevo tipo de animal*/
	Route::post('tipos/almacenar','TiposController@almacenar')->name('trabajos.tipos.almacenar');
	/*Vista del formulario para actuzalizar las tipos de animal*/
	Route::post('tipos/editar/{tipo_id}','TiposController@actualizar')->name('trabajos.tipos.update');

	/*Vista de todas los utilidades*/
	Route::get('utilidades','UtilidadesController@index')->name('utilidades.index');
	/*Vista para Crear utilidades de animal*/
	Route::get('utilidades/crear','UtilidadesController@crear')->name('utilidades.crear');
	/*Ingreso de datos de la nueva utilidad*/
	Route::post('utilidades/almacenar','UtilidadesController@almacenar')->name('trabajos.utilidades.almacenar');
	/*Vista del formulario para actuzalizar las utilidades de animal*/
	Route::post('utilidades/editar/{utilidad_id}','UtilidadesController@actualizar')->name('trabajos.utilidades.update');
	
	/*Vista de todas las Fincas*/
	Route::get('fincas','FincasController@index')->name('fincas.index');
	/*Vista para Crear Fincas*/
	Route::get('fincas/crear','FincasController@crear')->name('fincas.crear');
	/*Ingreso de datos de la nueva Finca*/
	Route::post('fincas/almacenar','FincasController@almacenar')->name('trabajos.fincas.almacenar');
	/*Vista del formulario para actuzalizar las Fincas*/
	Route::post('fincas/editar/{finca_id}','FincasController@actualizar')->name('trabajos.fincas.update');

	
	/*Vista de todas la Razas*/
	Route::get('razas','RazasController@index')->name('razas.index');
	/*Vista para crear las Razas*/
	Route::get('razas/crear','RazasController@crear')->name('razas.crear');
	/*Ingreso de datos de la nueva Razas*/
	Route::post('razas/almacenar','RazasController@almacenar')->name('trabajos.razas.almacenar');
	/*Vista del formulario para actualizar las Razas*/
	Route::post('razas/editar/{raza_id}','RazasController@actualizar')->name('trabajos.razas.update');
	/*Consulta de ajax para raza, de acuerdo al tipo de animal*/
	Route::get('razas_por_tipo/{id}','RazasController@razas_por_tipo');
	/*Vista de todas la Razas*/
	Route::get('clasificacion','RazasController@indexClasificacion')->name('razas.indexClasificacion');
	/*Vista para crear las Razas*/
	Route::get('clasificacion/crear','RazasController@crearClasificacion')->name('razas.crearClasificacion');
	/*Ingreso de datos de la nueva Razas*/
	Route::post('clasificacion/almacenar','RazasController@almacenarClasificacion')->name('trabajos.razas.almacenarClasificacion');

	
	/*Vista de todos los Servicios*/
	Route::get('servicios','ServiciosController@index')->name('servicios.index');
	/*Vista de todos los Servicios REalizados a cada animal*/
	Route::get('servicios/historial','ServiciosController@vistaHistorial')->name('servicios.verServicios');
	/*Vista para crear los servicios*/
	Route::get('servicios/crear','ServiciosController@crear')->name('servicios.crear');
	/*Ingreso de datos del nuevo Servicio*/
	Route::post('servicios/almacenar','ServiciosController@almacenar')->name('trabajos.servicios.almacenar');
	/*Vista del formulario para actualizar los Servicios*/
	Route::post('servicios/editar/{servicio_id}','serviciosController@actualizar')->name('trabajos.servicios.update');
	/*Registrar un servicio realizado*/
	Route::get('servicios/registrar','ServiciosController@registrar')->name('servicios.registrar');
	/*Ingreso de datos del servicio realizado*/
	Route::post('servicios/ingresarServicio','ServiciosController@ingresarServicio')->name('trabajos.servicios.ingresarServicio');


	/*Vista de todos los animales*/
	Route::get('animales','AnimalesController@index')->name('animales.index');
	/*Vista para crear los animales*/
	Route::get('animales/crear','AnimalesController@crear')->name('animales.crear');
	/*Ingreso de datos del nuevo Animal*/
	Route::post('animales/almacenar','AnimalesController@almacenar')->name('trabajos.animales.almacenar');
	/*Vista para crear los animales*/
	Route::get('animales/comprar','AnimalesController@comprar')->name('animales.comprar');
	/*Ingreso de datos para actualizar los animales*/
	Route::post('animales/almacenarCompra','AnimalesController@almacenarCompra')->name('trabajos.animales.almacenarCompra');
	/*Vista de todos los animales comprados*/
	Route::get('animalesCompra','AnimalesController@indexCompra')->name('animales.indexCompra');
	/*Vista del formulario para actualizar los animales*/
	Route::post('animales/editar','AnimalesController@actualizarAnimal')->name('trabajos.animales.update');
	/*Vista de las crias*/
	Route::get('animales/crias','AnimalesController@crias')->name('animales.crias');
	

	/*Formulario para el registro de muertes de animales*/
	Route::get('animales/muertes','AnimalesController@registroMuerte')->name('animales.muertes.crear');
	/*Ingreso de datos al sistema*/
	Route::post('muertes/almacenar','AnimalesController@almacenarMuerte')->name('trabajos.muertes.almacenarMuerte');
	/*vista de animales muertos*/
	Route::get('animales/muertesIndex','AnimalesController@indexMuerte')->name('animales.muertes.index');

	/*Formulario para crear motivos de muerte*/
	Route::get('animales/motivosMuertes','AnimalesController@registroMotivoMuerte')->name('animales.motivosMuertes.crear');
	/*Almacener los motivos de la muerte*/
	Route::post('animales/almacenarMotivoMuertes','AnimalesController@almacenarMotivoMuerte')->name('trabajos.muertes.almacenarMotivoMuerte');
	/*Ver los motivos de muerte de animales*/
	Route::get('animales/indexMotivoMuerte','AnimalesController@indexMotivoMuerte')->name('animales.motivosMuerte.index');

	
	/*Vista de todos los Ordeños*/
	Route::get('ordenos','OrdenosController@index')->name('ordenos.index');
	/*Vista del formulario para crear los ordeños*/
	Route::get('ordenos/crear','OrdenosController@registrar')->name('ordenos.registrarOrdeno');
	/*Ingreso de datos del registro de los ordeños*/
	Route::post('ordenos/almacenar','OrdenosController@almacenar')->name('trabajos.ordenos.almacenar');
	/*Vista del formulario para actualizar los ordeños*/
	Route::post('ordenos/editar/{animal_id}','OrdenosController@actualizar')->name('trabajos.ordenos.update');

	
	/*Vista de todas las unidades de ordeños*/
	Route::get('unidadOrdenos','OrdenosController@indexUnidad')->name('ordenos.indexUnidades');
	/*Vista del formulario para crear las unidades de ordeños*/
	Route::get('unidadOrdenos/crear','OrdenosController@registrarUnidad')->name('ordenos.crearUnidadOrdeno');
	/*Ingreso de datos del registro de las unidades de ordeños*/
	Route::post('unidadOrdenos/almacenar','OrdenosController@almacenarUnidad')->name('trabajos.ordenos.almacenarUnidad');
	/*Vista del formulario para actualizar las unidades de ordeños*/
	//Route::post('ordenos/editar/{animal_id}','OrdenosController@actualizarUnidad')->name('trabajos.ordenos.update');

	
	/*Vista de todos los Controles de Peso*/
	Route::get('controlPeso/index','AnimalesController@indexControlPeso')->name('controlPeso.index');
	/*Vista del formulario para crear los controles de Peso*/
	Route::get('controlPeso/crear','AnimalesController@registrarControlPeso')->name('controlPeso.registrarControlPeso');
	/*Ingreso de datos del registro del control de peso*/
	Route::post('controlPeso/almacenar','AnimalesController@almacenarControlPeso')->name('trabajos.controlPeso.almacenar');
	/*Vista del formulario para actualizar los controles de Peso*/
	Route::post('controlPeso/editar/{controlId}','AnimalesController@actualizarControlPeso')->name('trabajos.controlPeso.update');
	/*Vista del formulario para crear los controles de Peso*/
	Route::get('controlPeso/eliminar/{control_id}','AnimalesController@eliminarControlPeso')->name('controlPeso.eliminarControlPeso');


	Route::get('controlPeso/estadisticaCrecimiento/{animal_id}','EstadisticaCrecimientoController@vistaIndividual')->name('controlPeso.estadisticaCrecimientoIndividual');	

	
	/*Vista de los movimientos*/
	Route::get('movimientos','AnimalesController@indexMovimientos')->name('movimientos.index');
	/*Vista del formulario para crear los controles de Peso*/
	Route::get('movimientos/crear','AnimalesController@registrarMovimientos')->name('movimientos.registrarMovimientos');
	/*Ingreso de datos del registro del control de peso*/
	Route::post('movimientos/almacenar','AnimalesController@almacenarMovimientos')->name('trabajos.movimientos.almacenar');
	/*Vista del formulario para actualizar los controles de Peso*/
	Route::post('movimientos/editar/{animal_id}','AnimalesController@actualizarMovimientos')->name('trabajos.movimientos.update');

	
	/*Vista de la ventas*/
	Route::get('ventas','AnimalesController@indexVentas')->name('ventas.index');
	/*Vista del formulario para crear una venta*/
	Route::get('ventas/crear','AnimalesController@registrarVentas')->name('ventas.registrarVentas');
	/*Ingreso de datos del registro de la venta*/
	Route::post('ventas/almacenar','AnimalesController@almacenarVentas')->name('trabajos.ventas.almacenar');
	/*Vista del formulario para actualizar las ventass*/
	Route::post('ventas/editar/{animal_id}','AnimalesController@actualizarVentas')->name('trabajos.ventas.update');

	/*Vista de todos los Eventos*/
	Route::get('eventos','EventosController@index')->name('eventos.index');
	/*Vista del formulario para crear los ordeños*/
	Route::get('eventos/crear','EventosController@crear')->name('eventos.crear');
	/*Ingreso de datos del registro de los ordeños*/
	Route::post('eventos/almacenar','EventosController@almacenar')->name('trabajos.eventos.almacenar');
	/*Vista del formulario para actualizar los ordeños*/
	Route::post('eventos/editar/{animal_id}','EventosController@actualizar')->name('trabajos.eventos.update');




});


