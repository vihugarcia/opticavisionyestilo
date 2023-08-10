<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<title>Óptica Visión y Estilo</title>
	
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/optica.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Anton&family=Lora:wght@700&display=swap" rel="stylesheet">


	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
	<link rel="stylesheet" href="https://unpkg.com/photoswipe@5.2.2/dist/photoswipe.css">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kufam:ital,wght@1,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="assets/zooming.min.js"></script>


	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body style="background: #fafafa87">
	@if(session()->has('carrito'))
		<?php 
			$carrito = session()->get('carrito'); 
			if(!$carrito->products){
				session()->forget('carrito');
			}
		 ?> 
	@endif
	
	
	@if(session()->has('response'))	
		<script>
			swal({
  			title: "¡Bienvenido!",
  			text: "Hola, haz iniciado sesión correctamente, ahora podrás comprar y ver tus pedidos.",
  			icon: "success",
  			button: "Gracias",
			});
		</script>
		<?php session()->forget('response'); ?> 
	@endif

	
	@if(session()->has('error'))	
		<script>
			swal({
  			title: "¡Lo sentimos!",
  			text: "Ocurrió un error mientras intentabas acceder. Por favor cierra la sesión en la cuenta que estás utilizando para ingresar, o intenta nuevamente.",
  			icon: "error",
  			button: "Gracias",
			});
		</script>
		<?php session()->forget('error'); ?> 
	@endif

	<?php //session()->forget('carrito'); ?>
	<div class="top-info">ENVÍOS A TODO EL PAÍS <img class="icon-info" src="img/camion.png"></div>
	<nav class="navbar navbar-expand-lg navbar-dark navbar-color" style="background: rgb(255, 255, 255);border-bottom: 0.1rem solid #f4f4f4;">
		
		<div class="container">
			<button class="navbar-toggler navbar-left" style="border:none;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
		<a class="navbar-brand text-brand" href="/" style="margin-right: 30px">
			<span style="font-family: 'Anton', sans-serif;text-align: center;font-size: 30px;"><img src="img/logo.png"></span></a>
			
			<a @if(session()->has('carrito')) href="/pedido" @endif>
			    <i style="font-size: 35px;color: white;margin-right: 15px;" class="fa fa-shopping-cart responsive" aria-hidden="true"><span class="badge badge-light" style="font-size: 10px;position: absolute;top: 5px;">@if(session()->has('carrito')) @if($carrito->cristales) {{count($carrito->products) + count($carrito->cristales)}} @else {{count($carrito->products)}} @endif @endif</span></i>		
			</a>
		<div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
		  <ul class="navbar-nav">
			@if (Auth::guest())									
			<div class="row responsive" style="height: auto;padding: 18px 24px;">
				<div class="col-2">
					<div style="height: 70px;width: 70px;background-color: #ededed;-webkit-border-radius: 50%;border-radius: 50%;float: left;margin-right: 16px;text-align: center;">
						<svg style="margin-top: 15px;" class="nav-header-menu-mobile-guest-icon" width="28" height="35" xmlns="http://www.w3.org/2000/svg"><path d="M27.343 33.706l-1.356.64A13.25 13.25 0 0 0 14 26.75c-5.17 0-9.8 2.988-11.978 7.578l-1.356-.643A14.75 14.75 0 0 1 14 25.25a14.75 14.75 0 0 1 13.343 8.456zM14 21.75C8.063 21.75 3.25 16.937 3.25 11S8.063.25 14 .25 24.75 5.063 24.75 11 19.937 21.75 14 21.75zm0-1.5a9.25 9.25 0 1 0 0-18.5 9.25 9.25 0 0 0 0 18.5zm0-2.5v-1.5a5.25 5.25 0 1 0 0-10.5v-1.5a6.75 6.75 0 0 1 0 13.5z" fill="#BBB" fill-rule="nonzero"></path></svg>
					</div>
				</div>
				<div class="col-10" style="margin-left: 30px;">
					<h5 class="text-product-price" style="text-align: left; margin-bottom: 0px;font-weight: 600;color: #fafafa">Bienvenido</h5>
					<h6 class="text-product-description" style="text-align: left; margin-bottom: 0px;">Ingresá a tu cuenta para ver tus pedidos.</h5>
				</div>

			</div>
			<div class="row responsive">
				<div class="col-12">
					<a style="cursor: pointer; width: 100%" class="btn btn-outline-secondary" href="/login">Iniciar sesión</a>
				</div>				
			</div>
			@else
			<li class="dropdown responsive">
				<div class="row responsive" style="height: auto;padding: 18px 24px;">
					<div class="col-2">
						<div style="height: 70px;width: 70px;background-color: #ededed;-webkit-border-radius: 50%;border-radius: 50%;float: left;margin-right: 16px;text-align: center;">
							<img style="height: 60px;margin-top: 5px;border-radius: 30px;"
								@if(Auth::user()->usuario)
									src="img-perfil/{{Auth::user()->usuario->img}}"
								@endif
								@if(Auth::user()->medico)
									src="img-perfil/{{Auth::user()->medico->img}}"
								@endif
								@if(Auth::user()->vendedor)
									src="img-perfil/{{Auth::user()->vendedor->img}}"
								@endif
								@if(Auth::user()->admin)
									src="img-perfil/perfil.png"
								@endif
							>
						</div>
					</div>
					<div class="col-10" style="margin-left: 30px;margin-top: 15px;">
						<h5 class="text-product-price" style="text-align: left; margin-bottom: 0px;font-weight: 600;font-size: 15px;color: rgb(92, 92, 92);">{{Auth::user()->name}}</h5>
						<h6 class="text-product-description" style="text-align: left; margin-bottom: 0px;">
							<a class="text-secondary" href="/dashboard">
								@if(Auth::user()->usuario) Ver mis pedidos @endif
								@if(Auth::user()->vendedor) Panel de control @endif
								@if(Auth::user()->admin) Panel de Administración @endif
								@if(Auth::user()->medico) Panel de control @endif
								
							</a>.</h5>
					</div>
	
				</div>							
			</li>											
			@endif            
			<li class="nav-item active">
			  <a class="nav-link navbar-color" style="color: rgb(92, 92, 92);"  href="/">INICIO <span class="sr-only">(current)</span></a>
			</li>
         
			<li class="nav-item">
			  <a class="nav-link navbar-color" href="#"  style="color: rgb(92, 92, 92);">¿QUIÉNES SOMOS?</a>
			</li>	
            <li class="nav-item">
                <a class="nav-link navbar-color" href="#" style="color: rgb(92, 92, 92);">CONTACTO</a>
              </li>	
			  <li class="nav-item dropdown">
                <a href="/productos" class="nav-link dropdown-toggle text-product-price" style="color: rgb(92, 92, 92);">
                 PRODUCTOS
                </a>             
              </li>	                          			
						
		  </ul>
		  

		  <ul class="navbar-nav ml-auto right-menu">			
		  			
			@if (Auth::guest())									
				<li class="nav-item no-responsive"><a class="nav-link btn btn-outline-secondary" href="/login">Ingresar</a></li>
			@else
				<li class="dropdown no-responsive">
					<img style="height: 40px;border-radius: 50px;margin-right: 10px;" src="{{Auth::user()->avatar}}"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu" style="padding: 10px;">
						<li><a class="dropdown-item" style="color:black" href="{{ url('/dashboard') }}">Panel de control</a></li>
						<hr>
						<li>	
							<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button class="dropdown-item" type="submit">Cerrar Sesión</button>
							</form>
					</li>
					</ul>
				</li>											
			@endif
		</ul>
		</div>
		</div>
	  </nav>

	@yield('content')
	
	@if(session()->has('carrito'))
		<div class="row" style="position:fixed; bottom: 10%; right :10%;z-index: 9999" >			
			<a href="/pedido" style="padding: 15px;border: 1px solid rgb(44, 44, 44); background: black;border-radius: 70px;">
			<i style="font-size: 50px;color:white"class="fa fa-shopping-cart" aria-hidden="true"><span class="badge badge-dark" style="font-size: 15px;position: absolute;top: 0px;"> @if($carrito->cristales) {{count($carrito->products) + count($carrito->cristales)}} @else {{ count($carrito->products)}} @endif</span></i>
			<br><span class="text-white text-sm"><strong>Ver carrito</strong></span>			
			</a>
		</div>	
	@endif


	<footer class="footer mt-5" style="background: #b9b2b2;">
		<div class="container text-center" style="color: #4a4747;padding: 15px 15px 15px 0px;">								
					<ul id="cards" class="payment-icons">
						<li><div class="payment-icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32"> <path d="M42.667-0c-4.099 0-7.836 1.543-10.667 4.077-2.831-2.534-6.568-4.077-10.667-4.077-8.836 0-16 7.163-16 16s7.164 16 16 16c4.099 0 7.835-1.543 10.667-4.077 2.831 2.534 6.568 4.077 10.667 4.077 8.837 0 16-7.163 16-16s-7.163-16-16-16zM11.934 19.828l0.924-5.809-2.112 5.809h-1.188v-5.809l-1.056 5.809h-1.584l1.32-7.657h2.376v4.753l1.716-4.753h2.508l-1.32 7.657h-1.585zM19.327 18.244c-0.088 0.528-0.178 0.924-0.264 1.188v0.396h-1.32v-0.66c-0.353 0.528-0.924 0.792-1.716 0.792-0.442 0-0.792-0.132-1.056-0.396-0.264-0.351-0.396-0.792-0.396-1.32 0-0.792 0.218-1.364 0.66-1.716 0.614-0.44 1.364-0.66 2.244-0.66h0.66v-0.396c0-0.351-0.353-0.528-1.056-0.528-0.442 0-1.012 0.088-1.716 0.264 0.086-0.351 0.175-0.792 0.264-1.32 0.703-0.264 1.32-0.396 1.848-0.396 1.496 0 2.244 0.616 2.244 1.848 0 0.353-0.046 0.749-0.132 1.188-0.089 0.616-0.179 1.188-0.264 1.716zM24.079 15.076c-0.264-0.086-0.66-0.132-1.188-0.132s-0.792 0.177-0.792 0.528c0 0.177 0.044 0.31 0.132 0.396l0.528 0.264c0.792 0.442 1.188 1.012 1.188 1.716 0 1.409-0.838 2.112-2.508 2.112-0.792 0-1.366-0.044-1.716-0.132 0.086-0.351 0.175-0.836 0.264-1.452 0.703 0.177 1.188 0.264 1.452 0.264 0.614 0 0.924-0.175 0.924-0.528 0-0.175-0.046-0.308-0.132-0.396-0.178-0.175-0.396-0.308-0.66-0.396-0.792-0.351-1.188-0.924-1.188-1.716 0-1.407 0.792-2.112 2.376-2.112 0.792 0 1.32 0.045 1.584 0.132l-0.265 1.451zM27.512 15.208h-0.924c0 0.442-0.046 0.838-0.132 1.188 0 0.088-0.022 0.264-0.066 0.528-0.046 0.264-0.112 0.442-0.198 0.528v0.528c0 0.353 0.175 0.528 0.528 0.528 0.175 0 0.35-0.044 0.528-0.132l-0.264 1.452c-0.264 0.088-0.66 0.132-1.188 0.132-0.881 0-1.32-0.44-1.32-1.32 0-0.528 0.086-1.099 0.264-1.716l0.66-4.225h1.584l-0.132 0.924h0.792l-0.132 1.585zM32.66 17.32h-3.3c0 0.442 0.086 0.749 0.264 0.924 0.264 0.264 0.66 0.396 1.188 0.396s1.1-0.175 1.716-0.528l-0.264 1.584c-0.442 0.177-1.012 0.264-1.716 0.264-1.848 0-2.772-0.924-2.772-2.773 0-1.142 0.264-2.024 0.792-2.64 0.528-0.703 1.188-1.056 1.98-1.056 0.703 0 1.274 0.22 1.716 0.66 0.35 0.353 0.528 0.881 0.528 1.584 0.001 0.617-0.046 1.145-0.132 1.585zM35.3 16.132c-0.264 0.97-0.484 2.201-0.66 3.697h-1.716l0.132-0.396c0.35-2.463 0.614-4.4 0.792-5.809h1.584l-0.132 0.924c0.264-0.44 0.528-0.703 0.792-0.792 0.264-0.264 0.528-0.308 0.792-0.132-0.088 0.088-0.31 0.706-0.66 1.848-0.353-0.086-0.661 0.132-0.925 0.66zM41.241 19.697c-0.353 0.177-0.838 0.264-1.452 0.264-0.881 0-1.584-0.308-2.112-0.924-0.528-0.528-0.792-1.32-0.792-2.376 0-1.32 0.35-2.42 1.056-3.3 0.614-0.879 1.496-1.32 2.64-1.32 0.44 0 1.056 0.132 1.848 0.396l-0.264 1.584c-0.528-0.264-1.012-0.396-1.452-0.396-0.707 0-1.235 0.264-1.584 0.792-0.353 0.442-0.528 1.144-0.528 2.112 0 0.616 0.132 1.056 0.396 1.32 0.264 0.353 0.614 0.528 1.056 0.528 0.44 0 0.924-0.132 1.452-0.396l-0.264 1.717zM47.115 15.868c-0.046 0.264-0.066 0.484-0.066 0.66-0.088 0.442-0.178 1.035-0.264 1.782-0.088 0.749-0.178 1.254-0.264 1.518h-1.32v-0.66c-0.353 0.528-0.924 0.792-1.716 0.792-0.442 0-0.792-0.132-1.056-0.396-0.264-0.351-0.396-0.792-0.396-1.32 0-0.792 0.218-1.364 0.66-1.716 0.614-0.44 1.32-0.66 2.112-0.66h0.66c0.086-0.086 0.132-0.218 0.132-0.396 0-0.351-0.353-0.528-1.056-0.528-0.442 0-1.012 0.088-1.716 0.264 0-0.351 0.086-0.792 0.264-1.32 0.703-0.264 1.32-0.396 1.848-0.396 1.496 0 2.245 0.616 2.245 1.848 0.001 0.089-0.021 0.264-0.065 0.529zM49.69 16.132c-0.178 0.528-0.396 1.762-0.66 3.697h-1.716l0.132-0.396c0.35-1.935 0.614-3.872 0.792-5.809h1.584c0 0.353-0.046 0.66-0.132 0.924 0.264-0.44 0.528-0.703 0.792-0.792 0.35-0.175 0.614-0.218 0.792-0.132-0.353 0.442-0.574 1.056-0.66 1.848-0.353-0.086-0.66 0.132-0.925 0.66zM54.178 19.828l0.132-0.528c-0.353 0.442-0.838 0.66-1.452 0.66-0.707 0-1.188-0.218-1.452-0.66-0.442-0.614-0.66-1.232-0.66-1.848 0-1.142 0.308-2.067 0.924-2.773 0.44-0.703 1.056-1.056 1.848-1.056 0.528 0 1.056 0.264 1.584 0.792l0.264-2.244h1.716l-1.32 7.657h-1.585zM16.159 17.98c0 0.442 0.175 0.66 0.528 0.66 0.35 0 0.614-0.132 0.792-0.396 0.264-0.264 0.396-0.66 0.396-1.188h-0.397c-0.881 0-1.32 0.31-1.32 0.924zM31.076 15.076c-0.088 0-0.178-0.043-0.264-0.132h-0.264c-0.528 0-0.881 0.353-1.056 1.056h1.848v-0.396l-0.132-0.264c-0.001-0.086-0.047-0.175-0.133-0.264zM43.617 17.98c0 0.442 0.175 0.66 0.528 0.66 0.35 0 0.614-0.132 0.792-0.396 0.264-0.264 0.396-0.66 0.396-1.188h-0.396c-0.881 0-1.32 0.31-1.32 0.924zM53.782 15.076c-0.353 0-0.66 0.22-0.924 0.66-0.178 0.264-0.264 0.749-0.264 1.452 0 0.792 0.264 1.188 0.792 1.188 0.35 0 0.66-0.175 0.924-0.528 0.264-0.351 0.396-0.879 0.396-1.584-0.001-0.792-0.311-1.188-0.925-1.188z"></path> </svg></div></li>
						<li><div class="payment-icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32"> <path d="M10.781 7.688c-0.251-1.283-1.219-1.688-2.344-1.688h-8.376l-0.061 0.405c5.749 1.469 10.469 4.595 12.595 10.501l-1.813-9.219zM13.125 19.688l-0.531-2.781c-1.096-2.907-3.752-5.594-6.752-6.813l4.219 15.939h5.469l8.157-20.032h-5.501l-5.062 13.688zM27.72 26.061l3.248-20.061h-5.187l-3.251 20.061h5.189zM41.875 5.656c-5.125 0-8.717 2.72-8.749 6.624-0.032 2.877 2.563 4.469 4.531 5.439 2.032 0.968 2.688 1.624 2.688 2.499 0 1.344-1.624 1.939-3.093 1.939-2.093 0-3.219-0.251-4.875-1.032l-0.688-0.344-0.719 4.499c1.219 0.563 3.437 1.064 5.781 1.064 5.437 0.032 8.97-2.688 9.032-6.843 0-2.282-1.405-4-4.376-5.439-1.811-0.904-2.904-1.563-2.904-2.499 0-0.843 0.936-1.72 2.968-1.72 1.688-0.029 2.936 0.314 3.875 0.752l0.469 0.248 0.717-4.344c-1.032-0.406-2.656-0.844-4.656-0.844zM55.813 6c-1.251 0-2.189 0.376-2.72 1.688l-7.688 18.374h5.437c0.877-2.467 1.096-3 1.096-3 0.592 0 5.875 0 6.624 0 0 0 0.157 0.688 0.624 3h4.813l-4.187-20.061h-4zM53.405 18.938c0 0 0.437-1.157 2.064-5.594-0.032 0.032 0.437-1.157 0.688-1.907l0.374 1.72c0.968 4.781 1.189 5.781 1.189 5.781-0.813 0-3.283 0-4.315 0z"></path> </svg></div></li>
						<li><div class="payment-icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32"> <path d="M2.909 32v-17.111h2.803l0.631-1.54h1.389l0.631 1.54h5.505v-1.162l0.48 1.162h2.853l0.506-1.187v1.187h13.661v-2.5l0.253-0.026c0.227 0 0.252 0.177 0.252 0.354v2.172h7.046v-0.58c1.642 0.858 3.889 0.58 5.606 0.58l0.631-1.54h1.414l0.631 1.54h5.733v-1.464l0.858 1.464h4.596v-9.546h-4.544v1.111l-0.631-1.111h-4.672v1.111l-0.581-1.111h-6.288c-0.934 0-1.919 0.101-2.753 0.556v-0.556h-4.344v0.556c-0.505-0.454-1.187-0.556-1.843-0.556h-15.859l-1.085 2.449-1.086-2.449h-5v1.111l-0.556-1.111h-4.267l-1.97 4.52v-9.864h58.182v17.111h-3.030c-0.707 0-1.464 0.126-2.045 0.556v-0.556h-4.47c-0.631 0-1.49 0.1-1.97 0.556v-0.556h-7.98v0.556c-0.605-0.429-1.49-0.556-2.197-0.556h-5.278v0.556c-0.53-0.505-1.616-0.556-2.298-0.556h-5.909l-1.363 1.464-1.263-1.464h-8.813v9.546h8.66l1.389-1.49 1.313 1.49h5.328v-2.248h0.53c0.758 0 1.54-0.025 2.273-0.328v2.576h4.394v-2.5h0.202c0.252 0 0.303 0.026 0.303 0.303v2.197h13.358c0.733 0 1.642-0.152 2.222-0.606v0.606h4.243c0.808 0 1.667-0.076 2.399-0.429v5.773h-58.181zM20.561 13.525h-1.667v-5.354l-2.374 5.354h-1.439l-2.373-5.354v5.354h-3.334l-0.631-1.515h-3.41l-0.631 1.515h-1.768l2.929-6.843h2.424l2.778 6.49v-6.49h2.677l2.147 4.646 1.944-4.646h2.727v6.843zM8.162 10.596l-1.137-2.727-1.111 2.727h2.248zM29.727 23.020v2.298h-3.182l-2.020-2.273-2.096 2.273h-6.465v-6.843h6.565l2.020 2.248 2.071-2.248h5.227c1.541 0 2.753 0.531 2.753 2.248 0 2.752-3.005 2.298-4.874 2.298zM23.464 21.883l-1.768-1.995h-4.116v1.238h3.586v1.389h-3.586v1.364h4.015l1.868-1.995zM27.252 13.525h-5.48v-6.843h5.48v1.439h-3.839v1.238h3.738v1.389h-3.738v1.364h3.839v1.414zM28.086 24.687v-5.48l-2.5 2.702 2.5 2.778zM33.793 10.369c0.934 0.328 1.086 0.909 1.086 1.818v1.339h-1.642c-0.026-1.464 0.353-2.475-1.464-2.475h-1.768v2.475h-1.616v-6.844l3.864 0.026c1.313 0 2.701 0.202 2.701 1.818 0 0.783-0.429 1.54-1.162 1.843zM31.848 19.889h-2.121v1.743h2.096c0.581 0 1.035-0.278 1.035-0.909 0-0.606-0.454-0.833-1.010-0.833zM32.075 8.121h-2.070v1.516h2.045c0.556 0 1.086-0.126 1.086-0.783 0-0.632-0.556-0.733-1.061-0.733zM40.788 22.136c0.909 0.328 1.086 0.934 1.086 1.818v1.364h-1.642v-1.137c0-1.162-0.379-1.364-1.464-1.364h-1.743v2.5h-1.642v-6.843h3.889c1.288 0 2.677 0.228 2.677 1.844 0 0.757-0.404 1.515-1.162 1.818zM37.555 13.525h-1.667v-6.843h1.667v6.843zM39.096 19.889h-2.071v1.541h2.045c0.556 0 1.085-0.126 1.085-0.808 0-0.631-0.555-0.732-1.060-0.732zM56.924 13.525h-2.323l-3.081-5.126v5.126h-3.334l-0.657-1.515h-3.384l-0.631 1.515h-1.894c-2.248 0-3.258-1.162-3.258-3.359 0-2.298 1.035-3.485 3.359-3.485h1.591v1.491c-1.717-0.026-3.283-0.404-3.283 1.944 0 1.162 0.278 1.97 1.591 1.97h0.732l2.323-5.379h2.45l2.753 6.465v-6.465h2.5l2.879 4.747v-4.747h1.667v6.818zM48.313 25.318h-5.455v-6.843h5.455v1.414h-3.813v1.238h3.738v1.389h-3.738v1.364l3.813 0.025v1.414zM46.975 10.596l-1.111-2.727-1.137 2.727h2.248zM52.48 25.318h-3.182v-1.464h3.182c0.404 0 0.858-0.101 0.858-0.631 0-1.464-4.217 0.556-4.217-2.702 0-1.389 1.060-2.045 2.323-2.045h3.283v1.439h-3.005c-0.429 0-0.909 0.076-0.909 0.631 0 1.49 4.243-0.682 4.243 2.601 0.001 1.615-1.111 2.172-2.575 2.172zM61.091 24.434c-0.48 0.707-1.414 0.884-2.222 0.884h-3.157v-1.464h3.157c0.404 0 0.833-0.126 0.833-0.631 0-1.439-4.217 0.556-4.217-2.702 0-1.389 1.086-2.045 2.349-2.045h3.258v1.439h-2.98c-0.454 0-0.909 0.076-0.909 0.631 0 1.212 2.854-0.025 3.889 1.338v2.55z"></path> </svg></div></li>
						<li><div class="payment-icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32"> <path d="M35.255 12.078h-2.396c-0.229 0-0.444 0.114-0.572 0.303l-3.306 4.868-1.4-4.678c-0.088-0.292-0.358-0.493-0.663-0.493h-2.355c-0.284 0-0.485 0.28-0.393 0.548l2.638 7.745-2.481 3.501c-0.195 0.275 0.002 0.655 0.339 0.655h2.394c0.227 0 0.439-0.111 0.569-0.297l7.968-11.501c0.191-0.275-0.006-0.652-0.341-0.652zM19.237 16.718c-0.23 1.362-1.311 2.276-2.691 2.276-0.691 0-1.245-0.223-1.601-0.644-0.353-0.417-0.485-1.012-0.374-1.674 0.214-1.35 1.313-2.294 2.671-2.294 0.677 0 1.227 0.225 1.589 0.65 0.365 0.428 0.509 1.027 0.404 1.686zM22.559 12.078h-2.384c-0.204 0-0.378 0.148-0.41 0.351l-0.104 0.666-0.166-0.241c-0.517-0.749-1.667-1-2.817-1-2.634 0-4.883 1.996-5.321 4.796-0.228 1.396 0.095 2.731 0.888 3.662 0.727 0.856 1.765 1.212 3.002 1.212 2.123 0 3.3-1.363 3.3-1.363l-0.106 0.662c-0.040 0.252 0.155 0.479 0.41 0.479h2.147c0.341 0 0.63-0.247 0.684-0.584l1.289-8.161c0.040-0.251-0.155-0.479-0.41-0.479zM8.254 12.135c-0.272 1.787-1.636 1.787-2.957 1.787h-0.751l0.527-3.336c0.031-0.202 0.205-0.35 0.41-0.35h0.345c0.899 0 1.747 0 2.185 0.511 0.262 0.307 0.341 0.761 0.242 1.388zM7.68 7.473h-4.979c-0.341 0-0.63 0.248-0.684 0.584l-2.013 12.765c-0.040 0.252 0.155 0.479 0.41 0.479h2.378c0.34 0 0.63-0.248 0.683-0.584l0.543-3.444c0.053-0.337 0.343-0.584 0.683-0.584h1.575c3.279 0 5.172-1.587 5.666-4.732 0.223-1.375 0.009-2.456-0.635-3.212-0.707-0.832-1.962-1.272-3.628-1.272zM60.876 7.823l-2.043 12.998c-0.040 0.252 0.155 0.479 0.41 0.479h2.055c0.34 0 0.63-0.248 0.683-0.584l2.015-12.765c0.040-0.252-0.155-0.479-0.41-0.479h-2.299c-0.205 0.001-0.379 0.148-0.41 0.351zM54.744 16.718c-0.23 1.362-1.311 2.276-2.691 2.276-0.691 0-1.245-0.223-1.601-0.644-0.353-0.417-0.485-1.012-0.374-1.674 0.214-1.35 1.313-2.294 2.671-2.294 0.677 0 1.227 0.225 1.589 0.65 0.365 0.428 0.509 1.027 0.404 1.686zM58.066 12.078h-2.384c-0.204 0-0.378 0.148-0.41 0.351l-0.104 0.666-0.167-0.241c-0.516-0.749-1.667-1-2.816-1-2.634 0-4.883 1.996-5.321 4.796-0.228 1.396 0.095 2.731 0.888 3.662 0.727 0.856 1.765 1.212 3.002 1.212 2.123 0 3.3-1.363 3.3-1.363l-0.106 0.662c-0.040 0.252 0.155 0.479 0.41 0.479h2.147c0.341 0 0.63-0.247 0.684-0.584l1.289-8.161c0.040-0.252-0.156-0.479-0.41-0.479zM43.761 12.135c-0.272 1.787-1.636 1.787-2.957 1.787h-0.751l0.527-3.336c0.031-0.202 0.205-0.35 0.41-0.35h0.345c0.899 0 1.747 0 2.185 0.511 0.261 0.307 0.34 0.761 0.241 1.388zM43.187 7.473h-4.979c-0.341 0-0.63 0.248-0.684 0.584l-2.013 12.765c-0.040 0.252 0.156 0.479 0.41 0.479h2.554c0.238 0 0.441-0.173 0.478-0.408l0.572-3.619c0.053-0.337 0.343-0.584 0.683-0.584h1.575c3.279 0 5.172-1.587 5.666-4.732 0.223-1.375 0.009-2.456-0.635-3.212-0.707-0.832-1.962-1.272-3.627-1.272z"></path> </svg></div></li>
						<li><div class="payment-icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32"> <path d="M8.498 23.915h-1.588l1.322-5.127h-1.832l0.286-1.099h5.259l-0.287 1.099h-1.837l-1.323 5.127zM13.935 21.526l-0.62 2.389h-1.588l1.608-6.226h1.869c0.822 0 1.44 0.145 1.853 0.435 0.412 0.289 0.62 0.714 0.62 1.273 0 0.449-0.145 0.834-0.432 1.156-0.289 0.322-0.703 0.561-1.245 0.717l1.359 2.645h-1.729l-1.077-2.389h-0.619zM14.21 20.452h0.406c0.454 0 0.809-0.081 1.062-0.243s0.38-0.409 0.38-0.741c0-0.233-0.083-0.407-0.248-0.523s-0.424-0.175-0.778-0.175h-0.385l-0.438 1.682zM22.593 22.433h-2.462l-0.895 1.482h-1.666l3.987-6.252h1.942l0.765 6.252h-1.546l-0.125-1.482zM22.515 21.326l-0.134-1.491c-0.035-0.372-0.052-0.731-0.052-1.077v-0.154c-0.153 0.34-0.342 0.701-0.567 1.081l-0.979 1.64h1.732zM31.663 23.915h-1.78l-1.853-4.71h-0.032l-0.021 0.136c-0.111 0.613-0.226 1.161-0.343 1.643l-0.755 2.93h-1.432l1.608-6.226h1.859l1.77 4.586h0.021c0.042-0.215 0.109-0.524 0.204-0.924s0.406-1.621 0.937-3.662h1.427l-1.609 6.225zM38.412 22.075c0 0.593-0.257 1.062-0.771 1.407s-1.21 0.517-2.088 0.517c-0.768 0-1.386-0.128-1.853-0.383v-1.167c0.669 0.307 1.291 0.46 1.863 0.46 0.389 0 0.693-0.060 0.911-0.181s0.328-0.285 0.328-0.495c0-0.122-0.024-0.229-0.071-0.322s-0.114-0.178-0.2-0.257c-0.088-0.079-0.303-0.224-0.646-0.435-0.479-0.28-0.817-0.559-1.011-0.835-0.195-0.275-0.292-0.572-0.292-0.89 0-0.366 0.108-0.693 0.323-0.982 0.214-0.288 0.522-0.512 0.918-0.673 0.398-0.16 0.854-0.24 1.372-0.24 0.753 0 1.442 0.14 2.067 0.421l-0.567 0.993c-0.541-0.21-1.041-0.316-1.499-0.316-0.289 0-0.525 0.064-0.708 0.192-0.185 0.128-0.276 0.297-0.276 0.506 0 0.173 0.057 0.325 0.172 0.454 0.114 0.129 0.371 0.3 0.771 0.513 0.419 0.227 0.733 0.477 0.942 0.752 0.21 0.273 0.314 0.593 0.314 0.959zM41.266 23.915h-1.588l1.608-6.226h4.238l-0.281 1.082h-2.645l-0.412 1.606h2.463l-0.292 1.077h-2.463l-0.63 2.461zM49.857 23.915h-4.253l1.608-6.226h4.259l-0.281 1.082h-2.666l-0.349 1.367h2.484l-0.286 1.081h-2.484l-0.417 1.606h2.666l-0.28 1.091zM53.857 21.526l-0.62 2.389h-1.588l1.608-6.226h1.869c0.822 0 1.44 0.145 1.853 0.435s0.62 0.714 0.62 1.273c0 0.449-0.145 0.834-0.432 1.156-0.289 0.322-0.703 0.561-1.245 0.717l1.359 2.645h-1.729l-1.077-2.389h-0.619zM54.133 20.452h0.406c0.454 0 0.809-0.081 1.062-0.243s0.38-0.409 0.38-0.741c0-0.233-0.083-0.407-0.248-0.523s-0.424-0.175-0.778-0.175h-0.385l-0.438 1.682zM30.072 8.026c0.796 0 1.397 0.118 1.804 0.355s0.61 0.591 0.61 1.061c0 0.436-0.144 0.796-0.433 1.080-0.289 0.283-0.699 0.472-1.231 0.564v0.026c0.348 0.076 0.625 0.216 0.831 0.421 0.207 0.205 0.31 0.467 0.31 0.787 0 0.666-0.266 1.179-0.797 1.539s-1.267 0.541-2.206 0.541h-2.72l1.611-6.374h2.221zM28.111 13.284h0.938c0.406 0 0.726-0.084 0.957-0.253s0.347-0.403 0.347-0.701c0-0.471-0.317-0.707-0.954-0.707h-0.86l-0.428 1.661zM28.805 10.55h0.776c0.421 0 0.736-0.071 0.946-0.212s0.316-0.344 0.316-0.608c0-0.398-0.296-0.598-0.886-0.598h-0.792l-0.36 1.418zM37.242 12.883h-2.466l-0.897 1.517h-1.669l3.993-6.4h1.945l0.766 6.4h-1.548l-0.125-1.517zM37.163 11.749l-0.135-1.526c-0.035-0.381-0.053-0.748-0.053-1.103v-0.157c-0.153 0.349-0.342 0.718-0.568 1.107l-0.98 1.679h1.736zM46.325 14.4h-1.782l-1.856-4.822h-0.032l-0.021 0.14c-0.111 0.628-0.226 1.188-0.344 1.683l-0.756 3h-1.434l1.611-6.374h1.861l1.773 4.695h0.021c0.042-0.22 0.11-0.536 0.203-0.946s0.406-1.66 0.938-3.749h1.428l-1.611 6.374zM54.1 14.4h-1.763l-1.099-2.581-0.652 0.305-0.568 2.276h-1.59l1.611-6.374h1.596l-0.792 3.061 0.824-0.894 2.132-2.166h1.882l-3.097 3.052 1.517 3.322zM23.040 8.64c0-0.353-0.287-0.64-0.64-0.64h-14.080c-0.353 0-0.64 0.287-0.64 0.64v0c0 0.353 0.287 0.64 0.64 0.64h14.080c0.353 0 0.64-0.287 0.64-0.64v0zM19.2 11.2c0-0.353-0.287-0.64-0.64-0.64h-10.24c-0.353 0-0.64 0.287-0.64 0.64v0c0 0.353 0.287 0.64 0.64 0.64h10.24c0.353 0 0.64-0.287 0.64-0.64v0zM15.36 13.76c0-0.353-0.287-0.64-0.64-0.64h-6.4c-0.353 0-0.64 0.287-0.64 0.64v0c0 0.353 0.287 0.64 0.64 0.64h6.4c0.353 0 0.64-0.287 0.64-0.64v0z"></path> </svg></div></li>
					</ul>
					<ul id="cards" class="link-footer" style="margin-bottom: 5px;">
						<li><a href="#" class="ml-2">POLÍTICAS DE CAMBIOS</a></li>
						<li><a href="#" class="ml-2">CONTACTO</a></li>
						<li><a href="#" class="ml-2">PRODUCTOS</a></li>	
						<li><a href="#" class="ml-2">¿CÓMO COMPRAR?</a></li>						
					</ul>
					<ul id="cards" class="link-footer" style="margin-bottom: -5px;">					
						<li><a>COPYRIGHT 2023 © <span class="font-weight-bold" style="color: black;">Óptica Visión y Estilo</span></a>
						</li>
					</ul>
					<ul id="cards" class="link-footer">					
						<li><a>TODOS LOS DERECHOS RESERVADOS</a>
						</li>
					</ul>
							
		</div>
	</footer>
	

		

	<!-- Scripts -->

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>



