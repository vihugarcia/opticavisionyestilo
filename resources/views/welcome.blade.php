@extends('layouts.app')

@section('content')

<style>
	.swiper-container{width: 100%; height: 100%;}
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
	.swiper-slide img {
    transition: none !important;
	}
	

  </style>

  <!-- Swiper -->
  <section class="no-responsive-img" style="padding: 2px 2px 2px 2px;margin: 20px;">	
	<div class="swiper-overflow-container">
		<div class="swiper-container s1">
			<div class="swiper-wrapper">				
				<div class="swiper-slide">
					<img style="width: 100%; height: 50vh" src="img/slider-inicio/slide4.webp">
					<div style="position: absolute; top: 35%; left: 20%; transform: translate(-50%, -50%); color: white;">
						<h1 style="font-family: 'Raleway', sans-serif;color:white"><strong>Óptica Visión y Estilo</strong></h1>
						<h5 style="font-family: 'Raleway', sans-serif;color:white"><strong>LENTES RECETADOS, AL MEJOR PRECIO Y DESDE LA COMODIDAD DE TU HOGAR</strong></h5>
					</div>
				</div>
			</div>
			<!-- Add Pagination -->			
		</div>
	</div>
  </section>

  <section class="responsive" style="padding: 2px 2px 2px 2px;margin: 20px;">	
	<div class="swiper-overflow-container">
		<div class="swiper-container s1">
			<div class="swiper-wrapper">	
				<div class="swiper-slide">
					<img style="width: 100%" src="img/slider-inicio/slider-responsive.png">
					<div style="position: absolute; top: 80%; left: 50%; transform: translate(-50%, -50%); color: white;">
						<h3 style="font-family: 'Raleway', sans-serif;color:white; background: #0000005c"><strong>Óptica Visión y Estilo</strong></h1>						
					</div>
				</div>
				
			</div>
			<!-- Add Pagination -->			
		</div>
	</div>
  </section>

  <section id="about-optica" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 style="font-family: 'Raleway', sans-serif" class="text-center">Nuestro objetivo es encontrarte ese par perfecto.</h2>
                <h4 class="text-center">Como usuarios y profesionales de gafas, sabemos lo increíble que puede hacerte sentir el par adecuado. Encontremos el tuyo juntos.</h4>
            </div>         
        </div>
    </div>
</section>
<style>
.card {
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.05);
}	

</style>

  <section>
	  <div class="container" style="margin-top: 20px;margin-bottom: 30px;">		  
		  <div class="row mt-4">
			  <div class="col-md-3 mt-2">
				  <div class="card">
					  <div class="card-body text-center">
						  <img style="width: 30%" src="img/rayban.png" alt="Rayban">
					  </div>
				  </div>
			  </div>
			  <div class="col-md-3 mt-2">
				  <div class="card">
					  <div class="card-body text-center">
						  <img src="img/rusty.png" style="width: 45%" alt="Rusty">
					  </div>
				  </div>
			  </div>
			  <div class="col-md-3 mt-2">
				  <div class="card">
					  <div class="card-body text-center">
						  <img src="img/pierre.png" style="width: 53%" alt="Pierre Cardin">
					  </div>
				  </div>
			  </div>
			  <div class="col-md-3 mt-2">
				  <div class="card">
					  <div class="card-body text-center">
						  <img src="img/vulk.png" style="width: 30%" alt="Vulk">
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </section>  
  
<section id="categories" class="py-5">
    <div class="container">
        <h2 class="text-center" style="font-family: 'Raleway', sans-serif">Gafas para todos y cada necesidad.</h2>
		<h4 class="text-center">Nuestras categorías destacadas.</h4>
        <div class="row">
            <div class="col-lg-4 mt-2">
				<div class="card">
					<img src="img/desol.avif" alt="Lentes de sol" class="img-fluid">					
					<div class="card-footer">
						<h5 style="font-family: 'Raleway', sans-serif" class="text-center">LENTES DE SOL</h5>					
					</div>
				</div>
				
            </div>
            <div class="col-lg-4 mt-2">
				<div class="card">
					<img src="img/blancos.avif" alt="Lentes blancos" class="img-fluid">
					<div class="card-footer">
						<h5 style="font-family: 'Raleway', sans-serif" class="text-center">LENTES BLANCOS</h5>					
					</div>             
				</div>
            </div>
            <div class="col-lg-4 mt-2">
				<div class="card">
					<img src="img/clipon.avif" alt="Lentes clip-on" class="img-fluid">
					<div class="card-footer">
						<h5 style="font-family: 'Raleway', sans-serif" class="text-center">LENTES CLIP-ON</h5>					
					</div>                
				</div>
            </div>
        </div>
    </div>
