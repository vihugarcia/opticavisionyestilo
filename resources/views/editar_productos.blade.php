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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
					   <li class="sidebar-item active">
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
								<img 
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
					<h1 class="h3 mb-3"><strong>Editar productos</strong></h1>
						@if(session()->has('alert_success_edit_producto'))
							<div class="alert alert-success">El producto se <strong>editó con éxito</strong> </div>		
				  		@endif
						@if(session()->has('alert_success_delete_producto'))
							<div class="alert alert-success">El producto se <strong>eliminó con éxito</strong></div>
						@endif

						<div class="row">
							<div class="col-12 col-lg-12 col-xxl-9 d-flex">
								<div class="card flex-fill">
									<div class="card-header">
										<h5 class="card-title mb-0">Productos registrados</h5>
									</div>
									<table class="table table-hover my-0 table-responsive">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Nombre técnico</th>
												<th class="d-none d-xl-table-cell">Tipo</th>
												<th class="d-none d-xl-table-cell">Código</th>		
												<th class="">Descripción</th>						
												<th class="">Ancho Cara</th>
												<th class="">Altas Graduaciones</th>
												<th class="">Plaquetas Ajustables</th>
												<th class="">Calibre</th>
												<th class="">Largo Patillas</th>
												<th class="">Altura Puente</th>
												<th class="">Sexo</th>
												<th class="">Rango Etario Desde</th>
												<th class="">Rango Etario Hasta</th>
												<th class="">Costo</th>
												<th class="">Impuesto</th>
												<th class="">Monto</th>
												<th class="">Descuento ($)</th>
												<th class="">Descuento (%)</th>
												<th class="">Destacado</th>
												<th class="">Habilitado</th>
												<th class="">Stock</th>
												<th class="">Imagen 1</th>
												<th class="">Imagen 2</th>
												<th class="">Imagen 3</th>
												<th class="">Imagen 4</th>
												<th class="">Editar</th>
												<th class="">Eliminar</th>
											</tr>
										</thead>
										<tbody>
											@foreach($productos as $producto)
											<tr>
												<td>{{$producto->nombre}}</td>
												<td class="d-none d-xl-table-cell">{{$producto->nombre_base}}</td>
												<td class="d-none d-xl-table-cell">{{$producto->tipo_producto_id}}</td>
												<td>{{$producto->codigo}}</td>
												<td>{{$producto->descripcion}}</td>
												<td>{{$producto->ancho_cara}}</td>
												<td>{{$producto->altas_graduaciones}}</td>
												<td>{{$producto->plaquetas_ajustables}}</td>
												<td>{{$producto->calibre}}</td>
												<td>{{$producto->largo_patillas}}</td>
												<td>{{$producto->altura_puente}}</td>
												<td>{{$producto->sexo}}</td>
												<td>{{$producto->rango_etario_desde}}</td>
												<td>{{$producto->rango_etario_hasta}}</td>
												<td>{{$producto->costo}}</td>
												<td>{{$producto->impuesto}}</td>
												<td>{{$producto->monto}}</td>
												<td>{{$producto->descuento}}</td>
												<td>{{$producto->descuento_porcentaje}}</td>
												<td>{{$producto->destacado}}</td>
												<td>{{$producto->habilitado}}</td>
												<td>{{$producto->stock}}</td>
												<td><img style="height: 30px" src="img-products/{{$producto->img1}}"></td>
												<td><img style="height: 30px" src="img-products/{{$producto->img2}}"></td>
												<td><img style="height: 30px" src="img-products/{{$producto->img3}}"></td>
												<td><img style="height: 30px" src="img-products/{{$producto->img4}}"></td>
												<td><form action="/editarproducto" method="POST">  
													@csrf
														<input type="hidden" value="{{$producto->id}}" name="id">	
														<button style="border-radius: 2px;border: 1px solid gray;text-align: center;width: 50px;" type="submit">
															<i class="fa fa-pencil"></i>
														</button>
													</form>
												</td>									
												<td><form action="/eliminarproducto" method="POST">  @csrf
														<input type="hidden" value="{{$producto->id}}" name="id">	
														<button style="border-radius: 2px;border: 1px solid gray;text-align: center;width: 50px;" type="submit">
															<i style="color: red;" class="fa fa-trash" ></i>
														</button>	
													</form>														
												</td>	
											</tr>
											@endforeach
											
										</div>    
									</div>
								</div>
							</div>
					</main>		
				</div>
			</div>

	<script src="js/app.js"></script>

</body>

</html>