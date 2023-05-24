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
			   <li class="sidebar-item active">
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
					<h1 class="h3 mb-3"><strong>Editar cristal</strong></h1>
					@if(session()->has('alert_success_edit_cristal'))
						<div class="alert alert-success">El cristal se <strong>editó con éxito</strong>, puede cargar otro si desea. </div>		
				  	@endif
						<div class="row">
							<div class="col-12 col-lg-12">
							
									<form method="POST" action="/editarcristaldatos" enctype="multipart/form-data">          
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" value="{{$cristal->id}}" name="id">	
										<div class="form-group row">
											<label for="name" class="col-md-4 col-form-label text-md-right">Nombre (A mostrar)</label>
											<div class="col-md-6">
												<input id="name" type="text" class="form-control" name="name" value="{{ $cristal->tipo_cristal->nombre}}" required autocomplete="name" autofocus>                
											</div>
										</div>				
			
										<div class="form-group row">
											<label for="name" class="col-md-4 col-form-label text-md-right">Código</label>
											<div class="col-md-6">
												<input id="name" type="text" class="form-control"  name="codigo" value="{{ $cristal->tipo_cristal->codigo}}" required  >              
											</div>
										</div>
										
										<div class="form-group row">
											<label for="variante" class="col-md-4 col-form-label text-md-right">Variante</label>
											<div class="col-md-6">
											<select id="variante" class="form-control" name="variante">											
												<option selected value="Original">Original</option>	
												<option value="DURAX">Durax</option>					
											</select>
										</div>
										</div>
			
										<div class="form-group row">
											<label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
											<div class="col-md-6">
											  <textarea id="descripcion" type="text" class="form-control" placeholder="{{ $cristal->tipo_cristal->descripcion}}" name="descripcion"></textarea>
											</div>
										</div>
												
										<div class="form-group row">
											<label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
											<div class="col-md-6">
											<select id="tipo" class="form-control" name="tipo">
												<option selected value="Serie">Serie</option>	
												<option value="Laboratorio">Laboratorio</option>					
											</select>
										</div>
										</div>
			
										<div class="form-group row">
											<label for="esfera_desde" class="col-md-4 col-form-label text-md-right">Esfera Desde</label>
											<div class="col-md-6">
												<input id="esfera_desde" class="form-control" value="{{ $cristal->tipo_cristal->esfera_desde}}" name="esfera_desde">              
											</div>
										</div>
			
										<div class="form-group row">
											<label for="esfera_hasta" class="col-md-4 col-form-label text-md-right">Esfera Hasta</label>
											<div class="col-md-6">
												<input id="esfera_hasta" class="form-control" value="{{ $cristal->tipo_cristal->esfera_hasta}}" name="esfera_hasta">              
											</div>
										</div>
			
										<div class="form-group row">
											<label for="cilindro_desde" class="col-md-4 col-form-label text-md-right">Cilindro Desde</label>
											<div class="col-md-6">
												<input id="cilindro_desde" class="form-control" value="{{ $cristal->tipo_cristal->cilindro_desde}}" name="cilindro_desde">              
											</div>
										</div>
			
										<div class="form-group row">
											<label for="cilindro_hasta" class="col-md-4 col-form-label text-md-right">Cilindro Hasta</label>
											<div class="col-md-6">
												<input id="cilindro_hasta" type="number" class="form-control" value="{{ $cristal->tipo_cristal->cilindro_hasta}}" name="cilindro_hasta">              
											</div>
										</div>

										<div class="form-group row">
											<label for="eje_desde" class="col-md-4 col-form-label text-md-right">Eje Desde</label>
											<div class="col-md-6">
												<input id="eje_desde" class="form-control" value="{{ $cristal->tipo_cristal->eje_desde}}" name="eje_desde">              
											</div>
										</div>
			
										<div class="form-group row">
											<label for="eje_hasta" class="col-md-4 col-form-label text-md-right">Eje Hasta</label>
											<div class="col-md-6">
												<input id="eje_hasta" type="number" class="form-control" value="{{ $cristal->tipo_cristal->eje_hasta}}" name="eje_hasta">              
											</div>
										</div>
			
										<div class="form-group row">
											<label for="name" class="col-md-4 col-form-label text-md-right">Habilitado</label>			   
											<div class="form-check col-md-1">
												<input class="form-check-input" type="radio" value="1" name="habilitado" id="habilitadosi" checked>
												<label class="form-check-label" for="habilitadosi">
												Si
												</label>
											</div>
											<div class="form-check col-md-1">
												<input class="form-check-input" type="radio" value="0" name="habilitado" id="habilitadono">
												<label class="form-check-label" for="habilitadono">
												No
												</label>
											</div>              			  
										</div>
			
										<div class="form-group row">
											<label for="name" class="col-md-4 col-form-label text-md-right">Monto</label>
											<div class="col-md-6">
												<input id="name" type="number" class="form-control" value="{{ $cristal->tipo_cristal->monto}}" name="monto" required>              
											</div>
										</div>			

										<div class="form-group row">
											<label for="cambio_id" class="col-md-4 col-form-label text-md-right">Tipo de Cambio</label>
											<div class="col-md-6">
											<select id="cambio_id" class="form-control" name="cambio_id">
											<option selected value="{{$cristal->tipo_cambio->id}}">{{$cristal->tipo_cambio->nombre}}</option>
											<option value="">Seleccionar tipo de cambio</option>
												@foreach($tipos_cambio as $cambio)                
												  <option value={{$cambio->id}}>{{$cambio->nombre}}</option>
												@endforeach
											</select>
										  </div>
										</div>
													 
											<div class="form-group row mb-0">
											  <div class="col-md-6 offset-md-4">
												  <button type="submit" class="btn btn-secondary">
													Guardar cristal
												  </button>
											  </div>
										  </div>
									  </form>
								
							</div>
					</main>		
				</div>
			</div>

	<script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>