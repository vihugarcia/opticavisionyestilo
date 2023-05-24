
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
			<li class="sidebar-item">
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
			   <li class="sidebar-item active">
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
<!-- Reenviar receta --> 
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
			<h1 class="h3 mb-3"><strong>Generación de receta</strong></h1>        
		
				<form method="GET" action="/obtenerpaciente" enctype="multipart/form-data">     
					<div class="form-group row mb-2">
						<label for="dni_paciente" class="col-md-4 col-form-label text-md-right">Ingresa el DNI del paciente</label>
						<div class="col-md-6">
							<input id="dni_paciente" type="number" class="form-control" name="dni_paciente" required autofocus>                
						</div>					
					</div>
					<div class="form-group row mb-2">					
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-secondary">Buscar </button>                
						</div>					
					</div>
			</form>			
		</div>
				
			</main>		
		</div>
	</div>

	<script src="js/app.js"></script>
	
</body>

</html>