</section>

    <section style="background: white;">
	  <div class="container-fluid" style="margin-top: 20px;">
		  <h2 class="text-center" style="font-family: 'Raleway', sans-serif">Nuevos Productos</h2> 
		  <h4 class="text-center">En <strong>Visión y Estilo</strong> actualizamos diaramente nuestro stock de productos.</h4>       
		  
		  <div class="row mt-4" style="margin-left: 2vh; margin-right: 2vh">            
			  @foreach($productos as $product)
			  <div class="col-md-3 mt-2">
				  <div class="card swiper-overflow-container position-relative" style="border:none;">
					@if($product->descuento_porcentaje != 0)<small class="badge badge-dark badge-sm position-absolute" style="font-size: 15px; top: 0; right: 0;z-index: 999;">{{$product->descuento_porcentaje}}% OFF</small> @endif
					<div class="swiper-container s2">
						<div class="swiper-wrapper">
							@if($product->img1)
							<div class="swiper-slide">
								<img src="{{ url('img-products/'.$product->img1.' ') }}"
								{{-- <img src="/img-products/{{$product->img1}}" --}}
									@if($product->tipo_fondo != null) 
										@if($product->tipo_fondo == 1) 
											style="width:100%;height: 34vh;" 
										@endif
										@if($product->tipo_fondo == 2) 
											style="width:100%;height: 34vh; filter: brightness(1.1)" 
										@endif
										@if($product->tipo_fondo == 3) 
											style="width:100%;height: 34vh; filter: brightness(1.2)" 
										@endif
										@if($product->tipo_fondo == 4) 
											style="width:100%;height: 34vh; filter: contrast(98%) brightness(1.15) saturate(0.1);" 
										@endif
									@endif
									@if($product->tipo_fondo == null) 
										style="width:100%;height: 34vh;" 
									@endif	
									>	
								</div>
								@endif
							@if($product->img2)
							<div class="swiper-slide">
								<img src="{{ url('img-products/'.$product->img2.' ') }}"
								@if($product->tipo_fondo != null) 
										@if($product->tipo_fondo == 1) 
											style="width:100%;height: 34vh;" 
										@endif
										@if($product->tipo_fondo == 2) 
											style="width:100%;height: 34vh; filter: brightness(1.1)" 
										@endif
										@if($product->tipo_fondo == 3) 
											style="width:100%;height: 34vh; filter: brightness(1.2)" 
										@endif
										@if($product->tipo_fondo == 4) 
											style="width:100%;height: 34vh; filter: contrast(98%) brightness(1.15) saturate(0.1);" 
										@endif
									@endif
									@if($product->tipo_fondo == null) 
										style="width:100%;height: 34vh;" 
									@endif	
								>
							</div>	
							@endif
							@if($product->img3)
							<div class="swiper-slide">
								<img src="{{ url('img-products/'.$product->img3.' ') }}"
								@if($product->tipo_fondo != null) 
										@if($product->tipo_fondo == 1) 
											style="width:100%;height: 34vh;" 
										@endif
										@if($product->tipo_fondo == 2) 
											style="width:100%;height: 34vh; filter: brightness(1.1)" 
										@endif
										@if($product->tipo_fondo == 3) 
											style="width:100%;height: 34vh; filter: brightness(1.2)" 
										@endif
										@if($product->tipo_fondo == 4) 
											style="width:100%;height: 34vh; filter: contrast(98%) brightness(1.15) saturate(0.1);" 
										@endif
									@endif
									@if($product->tipo_fondo == null) 
										style="width:100%;height: 34vh;" 
									@endif	
								>
							</div>									
							@endif
							@if($product->img4)
							<div class="swiper-slide">
								<img src="{{ url('img-products/'.$product->img4.' ') }}"
									@if($product->tipo_fondo != null) 
										@if($product->tipo_fondo == 1) 
											style="width:100%;height: 34vh;" 
										@endif
										@if($product->tipo_fondo == 2) 
											style="width:100%;height: 34vh; filter: brightness(1.1)" 
										@endif
										@if($product->tipo_fondo == 3) 
											style="width:100%;height: 34vh; filter: brightness(1.2)" 
										@endif
										@if($product->tipo_fondo == 4) 
											style="width:100%;height: 34vh; filter: contrast(98%) brightness(1.15) saturate(0.1);" 
										@endif
									@endif
									@if($product->tipo_fondo == null) 
										style="width:100%;height: 34vh;" 
									@endif	
								>
							</div>										
							@endif
									  						 
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination2"></div>						
					  </div>  					
					
					<div class="card-body text-center">					
					<p class="text-product-title"><a style="color: #676767;" href="/producto?product_id={{$product->id}}">{{$product->nombre}}</a> </p>
					<p class="text-product-price">
					
					@if($product->descuento_porcentaje != 0)					
					<?php $porcentaje = 0; $monto = 0;
					$porcentaje = $product->monto*$product->descuento_porcentaje; 
					$porcentaje = $porcentaje / 100;
					$monto = $product->monto - $porcentaje; 											
					?>
					<span style="color: #bebebe; font-size: 12px;"><s>${{$product->monto * $product->tipo_cambio->valor}}</s></span>
					<span class="text-product-price">${{ round($monto * $product->tipo_cambio->valor) }}<span>		
					@else
					<span class="text-product-price">${{ round($product->monto * $product->tipo_cambio->valor) }}<span>					
					@endif
					</p>
					</div>
					
				  </div>
			  </div>
			  @endforeach						
		  </div>				  
	  </div>
	  
  </section>

@endsection