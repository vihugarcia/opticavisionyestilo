<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">			

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	
	<title>Panel Administración ADMIN - Visión y Estilo</title>

	<link href="css/dashboard.css" rel="stylesheet">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/dashboard">
          <span class="align-middle">Panel Admin</span>
        </a>

		<ul class="sidebar-nav">
			@if(Auth::user()->vendedor || Auth::user()->admin)
				<li class="sidebar-header">
					Configuración
				</li>
				<li class="sidebar-item active">
					<a class="sidebar-link" href="/configuracion">
					<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Configuración General</span>
					</a>
				</li>

			   <li class="sidebar-header">
				   Productos
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/altaproducto">
				   <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Alta Productos</span>
				   </a>
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/editarproductos">
				   <i class="align-middle" data-feather="map"></i> <span class="align-middle">Editar Productos</span>
				   </a>
			   </li>		
			    <li class="sidebar-item">
				   <a class="sidebar-link" href="/altacristal">
				   <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Alta Cristal</span>
				   </a>
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/editarcristales">
				   <i class="align-middle" data-feather="map"></i> <span class="align-middle">Editar Cristales</span>
				   </a>
			   </li>				 							 
			   <li class="sidebar-header">
				   Médicos
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/dashboard">
				   <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Alta Medico</span>
				   </a>
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/editarmedicos">
				   <i class="align-middle" data-feather="user"></i> <span class="align-middle">Editar Medicos</span>
				   </a>
			   </li>
			   <li class="sidebar-header">
				   Vendedores
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/altavendedor">
				   <i class="align-middle" data-feather="square"></i> <span class="align-middle">Alta Vendedores</span>
				   </a>
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/editarvendedores">
				   <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Editar Vendedores</span>
				   </a>
			   </li>
			 @endif
			 @if(Auth::user()->vendedor || Auth::user()->medico || Auth::user()->admin) 		
			   <li class="sidebar-header">
				   Pacientes
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/altausuario">
				   <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Alta Paciente</span>
				   </a>
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/editarusuarios">
				   <i class="align-middle" data-feather="map"></i> <span class="align-middle">Editar Paciente</span>
				   </a>
			   </li>						  		 
			 @endif
			 @if(Auth::user()->medico || Auth::user()->admin)
			   <li class="sidebar-header">
				   Recetas
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/altareceta">
				   <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Generar Receta</span>
				   </a>
			   </li>
			   <li class="sidebar-item">
				   <a class="sidebar-link" href="/editarreceta">
				   <i class="align-middle" data-feather="map"></i> <span class="align-middle">Editar Receta</span>
				   </a>
			   </li>	
			@endif
		  </ul>

			
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          			<i class="hamburger align-self-center"></i>
        		</a>
        		<img src="img/logo.png">
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">											
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                				<i class="align-middle" data-feather="settings"></i>
              				</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img @if(Auth::user()->admin) src="img-perfil/perfil.png" @endif
								@if(Auth::user()->medico) src="img-perfil/{{Auth::user()->medico->img}}" @endif
								@if(Auth::user()->vendedor) src="img-perfil/{{Auth::user()->vendedor->img}}" @endif
								@if(Auth::user()->admin) src="img-perfil/perfil.png" @endif
								class="avatar img-fluid rounded me-1" alt="{{Auth::user()->name}}" />
								<span class="text-dark">{{ Auth::user()->name }}</span>
              				</a>

							<div class="dropdown-menu dropdown-menu-end">								
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<button class="dropdown-item" type="submit">Cerrar Sesión</button>
								</form>
							</div>							
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">


				<div class="container p-0">
					@if(session()->has('success'))
						<div class="alert alert-success">La configuracion se guardo con éxito </div>		
				  @endif

					<h1 class="h3 mb-3"><strong>Configuración General</strong></h1>
					
					
							<form method="POST" action="/guardartipocambio" enctype="multipart/form-data">          
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
								<div class="form-group row">
									<label for="tipo_cambio_blue" class="col-md-4 col-form-label text-md-right">Valor Tipo de Cambio Blue</label>
									<div class="col-md-6">
										<input type="hidden" value="{{$tipo_cambio_blue->id}}" name="tipo_blue_id">
										<input id="tipo_cambio_blue" type="text" class="form-control" name="tipo_cambio_blue" value="{{$tipo_cambio_blue->valor}}">                
									</div>
								</div>
						
								<div class="form-group row">
									<label for="tipo_cambio_oficial" class="col-md-4 col-form-label text-md-right">Valor Tipo de Cambio Oficial</label>
									<div class="col-md-6">
										<input type="hidden" value="{{$tipo_cambio_oficial->id}}" name="tipo_oficial_id">
										<input id="tipo_cambio_oficial" type="text" class="form-control" name="tipo_cambio_oficial" value="{{$tipo_cambio_oficial->valor}}">                
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12" style="text-align: center">
										<button type="submit" class="btn btn-secondary text-center">Guardar cambios</button>
									</div>
								</div>

							</form>

							<form method="POST" action="/guardarmarca" enctype="multipart/form-data">  
								<input type="hidden" name="_token" value="{{ csrf_token() }}">        
								<h1 class="h3 mb-3">Agregar Marca</h1>
								<div class="form-group row">
									<label for="nombre_marca" class="col-md-4 col-form-label text-md-right"> Nombre de la marca </label>
									<div class="col-md-6">
										<input id="nombre_marca" type="text" class="form-control" name="marca">                
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12" style="text-align: center">
										<button type="submit" class="btn btn-secondary text-center">Guardar Marca</button>
									</div>
								</div>

							</form>

							<form method="POST" action="/guardarcolor" enctype="multipart/form-data">  
								<input type="hidden" name="_token" value="{{ csrf_token() }}">        
								<h1 class="h3 mb-3">Agregar Color</h1>
								<div class="form-group row">
									<label for="nombre_color" class="col-md-4 col-form-label text-md-right"> Nombre del color</label>
									<div class="col-md-6">
										<input id="nombre_color" type="text" class="form-control" name="color">                
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12" style="text-align: center">
										<button type="submit" class="btn btn-secondary text-center">Guardar Color</button>
									</div>
								</div>

							</form>


							<form method="POST" action="/guardarmaterial" enctype="multipart/form-data">  
								<input type="hidden" name="_token" value="{{ csrf_token() }}">        
								<h1 class="h3 mb-3">Agregar Material</h1>
								<div class="form-group row">
									<label for="nombre_material" class="col-md-4 col-form-label text-md-right"> Nombre del material</label>
									<div class="col-md-6">
										<input id="nombre_material" type="text" class="form-control" name="material">                
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12" style="text-align: center">
										<button type="submit" class="btn btn-secondary text-center">Guardar Material</button>
									</div>
								</div>

							</form>


							<form method="POST" action="/guardarcalibre" enctype="multipart/form-data">  
								<input type="hidden" name="_token" value="{{ csrf_token() }}">        

								<h1 class="h3 mb-3">Calibre Límites</h1>
								<input type="hidden" value="{{$calibre_limites[0]->id}}" name="calibre_s_id">
								<div class="form-group row">
									<label for="calibre_s_desde" class="col-md-4 col-form-label text-md-right"> S (Desde) </label>
									<div class="col-md-6">
										<input id="calibre_s_desde" type="text" class="form-control" name="calibre_s_desde" value="{{$calibre_limites[0]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="calibre_s_hasta" class="col-md-4 col-form-label text-md-right"> S (Hasta) </label>
									<div class="col-md-6">
										<input id="calibre_s_hasta" type="text" class="form-control" name="calibre_s_hasta" value="{{$calibre_limites[0]->hasta}}">                
									</div>
								</div>

								<input type="hidden" value="{{$calibre_limites[1]->id}}" name="calibre_m_id">
								<div class="form-group row">
									<label for="calibre_m_desde" class="col-md-4 col-form-label text-md-right"> M (Desde) </label>
									<div class="col-md-6">
										<input id="calibre_m_desde" type="text" class="form-control" name="calibre_m_desde" value="{{$calibre_limites[1]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="calibre_m_hasta" class="col-md-4 col-form-label text-md-right"> M (Hasta) </label>
									<div class="col-md-6">
										<input id="calibre_m_hasta" type="text" class="form-control" name="calibre_m_hasta" value="{{$calibre_limites[1]->hasta}}">                
									</div>
								</div>

								<input type="hidden" value="{{$calibre_limites[2]->id}}" name="calibre_l_id">
								<div class="form-group row">
									<label for="calibre_l_desde" class="col-md-4 col-form-label text-md-right"> L (Desde) </label>
									<div class="col-md-6">
										<input id="calibre_l_desde" type="text" class="form-control" name="calibre_l_desde" value="{{$calibre_limites[2]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="calibre_l_hasta" class="col-md-4 col-form-label text-md-right"> L (Hasta) </label>
									<div class="col-md-6">
										<input id="calibre_l_hasta" type="text" class="form-control" name="calibre_l_hasta" value="{{$calibre_limites[2]->hasta}}">                
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12" style="text-align: center">
										<button type="submit" class="btn btn-secondary text-center">Guardar Calibre</button>
									</div>
								</div>

							</form>

							<form method="POST" action="/guardarancho" enctype="multipart/form-data">  
								<input type="hidden" name="_token" value="{{ csrf_token() }}"> 

								<input type="hidden" value="{{$ancho_puente_limites[0]->id}}" name="ancho_s_id">
								<h1 class="h3 mb-3">Ancho Puente Limites</h1>
								<div class="form-group row">
									<label for="ancho_puente_s_desde" class="col-md-4 col-form-label text-md-right"> S (Desde) </label>
									<div class="col-md-6">
										<input id="ancho_puente_s_desde" type="text" class="form-control" name="ancho_puente_s_desde" value="{{$ancho_puente_limites[0]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="ancho_puente_s_desde" class="col-md-4 col-form-label text-md-right"> S (Hasta) </label>
									<div class="col-md-6">
										<input id="ancho_puente_s_desde" type="text" class="form-control" name="ancho_puente_s_hasta" value="{{$ancho_puente_limites[0]->hasta}}">                
									</div>
								</div>

								<div class="form-group row">
									<input type="hidden" value="{{$ancho_puente_limites[1]->id}}" name="ancho_m_id">
									<label for="ancho_puente_s_desde" class="col-md-4 col-form-label text-md-right"> M (Desde) </label>
									<div class="col-md-6">
										<input id="ancho_puente_s_desde" type="text" class="form-control" name="ancho_puente_m_desde" value="{{$ancho_puente_limites[1]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="ancho_puente_s_desde" class="col-md-4 col-form-label text-md-right"> M (Hasta) </label>
									<div class="col-md-6">
										<input id="ancho_puente_s_desde" type="text" class="form-control" name="ancho_puente_m_hasta" value="{{$ancho_puente_limites[1]->hasta}}">                
									</div>
								</div>

								<div class="form-group row">
									<input type="hidden" value="{{$ancho_puente_limites[2]->id}}" name="ancho_l_id">
									<label for="ancho_puente_s_desde" class="col-md-4 col-form-label text-md-right"> L (Desde) </label>
									<div class="col-md-6">
										<input id="ancho_puente_s_desde" type="text" class="form-control" name="ancho_puente_l_desde" value="{{$ancho_puente_limites[2]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="ancho_puente_s_desde" class="col-md-4 col-form-label text-md-right"> L (Hasta) </label>
									<div class="col-md-6">
										<input id="ancho_puente_s_desde" type="text" class="form-control" name="ancho_puente_l_hasta" value="{{$ancho_puente_limites[2]->hasta}}">                
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12" style="text-align: center">
										<button type="submit" class="btn btn-secondary text-center">Guardar Ancho Puente</button>
									</div>
								</div>

							</form>

							<form method="POST" action="/guardarlargo" enctype="multipart/form-data">         
								<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
								<h1 class="h3 mb-3">Largo Patillas Limites</h1>
								<input type="hidden" value="{{$largo_patillas_limites[0]->id}}" name="largo_s_id">
								<div class="form-group row">
									<label for="largo_patillas_s_desde" class="col-md-4 col-form-label text-md-right"> S (Desde) </label>
									<div class="col-md-6">
										<input id="largo_patillas_s_desde" type="text" class="form-control" name="largo_patillas_s_desde" value="{{$largo_patillas_limites[0]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="largo_patillas_s_hasta" class="col-md-4 col-form-label text-md-right"> S (Hasta) </label>
									<div class="col-md-6">
										<input id="largo_patillas_s_hasta" type="text" class="form-control" name="largo_patillas_s_hasta" value="{{$largo_patillas_limites[0]->hasta}}">                
									</div>
								</div>

								<div class="form-group row">
									<input type="hidden" value="{{$largo_patillas_limites[1]->id}}" name="largo_m_id">
									<label for="largo_patillas_m_desde" class="col-md-4 col-form-label text-md-right"> M (Desde) </label>
									<div class="col-md-6">
										<input id="largo_patillas_m_desde" type="text" class="form-control" name="largo_patillas_m_desde" value="{{$largo_patillas_limites[1]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="largo_patillas_m_hasta" class="col-md-4 col-form-label text-md-right"> M (Hasta) </label>
									<div class="col-md-6">
										<input id="largo_patillas_m_hasta" type="text" class="form-control" name="largo_patillas_m_hasta" value="{{$largo_patillas_limites[1]->hasta}}">                
									</div>
								</div>

								<div class="form-group row">
									<input type="hidden" value="{{$largo_patillas_limites[2]->id}}" name="largo_l_id">
									<label for="largo_patillas_l_desde" class="col-md-4 col-form-label text-md-right"> L (Desde) </label>
									<div class="col-md-6">
										<input id="largo_patillas_l_desde" type="text" class="form-control" name="largo_patillas_l_desde" value="{{$largo_patillas_limites[2]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="largo_patillas_l_hasta" class="col-md-4 col-form-label text-md-right"> L (Hasta) </label>
									<div class="col-md-6">
										<input id="largo_patillas_l_hasta" type="text" class="form-control" name="largo_patillas_l_hasta" value="{{$largo_patillas_limites[2]->hasta}}">                
									</div>
								</div>

								<div class="form-group row">
									<input type="hidden" value="{{$largo_patillas_limites[3]->id}}" name="largo_x_id">
									<label for="largo_patillas_x_desde" class="col-md-4 col-form-label text-md-right"> XL (Desde) </label>
									<div class="col-md-6">
										<input id="largo_patillas_x_desde" type="text" class="form-control" name="largo_patillas_x_desde" value="{{$largo_patillas_limites[3]->desde}}">                
									</div>
								</div>
								<div class="form-group row">
									<label for="largo_patillas_x_hasta" class="col-md-4 col-form-label text-md-right"> XL (Hasta) </label>
									<div class="col-md-6">
										<input id="largo_patillas_x_hasta" type="text" class="form-control" name="largo_patillas_x_hasta" value="{{$largo_patillas_limites[3]->hasta}}">                
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12" style="text-align: center">
										<button type="submit" class="btn btn-secondary text-center">Guardar Largo Patillas</button>
									</div>
								</div>

							</form>
				</div>
			</main>

        

</body>

</html>