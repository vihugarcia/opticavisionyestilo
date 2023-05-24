
@if($usuario)
	@php 	
		if(isset($usuario->fecha_nacimiento)){
			$nacimiento = new DateTime($usuario->fecha_nacimiento); 
			$ahora = new DateTime(date("Y-m-d"));
			$diferencia = $ahora->diff($nacimiento);
			$edad = $diferencia->format("%y");    
		}else{
			$edad = 20;
		}
	@endphp
@endif
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
			   <li class="sidebar-item ">
				   <a class="sidebar-link" href="/altareceta">
				   <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Generar Receta</span>
				   </a>
			   </li>
			   <li class="sidebar-item active" >
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

          @if(session()->has('alert_success_receta'))
            <div class="alert alert-success">La receta se <strong>editó con éxito.</strong></div>
          @endif

		  @if(session()->has('error'))
            <div class="alert alert-danger">La receta debe tener al mínimo una <strong>graduación</strong>. Revise las graduaciones en intente nuevamente.</div>
          @endif

					
		  @if($usuario)
					

							<form method="POST" action="/editarrecetadatos" enctype="multipart/form-data">          
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="medico_id" @if(Auth::user()->medico) value="{{Auth::user()->medico->id}}" @else value="{{Auth::user()->admin->id}}" @endif>
								<input type="hidden" name="paciente_id" value="{{$usuario->id}}">
								<input type="hidden" name="id" value="{{$receta->id}}">

								<div class="form-group row mb-2">
									<label for="name" class="col-md-4 col-form-label text-md-right">Nombre y Apellido</label>
									<div class="col-md-3">
										<input id="name" type="text" class="form-control" value="{{$usuario->user->name}}" disabled>                
									</div>
									<div class="col-md-3">
										<label for="dni" class="col-md-2 col-form-label text-md-right">DNI</label>										
										<input id="dni" class="col-md-6 " type="number" class="form-control" name="dni" value="{{$usuario->dni}}" disabled>
										<x-input-error :messages="$errors->get('dni')" class="mt-2" />              
										</div>
								</div>

								<div class="form-group row mb-2">
									
								</div>			
								
								@if($edad > 8 || $edad <=8)

								  <div id="graduacion-lejos1" class="form-group row align-items-center" @if($edad <= 8) style="margi-bottom: 0px;" @else style="margin-bottom: 0px;display:none;" @endif>
										<p class="text-center col-md-2 badge badge-secondary"><b>Graduación Lejos</b></p>
									  <label for="OD" class="col-md-2 col-form-label text-md-right">Ojo Derecho</label>									
									  <div class="col-md-6 my-1">									  
										  <table style="width: 100%">
											  <thead>
												  <th>Esfera</th>
												  <th>Cilindro</th>
												  <th>Eje</th>											
											  </thead>
											  <tbody>
												  <tr>
													  <td>
														  <select class="custom-select mr-sm-2" id="lejos_esfera_od" name="lejos_esfera_od">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>																									
															</select>
													  </td>
													  <td>
														  <select class="custom-select mr-sm-2" id="lejos_cilindro_od" name="lejos_cilindro_od">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
															</select>
													  </td>
													  <td>
														  <select class="custom-select mr-sm-2" id="lejos_eje_od" name="lejos_eje_od">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
															</select>
													  </td>												
												  </tr>
												  
											  </tbody>
  
										  </table>
									   
									  </div>																			
									  
									</div>
  
									<div id="graduacion-lejos2" class="form-group row align-items-center" @if($edad <=8) style="margin-top: 0px" @else style="margin-top: 0px;display:none" @endif>
									  <label for="OD" class="col-md-4 col-form-label text-md-right">Ojo Izquierdo</label>									
									  <div class="col-md-6 my-1">									  
										  <table style="width: 100%">											
											  <tbody>
												  <tr>
													  <td>
														  <select class="custom-select mr-sm-2" id="lejos_esfera_oi" name="lejos_esfera_oi">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
															</select>
													  </td>
													  <td>
														  <select class="custom-select mr-sm-2" id="lejos_cilindro_oi" name="lejos_cilindro_oi">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
															</select>
													  </td>
													  <td>
														  <select class="custom-select mr-sm-2" id="lejos_eje_oi" name="lejos_eje_oi">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
															</select>
													  </td>
													  
												  </tr>
												  
											  </tbody>
  
										  </table>
									  </div>
									</div>  							

								  @endif


								@if($edad > 8) 
															
								  <div class="form-group row">
									<label for="distancia" class="col-md-4 col-form-label text-md-right">Distancia </label>
									<div class="col-md-2">
									<select id="distancia" class="form-control" name="distancia_id" required>
									<option value="{{$receta->distancia_apto->id}}">{{$receta->distancia_apto->nombre}}</option>
										@foreach($distancias as $distancia)                
										  <option value={{$distancia->id}}>{{$distancia->nombre}}</option>
										@endforeach
									</select>
								  </div>		
								  </div>

								  <div id="graduacion-cerca1" class="form-group row align-items-center" style="margin-bottom: 0px;display:none;">
									<p class="text-center col-md-2 badge badge-secondary"><b>Graduación Cerca</b></p>
									<label for="OD" class="col-md-2 col-form-label text-md-right">Ojo Derecho</label>									
									<div class="col-md-6 my-1">									  
										<table style="width: 100%">
											<thead>
												<th>Esfera</th>
												<th>Cilindro</th>
												<th>Eje</th>												
											</thead>
											<tbody>
												<tr>
													<td>
														<select class="custom-select mr-sm-2" id="cerca_esfera_od" name="cerca_esfera_od">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
														  </select>
													</td>
													<td>
														<select class="custom-select mr-sm-2" id="cerca_cilindro_od" name="cerca_cilindro_od">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
														  </select>
													</td>
													<td>
														<select class="custom-select mr-sm-2" id="cerca_eje_od" name="cerca_eje_od">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
														  </select>
													</td>													
												</tr>
												
											</tbody>

										</table>
									 
									</div>																			
									
								  </div>

								  <div id="graduacion-cerca2" class="form-group row align-items-center" style="margin-top: 0px;display:none;">
									<label for="OD" class="col-md-4 col-form-label text-md-right">Ojo Izquierdo</label>									
									<div class="col-md-6 my-1">									  
										<table style="width: 100%">											
											<tbody>
												<tr>
													<td>
														<select class="custom-select mr-sm-2" id="cerca_esfera_oi" name="cerca_esfera_oi">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
														  </select>
													</td>
													<td>
														<select class="custom-select mr-sm-2" id="cerca_cilindro_oi" name="cerca_cilindro_oi">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
														  </select>
													</td>
													<td>
														<select class="custom-select mr-sm-2" id="cerca_eje_oi" name="cerca_eje_oi">
															<option value="4.00">+4.00</option>
															<option value="3.75">+3.75</option>
															<option value="3.50">+3.50</option>
															<option value="3.25">+3.25</option>
															<option value="3.00">+3.00</option>
															<option value="2.75">+2.75</option>
															<option value="2.50">+2.50</option>
															<option value="2.25">+2.25</option>
															<option value="2.00">+2.00</option>
															<option value="1.75">+1.75</option>
															<option value="1.50">+1.50</option>
															<option value="1.25">+1.25</option>
															<option value="1.00">+1.00</option>
															<option value="0.75">+0.75</option>
															<option value="0.50">+0.50</option>
															<option value="0.25">+0.25</option>
															<option selected value="0.00">0.00</option>
															<option value="-0.25">-0.25</option>
															<option value="-0.50">-0.50</option>
															<option value="-0.75">-0.75</option>
															<option value="-1.00">-1.00</option>	
															<option value="-1.25">-1.25</option>	
															<option value="-1.50">-1.50</option>	
															<option value="-1.75">-1.75</option>
															<option value="-2.00">-2.00</option>
															<option value="-2.25">-2.25</option>
															<option value="-2.50">-2.50</option>
															<option value="-2.75">-2.75</option>
															<option value="-3.00">-3.00</option>	
															<option value="-3.25">-3.25</option>	
															<option value="-3.50">-3.50</option>	
															<option value="-3.75">-3.75</option>
															<option value="-4.00">-4.00</option>
														  </select>
													</td>
													
												</tr>
												
											</tbody>

										</table>
									 
									</div>										
								  </div>
								  <div class="form-group row mb-2">
									<label for="altura_puente" class="col-md-4 col-form-label text-md-right">Altura puente / Ancho Cara (Obligatorio)</label>
									  <div class="col-md-2">
											<select id="altura_puente" class="form-control" name="altura_puente" required>
												@isset($receta->altura_puente) 
													<option selected value="{{$receta->altura_puente}}">{{$receta->altura_puente}}</option>
												@else										
													<option selected value="">A. Puente</option>
												@endisset

												<option value="A">Alto</option>
												<option value="M">Intermedio</option>
												<option value="B">Bajo</option>
												<option value="Especial">Caso Especial</option>
											</select>               
										</div>
										<div class="col-md-2">
											<select id="ancho_cara" class="form-control" name="ancho_cara" required>
												@isset($receta->ancho_cara) 
													<option selected value="{{$receta->ancho_cara}}">{{$receta->ancho_cara}}</option>
												@else										
													<option selected value="">Ancho. Cara</option>
												@endisset
												<option value="S">S</option>
												<option value="M">M</option>
												<option value="L">L</option>											
											</select>               
										</div>
								</div>																		

								<div class="form-group row mb-2">
									<label for="largo_patillas" class="col-md-4 col-form-label text-md-right">Largo Patillas / Forma de Cara (Opcional)</label>
									<div class="col-md-2">
										<select id="largo_patillas" class="form-control" name="largo_patillas">
											@isset($receta->largo_patillas) 
												<option selected value="{{$receta->largo_patillas}}">{{$receta->largo_patillas}}</option>
											@else										
												<option selected value="">Patillas</option>
											@endisset
											<option value="S">S</option>
											<option value="M">M</option>
											<option value="L">L</option>
											<option value="XL">XL</option>
										</select>               
									</div>
									<div class="col-md-2">
										<select id="forma" class="form-control" name="forma_id">
											@isset($receta->forma) 
												<option selected value="{{$receta->forma->id}}">{{$receta->forma->nombre}}</option>
											@else										
												<option selected value="">Forma cara</option>
											@endisset
											@foreach($formas as $forma)                
											<option value={{$forma->id}}>{{$forma->nombre}}</option>
											@endforeach
										</select>
								  	</div>
									
								</div>																									
							
								<div class="form-group row mb-2">
									<label for="distancia_interpupilar" class="col-md-4 col-form-label text-md-right">Distancia Interpupilar / N. derecha - izquierda</label>
									<div class="col-md-2">
										<select id="distancia_interpupilar" class="form-control" name="distancia_interpupilar">
											@isset($receta->distancia_interpupilar) 
												<option selected value="{{$receta->distancia_interpupilar}}">{{$receta->distancia_interpupilar}}</option>
											@else										
												<option selected value="">D. Interpupilar</option>
											@endisset
											<option value="54">54.00</option>
											<option value="54.50">54.50</option>
											<option value="55">55.00</option>
											<option value="55.50">55.50</option>
											<option value="56">56.00</option>
											<option value="56.50">56.50</option>
											<option value="57">57.00</option>
											<option value="57.50">57.50</option>
											<option value="58">58.00</option>	
											<option value="58.50">58.50</option>										
											<option value="59">59.00</option>
											<option value="59.50">59.50</option>
											<option value="60">60.00</option>
											<option value="60.50">60.50</option>
											<option value="61">61.00</option>
											<option value="61.50">61.50</option>
											<option value="62">62.00</option>
											<option value="62.50">62.50</option>
											<option value="63">63.00</option>
											<option value="63.50">63.50</option>
											<option value="64">64.00</option>
											<option value="64.50">64.50</option>
											<option value="65">65.00</option>
											<option value="65.50">65.50</option>
											<option value="66">66.00</option>
											<option value="66.50">66.50</option>
											<option value="67">67.00</option>
											<option value="67.50">67.50</option>
											<option value="68">68.00</option>	
											<option value="68.50">68.50</option>										
											<option value="69">69.00</option>
											<option value="69.50">69.50</option>
											<option value="70">70.00</option>
											<option value="70.50">70.50</option>
											<option value="71">71.00</option>
											<option value="71.50">72.50</option>
											<option value="72">72.00</option>
											<option value="72.50">72.50</option>
											<option value="73">73.00</option>
											<option value="73.50">73.50</option>
										</select>    	
										<input id="nasopupilares" type="checkbox" > ¿D. Nasopupilares? 							                
									</div>
									<div class="col-md-2">
										<select id="distancia_nasopupilar_derecha" style="display: none;" class="form-control" name="distancia_nasopupilar_derecha">
											@isset($receta->distancia_nasopupilar_derecha) 
												<option selected value="{{$receta->distancia_nasopupilar_derecha}}">{{$receta->distancia_nasopupilar_derecha}}</option>
											@else										
												<option selected value="">DN. Derecha</option>
											@endisset
											<option value="54">25.00</option>
											<option value="54.50">25.50</option>
											<option value="55">26.00</option>
											<option value="55.50">26.50</option>
											<option value="56">27.00</option>
											<option value="56.50">27.50</option>
											<option value="57">27.00</option>
											<option value="57.50">27.50</option>
											<option value="58">28.00</option>	
											<option value="58.50">28.50</option>										
											<option value="59">29.00</option>
											<option value="59.50">29.50</option>
											<option value="60">30.00</option>
											<option value="60.50">30.50</option>
											<option value="61">31.00</option>
											<option value="61.50">31.50</option>
											<option value="62">32.00</option>
											<option value="62.50">32.50</option>
											<option value="63">33.00</option>
											<option value="63.50">33.50</option>
											<option value="64">34.00</option>
											<option value="64.50">34.50</option>
											<option value="65">35.00</option>
											<option value="65.50">35.50</option>
											<option value="66">36.00</option>
											<option value="66.50">36.50</option>
											<option value="67">37.00</option>
											<option value="67.50">37.50</option>
											<option value="68">38.00</option>	
											<option value="68.50">38.50</option>										
											<option value="69">39.00</option>
											<option value="69.50">39.50</option>
											<option value="70">40.00</option>
											<option value="70.50">40.50</option>
											<option value="71">41.00</option>
											<option value="71.50">41.50</option>
											<option value="72">42.00</option>
											<option value="72.50">42.50</option>											
										</select>    	
									</div>
									<div class="col-md-2">
										<select id="distancia_nasopupilar_izquierda" style="display: none;" class="form-control" name="distancia_nasopupilar_izquierda">
											@isset($receta->distancia_nasopupilar_izquierda) 
											<option selected value="{{$receta->distancia_nasopupilar_izquierda}}">{{$receta->distancia_nasopupilar_izquierda}}</option>
										@else										
											<option selected value="">DN. Izquierda</option>
										@endisset
											<option value="54">25.00</option>
											<option value="54.50">25.50</option>
											<option value="55">26.00</option>
											<option value="55.50">26.50</option>
											<option value="56">27.00</option>
											<option value="56.50">27.50</option>
											<option value="57">27.00</option>
											<option value="57.50">27.50</option>
											<option value="58">28.00</option>	
											<option value="58.50">28.50</option>										
											<option value="59">29.00</option>
											<option value="59.50">29.50</option>
											<option value="60">30.00</option>
											<option value="60.50">30.50</option>
											<option value="61">31.00</option>
											<option value="61.50">31.50</option>
											<option value="62">32.00</option>
											<option value="62.50">32.50</option>
											<option value="63">33.00</option>
											<option value="63.50">33.50</option>
											<option value="64">34.00</option>
											<option value="64.50">34.50</option>
											<option value="65">35.00</option>
											<option value="65.50">35.50</option>
											<option value="66">36.00</option>
											<option value="66.50">36.50</option>
											<option value="67">37.00</option>
											<option value="67.50">37.50</option>
											<option value="68">38.00</option>	
											<option value="68.50">38.50</option>										
											<option value="69">39.00</option>
											<option value="69.50">39.50</option>
											<option value="70">40.00</option>
											<option value="70.50">40.50</option>
											<option value="71">41.00</option>
											<option value="71.50">41.50</option>
											<option value="72">42.00</option>
											<option value="72.50">42.50</option>											
										</select>    	
									</div>
								</div>																																							


								 
								  @endif
								  


								  @if($edad <= 8)

								  
								  @endif

								  <div class="form-group row">
									<label for="observaciones" class="col-md-4 col-form-label text-md-right">Observaciones</label>
									<div class="col-md-6">
									  <textarea type="text" id="observaciones" class="form-control" @isset($receta->observaciones) placeholder="{{$receta->observaciones}}" @endisset name="observaciones"></textarea>
									</div>
								  </div>		
											
								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4" >
										<button type="submit" class="btn btn-secondary btn-large" style="font-size: 20px">
											Guardar Receta
										</button>
									</div>
								</div>
							</form> 
						
		      
			@else
			<form method="GET" action="/registrarpaciente" enctype="multipart/form-data"> 
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="medico_id" value="{{Auth::user()->medico->id}}"> 
				<div class="form-group row mb-2">
					<label for="dni_paciente" class="col-md-4 col-form-label text-md-right">DNI del paciente</label>
					<div class="col-md-6">
						<input id="dni_paciente" type="number" class="form-control" name="dni_paciente" required value="{{$dni}}">                
					</div>					
				</div>
				<div class="form-group row mb-2">
					<label for="nombre_paciente" class="col-md-4 col-form-label text-md-right">Nombre del paciente</label>
					<div class="col-md-6">
						<input id="nombre_paciente" type="text" class="form-control" name="nombre_paciente" required autofocus>                
					</div>					
				</div>
				<div class="form-group row mb-2">
					<label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>
					<div class="col-md-6">
						<input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento">                
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="email_paciente" class="col-md-4 col-form-label text-md-right">Email del paciente</label>
					<div class="col-md-6">
						<input id="email_paciente" type="email" class="form-control" name="email_paciente" required autofocus>                
					</div>					
				</div>
				<div class="form-group row mb-2">					
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn btn-secondary">Registrar </button>                
					</div>					
				</div>
		   </form>
			@endisset


				</div>
				
			</main>		
		</div>
	</div>

	<script src="js/app.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<script>

	document.getElementById('lejos_esfera_od').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('lejos_cilindro_od').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('lejos_eje_od').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('lejos_esfera_oi').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('lejos_cilindro_oi').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('lejos_eje_oi').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	//------------------------------------------------------------------

	document.getElementById('cerca_esfera_od').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('cerca_cilindro_od').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('cerca_eje_od').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('cerca_esfera_oi').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('cerca_cilindro_oi').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('cerca_eje_oi').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	//----------------------------------------------



	document.getElementById('forma').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('distancia').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);			
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);		
		}
	});

	document.getElementById('altura_puente').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('largo_patillas').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('ancho_cara').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('distancia_interpupilar').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('distancia_nasopupilar_derecha').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	document.getElementById('distancia_nasopupilar_izquierda').addEventListener('wheel', function(e) {
		if (this.hasFocus) {
			return;
		}
		if (e.deltaY < 0) {
			this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
		}
		if (e.deltaY > 0) {
			this.selectedIndex = Math.min(this.selectedIndex + 1, this.length - 1);
		}
	});

	$( document ).ready(function() {
		var distancia_id = "<?php echo $receta->distancia_apto_id ?>";
		if(distancia_id == 1){	
				$("#graduacion-cerca1").hide('slow');
				$("#graduacion-cerca2").hide('slow');				
				$("#graduacion-lejos1").show('slow');
				$("#graduacion-lejos2").show('slow');
			}
			if(distancia_id == 2){			
				$("#graduacion-lejos1").hide('slow');
				$("#graduacion-lejos2").hide('slow');		
				$("#graduacion-cerca1").show('slow');
				$("#graduacion-cerca2").show('slow');
			}
			if(distancia_id == 3){			
				$("#graduacion-lejos1").show('slow');
				$("#graduacion-lejos2").show('slow');		
				$("#graduacion-cerca1").show('slow');
				$("#graduacion-cerca2").show('slow');
			}
	});

	$("#distancia").on("change", function() {	
		
			if($("#distancia").val() == 1){	
				$("#graduacion-cerca1").hide('slow');
				$("#graduacion-cerca2").hide('slow');				
				$("#graduacion-lejos1").show('slow');
				$("#graduacion-lejos2").show('slow');
			}
			if($("#distancia").val() == 2){			
				$("#graduacion-lejos1").hide('slow');
				$("#graduacion-lejos2").hide('slow');		
				$("#graduacion-cerca1").show('slow');
				$("#graduacion-cerca2").show('slow');
			}
			if($("#distancia").val() == 3){			
				$("#graduacion-lejos1").show('slow');
				$("#graduacion-lejos2").show('slow');		
				$("#graduacion-cerca1").show('slow');
				$("#graduacion-cerca2").show('slow');
			}
		});	

		$("#nasopupilares").on( 'change', function() {
			if( $(this).is(':checked') ) {
				$("#distancia_nasopupilar_derecha").show('slow');
				$("#distancia_nasopupilar_izquierda").show('slow');				
				$("#distancia_interpupilar").hide('slow');		
			}else{
				$("#distancia_nasopupilar_derecha").hide('slow');
				$("#distancia_nasopupilar_izquierda").hide('slow');				
				$("#distancia_interpupilar").show('slow');	
			}
			
		});
	
		
	</script>

</body>

</html>