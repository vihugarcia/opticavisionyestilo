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
			   <li class="sidebar-item active">
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

					<h1 class="h3 mb-3"><strong>Alta de @if(Auth::user()->medico) Paciente @else usuario @endif</strong></h1>

          @if(session()->has('alert_success_usuario'))
            <div class="alert alert-success">El usuario se <strong>cargó con éxito</strong>, puede cargar otro si desea. </div>
          @endif

          <form method="POST" action="/registrarusuario" enctype="multipart/form-data">          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
              <div class="form-group row mb-2">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Nombre y Apellido</label>
                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                
                  </div>
              </div>

			  <div class="form-group row mb-2">
                <label for="dni" class="col-md-4 col-form-label text-md-right">DNI</label>
                <div class="col-md-6">
                  <input id="dni" type="number" class="form-control" name="dni" required >
                  <x-input-error :messages="$errors->get('dni')" class="mt-2" />              
                </div>
              </div>

			  <div class="form-group row mb-2">
				<label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>
				<div class="col-md-6">
					<input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento">                
				</div>
			</div>

			<div class="form-group row mb-2">
				<label for="celular" class="col-md-4 col-form-label text-md-right">Celular</label>
				<div class="col-md-6">
					<input id="celular" type="text" class="form-control" name="celular" >                
				</div>
			</div>

			
			<div class="form-group row">
				<label for="medico" class="col-md-4 col-form-label text-md-right">Médico</label>
				<div class="col-md-6">
				<select id="medico" class="form-control" name="medico_id">				
					@foreach($medicos as $medico)                
					  <option value={{$medico->id}}>{{$medico->user->name}}</option>
					@endforeach
				</select>
			  </div>
			</div>		

			<div class="form-group row mb-2">
				<label for="obra_social" class="col-md-4 col-form-label text-md-right">Obra Social</label>
				<div class="col-md-6">
					<input id="obra_social" type="text" class="form-control" name="obra_social">                
				</div>
			</div>

			<div class="form-group row mb-2">
				<label for="afiliado" class="col-md-4 col-form-label text-md-right">N° Afiliado</label>
				<div class="col-md-6">
					<input id="afiliado" type="text" class="form-control" name="afiliado">                
				</div>
			</div>


              <div class="form-group row mb-2">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" required >
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />                
                </div>
              </div>

            <div class="form-group row mb-2">
              <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required >                
              </div>
            </div>                                                                                    
                         
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-secondary">
                        Cargar Usuario
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