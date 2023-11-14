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
  </style>
  <!-- Swiper -->
  <section style="padding: 2px 2px 2px 2px;margin: 20px;">	
	<div class="swiper-overflow-container">
		<div class="swiper-container s1">
			<div class="swiper-wrapper">	
			<div class="swiper-slide"><img style="width: 100%" src="img/slider-inicio/slider1.webp"></div>
			<div class="swiper-slide"><img style="width: 100%" src="img/slider-inicio/slide2.jpg"></div>
			</div>
			<!-- Add Pagination -->			
		</div>
	</div>
  </section>
  
  <section>
	  <div class="container" style="margin-top: 20px;">
		  <h2 class="text-center text-secondary" style="margin-bottom: 20px;font-family: 'lato', sans-serif;">Categorias</h2>

          <div class="cat-blocks-container">
            <div class="row justify-content-around">
               <div class="col-6 col-sm-4 col-lg-2">
                  <a class="cat-block">
                     <figure><span><img src="assets/images/optica/categorias/lentesBlancos.png" alt="Lentes Recetados"></span></figure>
                     <h3 class="cat-block-title">Lentes Recetados</h3>
                  </a>
               </div>
               <div class="col-6 col-sm-4 col-lg-2">
                  <a class="cat-block">
                     <figure><span><img src="assets/images/optica/categorias/lentesSol.png" alt="Lentes Recetados"></span></figure>
                     <h3 class="cat-block-title">Lentes de Sol</h3>
                  </a>
               </div>
               <div class="col-6 col-sm-4 col-lg-2">
                  <a class="cat-block">
                     <figure><span><img src="assets/images/optica/categorias/clipOn.png" alt="Clip On"></span></figure>
                     <h3 class="cat-block-title">Clip On</h3>
                  </a>
               </div>
               <div class="col-6 col-sm-4 col-lg-2">
                  <a class="cat-block">
                     <figure><span><img src="assets/images/optica/categorias/accesorios.png" alt="Accesorios"></span></figure>
                     <h3 class="cat-block-title">Accesorios</h3>
                  </a>
               </div>
            </div>
         </div>		  		
	  </div>
  </section>

    <section>
	  <div class="container" style="margin-top: 20px;">
		  <h2 class="text-center text-secondary" style="margin-bottom: 20px;font-family: 'lato', sans-serif;">Nuevos Productos</h2>        
		  
		  <div class="row mt-4">            
			  @foreach($productos as $product)
			  <div class="col-md-3 mt-2">
				  <div class="card swiper-overflow-container">
					
					<div class="swiper-container s2">
						<div class="swiper-wrapper">
							@if($product->img1)
							<div class="swiper-slide">
								<img src="/img-products/{{$product->img1}}"
									@if($product->tipo_fondo != null) 
										@if($product->tipo_fondo == 1) 
											style="width:100%;height: 30vh;" 
										@endif
										@if($product->tipo_fondo == 2) 
											style="width:100%;height: 30vh; filter: brightness(1.1)" 
										@endif
										@if($product->tipo_fondo == 3) 
											style="width:100%;height: 30vh; filter: brightness(1.2)" 
										@endif
										@if($product->tipo_fondo == 4) 
											style="width:100%;height: 30vh; filter: contrast(98%) brightness(1.15) saturate(0.1);" 
										@endif
									@endif
									@if($product->tipo_fondo == null) 
										style="width:100%;height: 30vh;" 
									@endif	
									>	
								</div>
								@endif
							@if($product->img2)
							<div class="swiper-slide"><img src="/img-products/{{$product->img2}}"
								@if($product->tipo_fondo != null) 
										@if($product->tipo_fondo == 1) 
											style="width:100%;height: 30vh;" 
										@endif
										@if($product->tipo_fondo == 2) 
											style="width:100%;height: 30vh; filter: brightness(1.1)" 
										@endif
										@if($product->tipo_fondo == 3) 
											style="width:100%;height: 30vh; filter: brightness(1.2)" 
										@endif
										@if($product->tipo_fondo == 4) 
											style="width:100%;height: 30vh; filter: contrast(98%) brightness(1.15) saturate(0.1);" 
										@endif
									@endif
									@if($product->tipo_fondo == null) 
										style="width:100%;height: 30vh;" 
									@endif	
								>
							</div>	
							@endif
							@if($product->img3)
							<div class="swiper-slide"><img src="/img-products/{{$product->img3}}"
								@if($product->tipo_fondo != null) 
										@if($product->tipo_fondo == 1) 
											style="width:100%;height: 30vh;" 
										@endif
										@if($product->tipo_fondo == 2) 
											style="width:100%;height: 30vh; filter: brightness(1.1)" 
										@endif
										@if($product->tipo_fondo == 3) 
											style="width:100%;height: 30vh; filter: brightness(1.2)" 
										@endif
										@if($product->tipo_fondo == 4) 
											style="width:100%;height: 30vh; filter: contrast(98%) brightness(1.15) saturate(0.1);" 
										@endif
									@endif
									@if($product->tipo_fondo == null) 
										style="width:100%;height: 30vh;" 
									@endif	
								>
							</div>									
							@endif
							@if($product->img4)
							<div class="swiper-slide"><img src="/img-products/{{$product->img4}}"
									@if($product->tipo_fondo != null) 
										@if($product->tipo_fondo == 1) 
											style="width:100%;height: 30vh;" 
										@endif
										@if($product->tipo_fondo == 2) 
											style="width:100%;height: 30vh; filter: brightness(1.1)" 
										@endif
										@if($product->tipo_fondo == 3) 
											style="width:100%;height: 30vh; filter: brightness(1.2)" 
										@endif
										@if($product->tipo_fondo == 4) 
											style="width:100%;height: 30vh; filter: contrast(98%) brightness(1.15) saturate(0.1);" 
										@endif
									@endif
									@if($product->tipo_fondo == null) 
										style="width:100%;height: 30vh;" 
									@endif	
								>
							</div>										
							@endif
									  						 
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination2"></div>						
					  </div>  					
					<div class="card-body text-center">					
					<p class="text-product-title"><a style="color: #676767;" href="/producto?product_id={{$product->id}}">{{$product->nombre}}</a> @if($product->descuento_porcentaje != 0)<small class="badge badge-dark badge-sm">{{$product->descuento_porcentaje}}% OFF</small> @endif</p>
					<p class="text-product-price">
					
					@if($product->descuento_porcentaje != 0)					
					<?php $porcentaje = 0; $monto = 0;
					$porcentaje = $product->monto*$product->descuento_porcentaje; 
					$porcentaje = $porcentaje / 100;
					$monto = $product->monto - $porcentaje; 											
					?>
					<span style="color: #bebebe; font-size: 12px;"><s>${{$product->monto * $product->tipo_cambio->valor}}</s></span>
					<span class="text-product-price">${{$monto * $product->tipo_cambio->valor}}<span>		
					@else
					<span class="text-product-price">${{$product->monto * $product->tipo_cambio->valor}}<span>					
					@endif
					</p>
					</div>
					
				  </div>
			  </div>
			  @endforeach						
		  </div>		
		  <p class="mt-5 text-center"><a href="/productos" class="mt-3 text-center text-secondary">Ver todos</a>  </p>
	  </div>
	  
  </section>

@endsection