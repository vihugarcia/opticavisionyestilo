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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>


	<div class="wrapper">
		@if(session()->has('successPago'))
<script>swal("Pago realizado!", "El producto se encuentra próximo a ser despachado", "success");</script>
{{session()->forget('successPago')}}
@endif
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
			   <a class="sidebar-brand" href="/dashboard">
			   <span class="align-middle">Panel de control</span>
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
					<li class="sidebar-item active">
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
					<li class="sidebar-header">
						Órdenes de compra
					   </li>
					  <li class="sidebar-item" >
						   <a class="sidebar-link" href="/editarordenes">
							   <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Órdenes de compra</span>
						   </a>
					   </li>
				  @endif
				  @if(Auth::user()->vendedor || Auth::user()->medico || Auth::user()->admin) 		
					<li class="sidebar-header">
						Pacientes
					</li>
					<li class="sidebar-item @if(Auth::user()->medico) active @endif">
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

				 @if(Auth::user()->usuario)
				 <li class="sidebar-header">
					Recetas
				</li>
				<li class="sidebar-item active">
					<a class="sidebar-link " href="/dashboard">
					<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Recetas diagnosticadas</span>
					</a>
				</li>	
				<li class="sidebar-header">
					Compras
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="/ordenes">
					<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Órdenes de compra</span>
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
								<img 
								@if(Auth::user()->medico) src="img-perfil/{{Auth::user()->medico->img}}" @endif
								@if(Auth::user()->vendedor) src="img-perfil/{{Auth::user()->vendedor->img}}" @endif
								@if(Auth::user()->admin) src="img-perfil/perfil.png" @endif
								@if(Auth::user()->usuario) 
									@if(Auth::user()->usuario->img) src="img-perfil/{{Auth::user()->usuario->img}}" @else src="img-perfil/perfil.png" @endif 
								@endif
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

					@if(Auth::user()->vendedor || Auth::user()->admin)
					<h1 class="h3 mb-3"><strong>Alta de médico</strong></h1>

						@if(session()->has('alert_success_medico'))
							<div class="alert alert-success">El médico se <strong>cargó con éxito</strong>, puede cargar otro si desea. </div>
						@endif

						<form method="POST" action="/registrarmedico" enctype="multipart/form-data">          
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
							<div class="form-group row mb-2">
								<label for="name" class="col-md-4 col-form-label text-md-right">Nombre y Apellido</label>
								<div class="col-md-6">
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                
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
					
							<div class="form-group row mb-2">
								<label for="dni" class="col-md-4 col-form-label text-md-right">DNI</label>
								<div class="col-md-6">
								<input id="dni" type="number" class="form-control" name="dni" required >
								<x-input-error :messages="$errors->get('dni')" class="mt-2" />              
								</div>
							</div>
					
							<div class="form-group row mb-2">
								<label for="matricula" class="col-md-4 col-form-label text-md-right">Matrícula</label>
								<div class="col-md-6">
								<input id="matricula" type="text" class="form-control" name="matricula" required >              
								</div>
							</div>                                         
						
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
								<input id="file" class="col-md-6"name="file1" type="file" />          
								</div>    
										
								<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-secondary">
										Cargar Médico
									</button>
								</div>
							</div>
						</form>		
						@endif
						@if(Auth::user()->medico)

						<h1 class="h3 mb-3"><strong>Alta de paciente</strong></h1>
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
								<label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
								<div class="col-md-6">
									<input id="telefono" type="text" class="form-control" name="telefono">                
								</div>
							</div>
				
							<div class="form-group row mb-2">
								<label for="celular" class="col-md-4 col-form-label text-md-right">Celular</label>
								<div class="col-md-6">
									<input id="celular" type="text" class="form-control" name="celular" >                
								</div>
							</div>
				
							<div class="form-group row mb-2">
								<label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>
								<div class="col-md-6">
									<input id="direccion" type="text" class="form-control" name="direccion">                
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
								<div class="col-md-6">
									<input id="sexo" type="text" class="form-control" name="sexo" value="{{ old('sexo') }}" required>                
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
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
								<input id="file" class="col-md-6"name="file1" type="file" />          
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-secondary">
									Cargar Usuario
									</button>
								</div>
							</div>
							</form>
						@endif			
						

						@if(Auth::user()->usuario)

						<div class="row">
							<div class="col-12 col-lg-12 col-xxl-9 d-flex">
								<div class="card flex-fill">
									<div class="card-header">
										<h5 class="card-title mb-2">Recetas diagnosticadas (G.L) Graduación lejos, (G.C) Graduación cerca.</h5>
									</div>								
									<div class="row">
											@foreach(Auth::user()->usuario->recetas as $receta)
											<div class="col-md-6 mt-2" >
												<div class="card">
													<div class="card card-header">
														<p>Receta N° {{$receta->id}} - {{$receta->created_at}} {{-- dias mes año--}}
															@if(!$receta->usada);
															<form action="/verproductorecetado" method="GET">
																<input type="hidden" value="{{$receta->id}}" name="receta_id">
																<button type="submit" class="btn btn-secondary">Ver productos disponibles</button>
															</form>
															@endif
														</p>
													</div>
													<div class="card card-body">
													
															<h6><span style="font-weight bold">Médico:</span> {{$receta->medico->user->name}}</h6>
															<h6>Estado: <span class="badge badge-success">Disponible</span> </h6>
															<h6>Plaquetas Ajustables: {{$receta->plaquetas_ajustables}}</h6>
															<h6>Distancia: {{$receta->distancia_apto->nombre}}</h6>
															@if(isset($receta->forma->nombre)) <h6>Forma: {{$receta->forma->nombre}}</h6> @endif
															
															
															<h6>Altura Puente: {{$receta->altura_puente}}</h6>														
															<h6>G.L Eje OD: {{$receta->lejos->ejeOD}}</h6>
															<h6>G.L Eje OI: {{$receta->lejos->ejeOI}}</h6>
															<h6>G.L Esfera OD: {{$receta->lejos->esferaOD}}</h6>
															<h6>Esfera OI: {{$receta->lejos->esferaOI}}</h6>
															<h6>Cipndro OD: {{$receta->lejos->cilindroOD}}</h6>
															<h6>Cipndro OI: {{$receta->lejos->cilindroOI}}</h6>
															<h6>Eje OD: {{$receta->cerca->ejeOD}}</h6>
															<h6>Eje OI: {{$receta->cerca->ejeOI}}</h6>
															<h6>Esfera OD: {{$receta->cerca->esferaOD}}</h6>
															<h6>Esfera OI: {{$receta->cerca->esferaOI}}</h6>
															<h6>Cipndro OD: {{$receta->cerca->cilindroOD}}</h6>
															<h6>Cipndro OI: {{$receta->cerca->cilindroOI}}</h6>																	
														
													</div>
												</div>
											</div>
												
																											
										
											@endforeach
									</div>
											
										</div>    
									</div>
								</div>


						@endif
				</div>				
			</main>		
		</div>
	</div>

	<script src="js/app.js"></script>	

</body>

</html>