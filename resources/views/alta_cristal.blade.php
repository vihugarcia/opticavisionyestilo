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
			    <li class="sidebar-item active">
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

					<h1 class="h3 mb-3"><strong>Alta de cristal</strong></h1>

						@if(session()->has('alert_success_cristal'))
							<div class="alert alert-success">El cristal se <strong>cargó con éxito</strong>, puede cargar otro si desea. </div>

						@endif

						<form method="POST" action="/registrarcristal" enctype="multipart/form-data">          
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">Nombre (A mostrar)</label>
								<div class="col-md-6">
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                
								</div>
							</div>				

							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">Código</label>
								<div class="col-md-6">
									<input id="name" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required  >              
								</div>
							</div>
							
							<div class="form-group row">
								<label for="variante" class="col-md-4 col-form-label text-md-right">Variante</label>
								<div class="col-md-6">
								<select id="variante" class="form-control" name="variante">
									<option value="Original">Original</option>	
									<option value="DURAX">Durax</option>					
								</select>
							</div>
							</div>

							<div class="form-group row">
								<label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
								<div class="col-md-6">
								  <textarea id="descripcion" type="text" class="form-control" name="descripcion"></textarea>
								</div>
							</div>												

							<div class="form-group row">
								<label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
								<div class="col-md-6">
								<select id="tipo" class="form-control" name="tipo">
									<option value="monofocal">Monofocal</option>	
									<option value="degresivo">Degresivo</option>					
								</select>
							</div>
							</div>

							<div class="form-group row">
								<label for="esfera_desde" class="col-md-4 col-form-label text-md-right">Esfera Desde</label>
								<div class="col-md-6">
									<input id="esfera_desde" type="number" class="form-control" name="esfera_desde">              
								</div>
							</div>

							<div class="form-group row">
								<label for="esfera_hasta" class="col-md-4 col-form-label text-md-right">Esfera Hasta</label>
								<div class="col-md-6">
									<input id="esfera_hasta" type="number" class="form-control" name="esfera_hasta">              
								</div>
							</div>

							<div class="form-group row">
								<label for="cilindro_desde" class="col-md-4 col-form-label text-md-right">Cilindro Desde</label>
								<div class="col-md-6">
									<input id="cilindro_desde" type="number" class="form-control" name="cilindro_desde">              
								</div>
							</div>

							<div class="form-group row">
								<label for="cilindro_hasta" class="col-md-4 col-form-label text-md-right">Cilindro Hasta</label>
								<div class="col-md-6">
									<input id="cilindro_hasta" type="number" class="form-control" name="cilindro_hasta">              
								</div>
							</div>

							<div class="form-group row">
								<label for="eje_desde" class="col-md-4 col-form-label text-md-right">Eje Desde</label>
								<div class="col-md-6">
									<input id="eje_desde" type="number" class="form-control" name="eje_desde">              
								</div>
							</div>

							<div class="form-group row">
								<label for="eje_hasta" class="col-md-4 col-form-label text-md-right">Eje Hasta</label>
								<div class="col-md-6">
									<input id="eje_hasta" type="number" class="form-control" name="eje_hasta">              
								</div>
							</div>

							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">Habilitado</label>			   
								<div class="form-check col-md-1">
									<input class="form-check-input" type="radio" value="1" name="habilitado" id="habilitadosi">
									<label class="form-check-label" for="habilitadosi">
									Si
									</label>
								</div>
								<div class="form-check col-md-1">
									<input class="form-check-input" type="radio" value="0" name="habilitado" id="habilitadono" checked>
									<label class="form-check-label" for="habilitadono">
									No
									</label>
								</div>              			  
							</div>

							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">Monto</label>
								<div class="col-md-6">
									<input id="name" type="number" class="form-control" name="monto" required>              
								</div>
							</div>		
							
							<div class="form-group row">
								<label for="cambio_id" class="col-md-4 col-form-label text-md-right">Tipo de Cambio</label>
								<div class="col-md-6">
								<select id="cambio_id" class="form-control" name="cambio_id">
								<option value="">Seleccionar tipo de cambio</option>
									@foreach($tipos_cambio as $cambio)                
									  <option value={{$cambio->id}}>{{$cambio->nombre}}</option>
									@endforeach
								</select>
							  </div>
							</div>

							<div class="form-group row mb-0 mt-2">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-secondary">
										Cargar Producto
									</button>
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