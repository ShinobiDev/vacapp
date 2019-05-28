<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('adminLte/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  
  <link rel="stylesheet" href="{{asset('adminLte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLte Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="{{asset('adminLte/dist/css/skins/skin-green.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLte/plugins/datatables/dataTables.bootstrap.css')}}">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ asset('/admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Lol</b>App</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Lol</b>App</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <i class="fa fa-user"></i>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                
                <img src="{{asset('adminLte/img/logoPe.png')}}" class="img-circle" alt="User Image">
                <p>
                  {{ auth()->user()->name }}
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <form method="POST" action="{{route('logout')}}">
                   {{csrf_field()}}
                    <!--<a href="#" class="btn btn-default btn-flat">Cerrar Sesión</a>-->

                     <button>Cerrar sesión</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
         
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('adminLte/img/logoPe.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <!-- Status -->
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->

        <!--Tipos de animales-->
        <li class="treeview">
          <a href="#"><i class="fa fa-sitemap"></i> <span>Tipos de animal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('tipos.index')}}"><i class="fa fa-eye"></i>Ver Los tipos</a></li>
            @if(auth()->user()->rol_id == 1)
                <li><a href="{{route('tipos.crear')}}"><i class="fa fa-pencil"></i>Registrar tipo de animal</a></li>
                {{--<li><a href="{{route('animales.indexCompra')}}"><i class="fa fa-eye"></i>Ver Animales Comprados</a></li>--}}
            @endif
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-paw"></i> <span>Animales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('animales.index')}}"><i class="fa fa-eye"></i>Ver Animales</a></li>
            @if(auth()->user()->rol_id == 1)
                <li><a href="{{route('animales.crear')}}"><i class="fa fa-pencil"></i>Registrar Nacimiento</a></li>
                {{--<li><a href="{{route('animales.indexCompra')}}"><i class="fa fa-eye"></i>Ver Animales Comprados</a></li>--}}
                <li><a href="{{route('animales.comprar')}}"><i class="fa fa-pencil"></i>Registrar Compra</a></li>
                <li><a href="{{route('animales.crias')}}"><i class="fa fa-pencil"></i>Control de crias</a></li>
               
            @endif
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-star"></i> <span>Eventos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(auth()->user()->rol_id == 1)
                <li><a href="{{route('eventos.crear')}}"><i class="fa fa-pencil"></i>Crear evento</a></li>
            @endif
            <li><a href="{{ route('eventos.index') }}"><i class="fa fa-eye"></i>Ver eventos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-frown-o"></i> <span>Animales muertos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(auth()->user()->rol_id == 1)
                <li><a href="{{route('animales.motivosMuertes.crear')}}"><i class="fa fa-pencil"></i>Crear motivo muerte</a></li>
                <li><a href="{{route('animales.motivosMuerte.index')}}"><i class="fa fa-eye"></i>Ver motivo muerte</a></li>
                <li><a href="{{route('animales.muertes.crear')}}"><i class="fa fa-pencil"></i>Registrar animal muerto</a></li>
                
            @endif
            <li><a href="{{ route('animales.muertes.index') }}"><i class="fa fa-eye"></i>Ver animales muertos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-paperclip"></i> <span>Utilidades del animal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(auth()->user()->rol_id == 1)
                <li><a href="{{route('utilidades.crear')}}"><i class="fa fa-pencil"></i>Crear</a></li>
            @endif
            <li><a href="{{ route('utilidades.index') }}"><i class="fa fa-eye"></i>Ver</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-sitemap"></i> <span>Razas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(auth()->user()->rol_id == 1)
                <li><a href="{{route('razas.crear')}}"><i class="fa fa-pencil"></i>Crear raza</a></li>
                <li><a href="{{ route('razas.index') }}"><i class="fa fa-eye"></i>Ver razas</a></li>
                <li><a href="{{route('razas.crearClasificacion')}}"><i class="fa fa-pencil"></i>Crear clasificación</a></li>
                <li><a href="{{route('razas.indexClasificacion')}}"><i class="fa fa-pencil"></i>Ver clasificaciones</a></li>
                
            @endif
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-home"></i> <span>Fincas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(auth()->user()->rol_id == 1)
                <li><a href="{{route('fincas.crear')}}"><i class="fa fa-pencil"></i>Crear</a></li>
            @endif
            <li><a href="{{ route('fincas.index') }}"><i class="fa fa-eye"></i>Ver</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-beer"></i> <span>Ordeños</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('ordenos.crearUnidadOrdeno')}}"><i class="fa fa-pencil"></i>Crear unidad ordeño</a></li>
            <li><a href="{{ route('ordenos.indexUnidades') }}"><i class="fa fa-eye"></i>Ver unidades</a></li>
            <li><a href="{{route('ordenos.registrarOrdeno')}}"><i class="fa fa-pencil"></i>Registrar ordeño</a></li>
            <li><a href="{{ route('ordenos.index') }}"><i class="fa fa-eye"></i>Ver ordeños</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa  fa-balance-scale"></i> <span>Control de Peso</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('controlPeso.registrarControlPeso') }}"><i class="fa fa-pencil"></i>Crear</a></li>
            <li><a href="{{ route('controlPeso.index') }}"><i class="fa fa-eye"></i>Ver</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-skyatlas"></i> <span>Servicios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(auth()->user()->rol_id == 1)
                <li><a href="{{route('servicios.crear')}}"><i class="fa fa-pencil"></i>Crear servicio</a></li>
            @endif
            <li><a href="{{ route('servicios.index') }}"><i class="fa fa-eye"></i>Ver servicios</a></li>
            <li><a href="{{ route('servicios.registrar') }}"><i class="fa fa-eye"></i>Registrar Servicio</a></li>
            <li><a href="{{ route('servicios.verServicios') }}"><i class="fa fa-eye"></i>Servicios realizados</a>
            {{--<li><a href="#"><i class="fa fa-eye"></i>Registrar</a></li>--}}

          </ul>
        </li>
        @if(auth()->user()->rol_id == 1)
            <li class="treeview">
              <a href="#"><i class="fa fa-exchange"></i> <span>Movimientos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('movimientos.registrarMovimientos')}}"><i class="fa fa-pencil"></i>Crear</a></li>
                <li><a href="{{ route('movimientos.index') }}"><i class="fa fa-eye"></i>Ver</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-money"></i> <span>Ventas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('ventas.registrarVentas')}}"><i class="fa fa-pencil"></i>Crear</a></li>
                <li><a href="{{ route('ventas.index') }}"><i class="fa fa-eye"></i>Ver</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> <span>Usuarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('usuarios.crear')}}"><i class="fa fa-pencil"></i>Crear</a></li>
                <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-eye"></i>Ver</a></li>
                <li><a href="{{ route('usuarios.cambioContrasena') }}"><i class="fa fa-eye"></i>Cambio Contraseña</a></li>
              </ul>
            </li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('header')
    </section>

    <!-- Main content -->
    <section class="content">
    <!--Contenido de la aplicación-->
    @if(session()->has('flash'))
        <div class="alert alert-success">{{ session('flash') }}</div>
      @endif
      @if(session()->has('errors'))
        
        <div class="alert alert-danger">{{ session('errors') }}</div>
      @endif

    @yield('contenido')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <center>
            <a href="http://prismaweb.co/diseno-a-la-medida/" target="_blank" >Desarrollado por: </a>
            <a href="http://prismaweb.co/diseno-a-la-medida/" target="_blank" ><img src="http://www.prismaweb.net/img/prismaweb-footer-webs-gris.png" alt="WWW.PRISMAWEB.CO - Skype: prismaweb22" /></a>
        </center>
  </footer>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('adminLte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('adminLte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLte App -->
<script src="{{asset('adminLte/dist/js/app.min.js')}}"></script>
<script src="{{asset('adminLte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  $(function (){
    /*DATATABLE*/
    $('#example1').DataTable( {
                    stateSave: false,
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    language:
                      {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                } );
    /* FIN DATATABLE*/                                
  });
</script>
</body>
</html>
