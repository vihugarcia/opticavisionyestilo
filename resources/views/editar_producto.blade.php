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
					<h1 class="h3 mb-3"><strong>Editar producto</strong></h1>
					@if(session()->has('alert_success_edit_producto'))
						<div class="alert alert-success">El producto se <strong>cargó con éxito</strong>, puede cargar otro si desea. </div>		
				  	@endif
						<div class="row">
							<div class="col-12 col-lg-12">
							
								<form method="POST" action="/editarproductodatos" enctype="multipart/form-data">          
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" value="{{$producto->id}}" name="id">	
							
									  <div class="form-group row">
										  <label for="name" class="col-md-4 col-form-label text-md-right">Nombre (A mostrar)</label>
										  <div class="col-md-6">
											  <input id="name" type="text" value="{{$producto->nombre}}" class="form-control"  name="name" value="{{ old('name') }}" required>                
										  </div>
									  </div>
							
									  <div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Nombre Técnico (Nombre base)</label>
										<div class="col-md-6">
										  <input id="name" type="text" value="{{$producto->nombre_base}}" class="form-control" name="nombre_base" required >              
										</div>
									  </div>
							
									  <div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Tipo de producto</label>
										<div class="col-md-6">
											<select id="tipo_producto" class="form-control" name="tipo_producto">	
												<option selected value="{{$producto->tipo_producto}}">{{$producto->tipo_producto}}</option>		
												<option selected value="Armazon">Armazon</option>
												<option value="Accesorio">Accesorio</option>
											</select>  
										</div>
									  </div>	

									  <div class="form-group row">
										<label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>
										<div class="col-md-6">
										<select id="marca" class="form-control" name="marca_id">
										<option value="">Seleccionar marca</option>
											<option selected value="{{$producto->marca->id}}">{{$producto->marca->nombre}}</option>
											@foreach($marcas as $marca)                
											  <option value={{$marca->id}}>{{$marca->nombre}}</option>
											@endforeach
										</select>
									  </div>
									</div>

									<div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Color</label>
										<div class="col-md-6">
										  <input id="name" type="text" @if($producto->color_texto) value="{{$producto->color_texto}}" @endif class="form-control" name="color_texto" required >              
										</div>
									  </div>

									  <div class="form-group row">
										<label for="marca" class="col-md-4 col-form-label text-md-right">Tipo de fondo 	@if($producto->tipo_fondo != null) 
											 @if($producto->tipo_fondo == 1) <b>(Ninguno)</b> @endif
											 @if($producto->tipo_fondo == 2) <b>(Fondo gris claro)</b> @endif
											 @if($producto->tipo_fondo == 3) <b>(Fondo gris oscuro)</b> @endif
											 @if($producto->tipo_fondo == 4) <b>(Fondo oscuro)</b> @endif
										@endif		</label>
										<div class="col-md-6">
										<select id="marca" class="form-control" name="tipo_fondo">																																
											<option value="1" >Ninguno</option>
											<option value="2" >Fondo gris claro</option>
											<option value="3" >Fondo gris oscuro</option>
											<option value="4" >Fondo oscuro</option>					             					
										</select>
									  </div>
									</div>
							
									<div class="form-group row">
										<label for="material" class="col-md-4 col-form-label text-md-right">Material</label>
										<div class="col-md-6">
										<select id="material" class="form-control" name="material_id">
										<option value="">Seleccionar material</option>
											<option selected value="{{$producto->material->id}}">{{$producto->material->nombre}}</option>
											@foreach($materiales as $material)                
											  <option value={{$material->id}}>{{$material->nombre}}</option>
											@endforeach
										</select>
									  </div>
									</div>
								
							
									  <div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Código del Producto</label>
										<div class="col-md-6">
											<input id="name" type="text" class="form-control" name="codigo" value="{{$producto->codigo}}" required  >              
										</div>
									 </div>
							
									  <div class="form-group row">
										<label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>
										<div class="col-md-6">
										  <textarea type="text" class="form-control" name="description" placeholder="{{$producto->descripcion}}" value="{{$producto->descripcion}}"></textarea>
										</div>
									  </div>								
							
									  <div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Altas Graduaciones</label>
										<div class="col-md-6">
										  <div class="form-check">
											<input class="form-check-input" type="radio" value="1" name="altas_graduaciones" id="altasi">
											<label class="form-check-label" for="altasi">
											  Si
											</label>
										  </div>
										  <div class="form-check">
											<input class="form-check-input" type="radio" value="0" name="altas_graduaciones" id="altano" checked>
											<label class="form-check-label" for="altano">
											 No
											</label>
										  </div>              
										</div>
									  </div>
							
									  <div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Plaquetas Ajustables</label>
										<div class="col-md-6">
										  <div class="form-check">
											<input class="form-check-input" type="radio" value="1" name="plaquetas_ajustables" id="ajustablesi">
											<label class="form-check-label" for="ajustablesi">
											  Si
											</label>
										  </div>
										  <div class="form-check">
											<input class="form-check-input" type="radio" value="0" name="plaquetas_ajustables" id="ajustableno" checked>
											<label class="form-check-label" for="ajustableno">
											 No
											</label>
										  </div>              
										</div>
									  </div>
							
									  <div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Calibre</label>
										<div class="col-md-6">
											<input id="name" type="number" class="form-control" value="{{$producto->calibre}}" name="calibre" >              
										</div>
									 </div>
							
									 <div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Largo Patillas</label>
										<div class="col-md-6">
										  <input id="name" type="number" class="form-control" value="{{$producto->largo_patillas}}" name="largo_patillas" >              
										</div>
									  </div>

									  <div class="form-group row">
										<label for="altura_puente" class="col-md-4 col-form-label text-md-right">Altura Puente</label>
										<div class="col-md-6">
										  <input id="altura_puente" type="number" class="form-control" value="{{$producto->altura_puente}}" name="altura_puente" >              
										</div>
									  </div>
							
							
									  <div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Sexo (M, F, U)</label>
										<div class="col-md-6">
										  <input id="name" type="text" class="form-control" name="sexo" value="{{$producto->sexo}}" >              
										</div>
									  </div>

									  <div class="form-group row">
										<label class="col-md-4 col-form-label text-md-right">¿Pediátrico?</label>
										
										  <div class="form-check col-md-1">
											<input class="form-check-input" type="radio" value="1" name="padiatrico" id="pediatricosi">
											<label class="form-check-label" for="pediatricosi">
											  Si
											</label>
										  </div>
										  <div class="form-check col-md-1">
											<input class="form-check-input" type="radio" value="0" name="padiatrico" id="pediatricono">
											<label class="form-check-label" for="pediatricono">
											 No
											</label>
										  </div>              
									
									  </div>		
						
									  <div class="form-group row" id="menordedosaños" style="display: none;">
										<label for="menor" class="col-md-4 col-form-label text-md-right">¿Menor de 2 años?</label>
										
										  <div class="form-check col-md-1">
											<input class="form-check-input" type="radio" value="1" name="menor" id="menorsi">
											<label class="form-check-label" for="menorsi">
											  Si
											</label>
										  </div>
										  <div class="form-check col-md-1">
											<input class="form-check-input" type="radio" value="0" name="menor" id="menorno">
											<label class="form-check-label" for="menorno">
											 No
											</label>
										  </div>              
									
									  </div>		
							
									  <div id="rango_etario_desde_div" class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Rango etario desde (Años)</label>
										<div class="col-md-6">
											<input id="name" type="number" class="form-control" name="rango_etario_desde" >              
										</div>
									 </div>
							
									 <div id="rango_etario_hasta_div" class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Rango etario hasta (Años)</label>
										<div class="col-md-6">
										  <input id="name" type="number" class="form-control" name="rango_etario_hasta" >              
										</div>
									  </div>
						
									  <div id="rango_etario_desde_meses" class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Rango etario desde (Meses)</label>
										<div class="col-md-6">
											<input id="name" type="number" class="form-control" name="rango_etario_desde_meses" >              
										</div>
									 </div>
							
									 <div id="rango_etario_hasta_meses" class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">Rango etario hasta (Meses)</label>
										<div class="col-md-6">
										  <input id="name" type="number" class="form-control" name="rango_etario_hasta_meses" >              
										</div>
									  </div>
							
									  <div class="form-group row">
										<label for="costo" class="col-md-4 col-form-label text-md-right">Costo</label>
										<div class="col-md-6">
											<input id="costo" type="number" class="form-control" value="{{$producto->costo}}" name="Costo" >              
										</div>
									 </div>
							
									 <div class="form-group row">
									  <label for="impuesto" class="col-md-4 col-form-label text-md-right">Impuesto (%)</label>
									  <div class="col-md-6">
										  <input id="impuesto" type="number" class="form-control" value="{{$producto->impuesto}}" name="impuesto" >              
									  </div>
								   </div>
							
								   <div class="form-group row">
									<label for="ganancia" class="col-md-4 col-form-label text-md-right">Ganancia</label>
									<div class="col-md-6">
										<input id="ganancia" type="number" class="form-control" value="{{$producto->ganancia}}" name="ganancia" >              
									</div>
									</div>
									
							
									<div class="form-group row" id="div-monto">
									  <label for="monto" class="col-md-4 col-form-label text-md-right">Monto</label>
									  <div class="col-md-6">
										  <input id="monto" type="number" class="form-control" value="{{$producto->monto}}" name="monto" >              
									  </div>
								   </div>


								   <script
								   src="https://code.jquery.com/jquery-3.5.1.min.js"
								   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
								   crossorigin="anonymous"></script>
											<script>
											 
								 
											 $( "#div-monto" ).click(function() {
													 var costo =  $("#costo").val();
													 var impuesto = $("#impuesto").val();
													 var ganancia = $("#ganancia").val();
													 var porcentaje = (costo * impuesto)/100;					
													 var subtotal = parseFloat(costo) + parseFloat(porcentaje);	
													 var porcentajeGanancia = (costo * ganancia)/100;
													 var total = parseFloat(subtotal) + parseFloat(porcentajeGanancia);	
													 var format = Math.round(total, 2);							
													 $("#monto").val(total.toFixed(2));
											 });
											 </script>

								   <div class="form-group row">
									<label for="cambio_id" class="col-md-4 col-form-label text-md-right">Tipo de Cambio</label>
									<div class="col-md-6">
									<select id="cambio_id" class="form-control" name="cambio_id">
									<option value="">Seleccionar tipo de cambio</option>
										<option selected value="{{$producto->tipo_cambio->id}}">{{$producto->tipo_cambio->nombre}}</option>
										@foreach($tipos_cambio as $cambio)                
										  <option value={{$cambio->id}}>{{$cambio->nombre}}</option>
										@endforeach
									</select>
								  </div>
								</div>
							
								   <div class="form-group row">
									<label for="name" class="col-md-4 col-form-label text-md-right">Monto Descuento</label>
									<div class="col-md-6">
										<input id="name" type="number" class="form-control" value="{{$producto->descuento}}" name="descuento" >              
									</div>
								   </div>
							
								   <div class="form-group row">
									<label for="name" class="col-md-4 col-form-label text-md-right">Descuento (%)</label>
									<div class="col-md-6">
										<input id="name" type="number" class="form-control" value="{{$producto->descuento_porcentaje}}" name="descuento_porcentaje" >              
									</div>
								   </div>
							
								   <div class="form-group row">
									<label for="name" class="col-md-4 col-form-label text-md-right">Destacado</label>
								    <div class="col-md-6">
									  <div class="form-check">
										<input class="form-check-input" type="radio" value="1" name="destacado" id="destacadosi">
										<label class="form-check-label" for="destacadosi">
										  Si
										</label>
									  </div>
									  <div class="form-check">
										<input class="form-check-input" type="radio" value="0" name="destacado" id="destacadono" checked>
										<label class="form-check-label" for="destacadono">
										 No
										</label>
									  </div>        
									</div>      
								  
								  </div>
							
								  <div class="form-group row">
									<label for="name" class="col-md-4 col-form-label text-md-right">Habilitado</label>
									<div class="col-md-6">
									  <div class="form-check">
										<input class="form-check-input" type="radio" value="1" name="habilitado" id="habilitadosi">
										<label class="form-check-label" for="habilitadosi">
										  Si
										</label>
									  </div>
									  <div class="form-check">
										<input class="form-check-input" type="radio" value="0" name="habilitado" id="habilitadono" checked>
										<label class="form-check-label" for="habilitadono">
										 No
										</label>
									  </div>              
									</div>
								  </div>
							
								  <div class="form-group row">
									<label for="name" class="col-md-4 col-form-label text-md-right">Stock (Cantidad del mismo articulo)</label>
									<div class="col-md-6">
										<input id="name" type="number" class="form-control" value="{{$producto->stock}}" name="stock" >              
									</div>
								 </div>
								  
								 <div class="form-group row">
									<label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
									<img class="col-md-2" src="img-products/{{$producto->img1}}">
									<input id="file" class="col-md-4" name="file1" type="file" />          											
									</div>    

									<div class="form-group row">
										<label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
										<img class="col-md-2" src="img-products/{{$producto->img2}}">
										<input id="file" class="col-md-4" name="file2" type="file" />          											
										</div>    

										<div class="form-group row">
											<label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
											<img class="col-md-2" src="img-products/{{$producto->img3}}">
											<input id="file" class="col-md-4" name="file3" type="file" />          											
											</div>    

											<div class="form-group row">
												<label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
												<img class="col-md-2" src="img-products/{{$producto->img4}}">
												<input id="file" class="col-md-4" name="file4" type="file" />          											
												</div>    									
												 
									  <div class="form-group row mb-0">
										  <div class="col-md-6 offset-md-4">
											  <button type="submit" class="btn btn-primary">
												Guardar Producto
											  </button>
										  </div>
									  </div>
								  </form>
								
							</div>
					</main>		
				</div>
			</div>	
	<script
	src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>

	<script>
		$("#pediatricosi").on( 'change', function() {
			if( $(this).is(':checked') ) {
				$("#distancia_apto").hide('slow');
				$("#forma_armazon").hide('slow');
				$("#ancho_cara_div").hide('slow');
				$("#altas_graduaciones").hide('slow');
				$("#plaquetas_ajustables").hide('slow');
				$("#calibre").hide('slow');
				$("#largo_patillas_div").hide('slow');
				$("#altura_puente_div").hide('slow');
				$("#sexo").hide('slow');
				$("#menordedosaños").show('slow');								
			}
		});

		$("#pediatricono").on( 'change', function() {
			if( $(this).is(':checked') ) {
				$("#distancia_apto").show('slow');
				$("#forma_armazon").show('slow');
				$("#ancho_cara_div").show('slow');
				$("#altas_graduaciones").show('slow');
				$("#plaquetas_ajustables").show('slow');
				$("#calibre").show('slow');
				$("#largo_patillas_div").show('slow');
				$("#altura_puente_div").show('slow');
				$("#sexo").show('slow');
				$("#rango_etario_desde_div").hide('slow');
				$("#rango_etario_hasta_div").hide('slow');
				$("#rango_etario_desde_meses").hide('slow');
				$("#rango_etario_hasta_meses").hide('slow');
				$("#menordedosaños").hide('slow');				
			}
		});

		$("#menorsi").on( 'change', function() {
			if( $(this).is(':checked') ) {
				$("#rango_etario_desde_meses").show('slow');
				$("#rango_etario_hasta_meses").show('slow');
				$("#rango_etario_desde_div").hide('slow');
				$("#rango_etario_hasta_div").hide('slow');
			}
		});

		$("#menorno").on( 'change', function() {
			if( $(this).is(':checked') ) {
				$("#rango_etario_desde_meses").hide('slow');
				$("#rango_etario_hasta_meses").hide('slow');
				$("#rango_etario_desde_div").show('slow');
				$("#rango_etario_hasta_div").show('slow');
			}
		});
				
	</script>


</body>

</html>