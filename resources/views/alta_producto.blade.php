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
			   <li class="sidebar-item active">
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

					<h1 class="h3 mb-3"><strong>Alta de producto</strong></h1>

          @if(session()->has('alert_success_producto'))
            <div class="alert alert-success">El producto se <strong>cargó con éxito</strong>, puede cargar otro si desea. </div>

          @endif

		  <form method="POST" action="/registrarproducto" enctype="multipart/form-data">          
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
			  <div class="form-group row">
				  <label for="name" class="col-md-4 col-form-label text-md-right">Nombre (A mostrar)</label>
				  <div class="col-md-6">
					  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">                
				  </div>
			  </div>
	
			  <div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Nombre Técnico (Nombre base)</label>
				<div class="col-md-6">
				  <input id="name" type="text" class="form-control" name="nombre_base" required >              
				</div>
			  </div>

			  <div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Código del Producto</label>
				<div class="col-md-6">
					<input id="name" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required  >              
				</div>
			 </div>
			
			  <div class="form-group row">
				<label for="category" class="col-md-4 col-form-label text-md-right">Categoria</label>
				<div class="col-md-6">
				<select id="category" class="form-control" name="categoria_id">
				<option value="">Seleccionar Categoria</option>
					@foreach($categorias as $categoria)                
					  <option value={{$categoria->id}}>{{$categoria->nombre}}</option>
					@endforeach
				</select>
			  </div>
			</div>

			<div class="form-group row">
				<label for="color" class="col-md-4 col-form-label text-md-right">Color</label>
				<div class="col-md-6">
				<select id="color" class="form-control" name="color_id">
				<option value="">Seleccionar Color</option>
					@foreach($colores as $color)                
					  <option value={{$color->id}}>{{$color->nombre}}</option>
					@endforeach
				</select>
			  </div>
			</div>

			<div class="form-group row">
				<label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>
				<div class="col-md-6">
				<select id="marca" class="form-control" name="marca_id">
				<option value="">Seleccionar Marca</option>
					@foreach($marcas as $marca)                
					  <option value={{$marca->id}}>{{$marca->nombre}}</option>
					@endforeach
				</select>
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

			<div class="form-group row">
				<label for="material" class="col-md-4 col-form-label text-md-right">Material</label>
				<div class="col-md-6">
				<select id="material" class="form-control" name="material_id">
				<option value="">Seleccionar Material</option>
					@foreach($materiales as $material)                
					  <option value={{$material->id}}>{{$material->nombre}}</option>
					@endforeach
				</select>
			  </div>
			</div>			
	
			  <div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Tipo de producto</label>
				<div class="col-md-6">
					<select id="tipo_producto" class="form-control" name="tipo_producto">						
						<option selected value="Armazon">Armazon</option>
						<option value="Accesorio">Accesorio</option>
					</select>  
				</div>
			  </div>				
	
			  <div class="form-group row">
				<label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>
				<div class="col-md-6">
				  <textarea type="text" class="form-control" name="description"></textarea>
				</div>
			  </div>

			  <div id="distancia_apto" class="form-group row">
				<label for="distancia" class="col-md-4 col-form-label text-md-right">Distancias Apto</label>
				<div class="col-md-6">
				<select id="distancia" class="form-control" name="distancia_id">
				<option value="">Seleccionar Distancia</option>
					@foreach($distancias as $distancia)                
					  <option value={{$distancia->id}}>{{$distancia->nombre}}</option>
					@endforeach
				</select>
			  </div>
			</div>		

			<div id="forma_armazon" class="form-group row">
				<label for="forma" class="col-md-4 col-form-label text-md-right">Forma de armazón</label>
				<div class="col-md-6">
				<select id="forma" class="form-control" name="forma_id">
				<option value="">Seleccionar Forma de armazón</option>
					@foreach($formas as $forma)                
					  <option value={{$forma->id}}>{{$forma->nombre}}</option>
					@endforeach
				</select>
			  </div>
			</div>

			  <div id="ancho_cara_div" class="form-group row">
				<label for="ancho_cara" class="col-md-4 col-form-label text-md-right">Ancho Cara</label>
				<div class="col-md-6">
					<input id="ancho_cara" type="number" class="form-control" name="ancho_cara">              
				</div>
			 </div>
		
			  <div id="altas_graduaciones" class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Altas Graduaciones</label>			
				  <div class="form-check col-md-1">
					<input class="form-check-input" type="radio" value="1" name="altas_graduaciones" id="altasi">
					<label class="form-check-label" for="altasi">
					  Si
					</label>
				  </div>
				  <div class="form-check col-md-1">
					<input class="form-check-input" type="radio" value="0" name="altas_graduaciones" id="altano" checked>
					<label class="form-check-label" for="altano">
					 No
					</label>
				  </div>              				
			  </div>
	
			  <div id="plaquetas_ajustables" class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Plaquetas Ajustables</label>
				
				  <div class="form-check col-md-1">
					<input class="form-check-input" type="radio" value="1" name="plaquetas_ajustables" id="ajustablesi">
					<label class="form-check-label" for="ajustablesi">
					  Si
					</label>
				  </div>
				  <div class="form-check col-md-1">
					<input class="form-check-input" type="radio" value="0" name="plaquetas_ajustables" id="ajustableno" checked>
					<label class="form-check-label" for="ajustableno">
					 No
					</label>
				  </div>              
			
			  </div>
	
			  <div id="calibre" class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Calibre</label>
				<div class="col-md-6">
					<input id="name" type="number" class="form-control" name="calibre" >              
				</div>
			 </div>
	
			 <div id="largo_patillas_div" class="form-group row">
				<label for="largo_patillas" class="col-md-4 col-form-label text-md-right">Largo Patillas</label>
				<div class="col-md-6">
					<input id="largo_patillas" type="number" class="form-control" name="largo_patillas" >              
				</div>
			 </div>

			<div id="altura_puente_div" class="form-group row">
				<label for="altura_puente" class="col-md-4 col-form-label text-md-right">Altura Puente</label>
				<div class="col-md-6">
					<input id="altura_puente" type="number" class="form-control" name="altura_puente" >              
				</div>
			 </div>
	
	
			  <div id="sexo" class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Sexo (M, F, U)</label>
				<div class="col-md-6">
				  <input id="name" type="text" class="form-control" name="sexo" >              
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
				<label for="costo" class="col-md-4 col-form-label text-md-right">Costo(USD)</label>
				<div class="col-md-6">
					<input id="costo" type="number" class="form-control" name="costo" placeholder="4000" required>              
				</div>
			 </div>
	
			 <div class="form-group row">
			  <label for="impuesto" class="col-md-4 col-form-label text-md-right">Impuesto</label>
			  <div class="col-md-6">
				  <input id="impuesto" type="number" class="form-control" name="impuesto" placeholder="Ejemplo: 30,5" required>              
			  </div>
		   </div>
	
		   <div class="form-group row">
			<label for="ganancia" class="col-md-4 col-form-label text-md-right">Ganancia</label>
			<div class="col-md-6">
				<input id="ganancia" type="number" class="form-control" name="ganancia" placeholder="Ejemplo: 20,5" required>              
			</div>
			</div>
	
			<div class="form-group row" id="div-monto">
			  <label id="labelmonto" for="monto" class="col-md-4 col-form-label text-md-right">Monto</label>
			  <div class="col-md-6">
				  <input id="monto" type="number" class="form-control" name="monto" >              
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
					var subtotal = parseInt(costo) + parseInt(porcentaje);	
					var porcentajeGanancia = (subtotal * ganancia)/100;
					var total = parseInt(subtotal) + parseInt(porcentajeGanancia);	
					var format = Math.round(total);							
					$("#monto").val(format);
			});
			</script>

		   <div class="form-group row">
			<label for="cambio_id" class="col-md-4 col-form-label text-md-right">Tipo de Cambio</label>
			<div class="col-md-6">
			<select id="cambio_id" class="form-control" name="cambio_id">
			<option value="">Seleccionar Tipo de cambio</option>
				@foreach($tipos_cambio as $cambio)                
				  <option value={{$cambio->id}}>{{$cambio->nombre}}</option>
				@endforeach
			</select>
		  </div>
		</div>
	
		  
		   <div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">Descuento (%)</label>
			<div class="col-md-6">
				<input id="name" type="number" class="form-control" name="descuento_porcentaje" required>              
			</div>
		   </div>
	
		   <div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">Destacado</label>
		   
			  <div class="form-check col-md-1">
				<input class="form-check-input" type="radio" value="1" name="destacado" id="destacadosi">
				<label class="form-check-label" for="destacadosi">
				  Si
				</label>
			  </div>
			  <div class="form-check col-md-1">
				<input class="form-check-input" type="radio" value="0" name="destacado" id="destacadono" checked>
				<label class="form-check-label" for="destacadono">
				 No
				</label>
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
			<label for="name" class="col-md-4 col-form-label text-md-right">Stock (Cantidad del mismo articulo)</label>
			<div class="col-md-6">
				<input id="name" type="number" class="form-control" name="stock" required>              
			</div>
		 </div>
		  
		  <div class="form-group row">
			  <label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
			  <input id="file" class="btn btn-primary col-md-6"name="file1" type="file" class="inputfile" />          
			  </div>
			  <div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
				<input id="file" class="btn btn-primary col-md-6"name="file2" type="file" class="inputfile" />          
				</div>
				<div class="form-group row">
				  <label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
				  <input id="file" class="btn btn-primary col-md-6"name="file3" type="file" class="inputfile" />          
				  </div>
				  <div class="form-group row">
					<label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
					<input id="file" class="btn btn-primary col-md-6"name="file4" type="file" class="inputfile" />          
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
				$("#rango_etario_desde_div").show('slow');
				$("#rango_etario_hasta_div").show('slow');
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