<style>
	.swiper-slide {
  text-align: center;
  width: auto;
}</style>
<script>
    var swiper = new Swiper('.s1', {
      slidesPerView: 1,
      spaceBetween: 2,      
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
	  navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
	  breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 1,
        },
        768: {
          slidesPerView: 1,
          spaceBetween: 1,
        },
        1024: {
          slidesPerView: 1,
          spaceBetween: 1,
        },
	  }
    });

	var newSwiper = new Swiper('.s2', {
      slidesPerView: 1,	 
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
	  navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },	  
	 
    });

	var productSwider = new Swiper('.s3', {
      slidesPerView: 1,
      spaceBetween: 0,      
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
	  navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },	  
	 
    });


  </script>

<div id="modal-login" class="modal fade" role="dialog">
	<div class="modal-dialog" style="top: 10%;">
  
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="modal_button">&times;</span><span class="sr-only">Close</span></button>			
		</div>
		<div class="modal-body" style="background: #f5f5f5">        
			<h4 class="modal-title mb-3 text-product-price">Hola, ¿Con qué cuenta deseas acceder?</h4>
			<h5 style="font-size: 17px;" class="text-product-description">Para poder comprar productos de <span style="color: black">Le Femme Grand Crew</span> tendrá que iniciar sesión con <span style="color: black">Facebook</span> o <span style="color: black">Google</span>. Éstas empresas nos brindan sólo su nombre, imagen de perfil, y el email de su cuenta, respetando sus <a href="https://support.google.com/accounts/answer/112802?co=GENIE.Platform%3DDesktop&hl=es">Políticas de inicio de sesión</a>. </h5>
			<div class="row mt-4">
				<div class="col-6">
					<div id="btn-google" class="google-btn">
						<div class="google-icon-wrapper">
				  			<img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
						</div>
						<p class="btn-text"><b>Acceder con Google</b></p>
			  		</div>
				</div>	
				<div class="col-6">
					<div href="#" class="google-btn" style="margin-left: -10px;" >
						<div class="google-icon-wrapper"><i class="fa fa-facebook fa-fw" style="font-size: 25px;margin-top: 8px;padding-left: 5px;color: #4285f4;"></i></div>
						<span class="btn-text" style="margin-right: 6px;font-weight: bold;">Acceder con Facebook</span>
					</div>
				</div>
			</div>
			<h5 style="font-size: 17px;" class="text-product-description mt-3">Al iniciar sesión en <span style="color:black">Le Femme Grand Crew</span> estás aceptando nuestros <a href="#">Términos y Condiciones</a> y las <a href="#">Políticas de Privacidad</a> del sitio.</h5>
		</div>
		
		<div class="modal-footer">
		  <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
		</div>
	  </div>
  
	</div>
  </div>


  <div id="modal-prendas" class="modal fade" role="dialog">
	<div class="modal-dialog" style="top: 10%;">
  
	<!-- Modal content-->
  
	</div>
  </div>



<script>

	 $(document).ready(function(){
		$('#btn-google').on('click', function(){ 
			window.location.href = "/auth";
	   });
	 });

	</script>

</body>
</html>
