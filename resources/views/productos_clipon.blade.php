@extends('layouts.app')

@section('content')
<?php
Use App\Carrito; 
?>
@if(session()->has('carrito'))
        <?php         
            $carrito = session()->get('carrito'); 
			if(!$carrito->products){
				session()->forget('carrito');
			}
		 ?> 
@endif
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

<div class="container" style="margin-top: 20px;">    
    <!--<p class="text-center text-secondary">A continuación le presentamos todos los productos que va a poder encontrar en la tienda de "Le Femme Grand Crew". Ante cualquier consulta no dude presionar el icono de whatsapp.</p>-->
    <div class="row mt-4">
        {{-- <div class="col-md-3">
            <p><b>PRECIO</b></p>
            <p><input placeholder="$500" style="width: 90px;display: inline" class="form-control" type="number"/> Hasta <input placeholder="$50000" style="width: 90px;display: inline" class="form-control" type="number" /></p>

            <p><b>TIPO DE PRODUCTO</b></p>
            <p><a href="#"> - Sol (35)</a></p>

            <p><b>MARCA</b></p>
            <p><a href="#"> - Nyol (35)</a></p>
            <p><a href="#"> - Ralph (35)</a></p>
            <p><a href="#"> - Reef (35)</a></p>
            <p><a href="#"> - Rusty (35)</a></p>
            <p><a href="#"> - Vulk (35)</a></p>

            <p><b>MATERIAL</b></p>
            <p><a href="#"> - Acetato (35)</a></p>
            <p><a href="#"> - Metal (35)</a></p>
            <p><a href="#"> - Acetato Biodegradable (35)</a></p>
            
            <p><b>GENERO</b></p>
            <p><a href="#"> - Hombre (35)</a></p>
            <p><a href="#"> - Mujer (35)</a></p>
            <p><a href="#"> - Unisex (35)</a></p>

        </div>--}}
        @foreach($productos as $product)
        <div class="col-md-3 mt-2">
          
            <div class="card swiper-overflow-container">                            
              <div class="swiper-container s2">                
                  <div class="swiper-wrapper">
                      @if($product->img1)
                      <div class="swiper-slide"><img style="width:100%; height: 30vh" src="/img-products/{{$product->img1}}"></div>
                      @endif
                      @if($product->img2)
                      <div class="swiper-slide"><img style="width:100%; height: 30vh" src="/img-products/{{$product->img2}}"></div>	
                      @endif
                      @if($product->img3)
                      <div class="swiper-slide"><img style="width:100%; height: 30vh" src="/img-products/{{$product->img3}}"></div>									
                      @endif
                      @if($product->img4)
                      <div class="swiper-slide"><img style="width:100%; height: 30vh" src="/img-products/{{$product->img4}}"></div>										
                      @endif
                      
                  </div>
                  <!-- Add Pagination -->
                  
                </div>  					
              <div class="card-body text-center">		
                		
              <p class="text-product-title"><a style="color: #676767;" @isset($receta) href="/producto?product_id={{$product->id}}&receta_id={{$receta->id}}" @else href="/producto?product_id={{$product->id}}"  @endisset >{{$product->nombre}}</a> @if($product->descuento_porcentaje != 0)<small class="badge badge-dark badge-sm">{{$product->descuento_porcentaje}}% OFF</small> @endif</p>
              <p class="text-product-price">
              
              @if($product->descuento_porcentaje != 0)					
                <?php $porcentaje = 0; $price = 0;
                $porcentaje = $product->monto*$product->descuento_porcentaje; 
                $porcentaje = $porcentaje / 100;
                $price = $product->monto - $porcentaje; 											
                ?>
                <span style="color: #bebebe; font-size: 12px;"><s>${{$product->monto * $product->tipo_cambio->valor}}</s></span>
                <span class="text-product-price">${{$price * $product->tipo_cambio->valor}}<span>		
                @else
                <span class="text-product-price">${{$product->monto * $product->tipo_cambio->valor}}<span>					
              @endif              
              </p>
              @isset($receta) 
                @if($receta->forma->nombre == "Ovalada")
                  @if($product->forma_armazon->nombre == "Cuadrado" || $product->forma_armazon->nombre == "Rectangular" || $product->forma_armazon->nombre == "Aviador")
                    <span style="font-size: 13px;" class="badge badge-primary mt-2">Recomendado para tu forma de cara</span>	
                  @endif
                @endif
                @if($receta->forma->nombre == "Redonda")
                  @if($product->forma_armazon->nombre == "Cuadrado" || $product->forma_armazon->nombre == "Rectangular")
                    <span style="font-size: 13px;" class="badge badge-primary mt-2">Recomendado para tu forma de cara</span>	
                  @endif
                @endif
                @if($receta->forma->nombre == "Cuadrada")
                  @if($product->forma_armazon->nombre == "Redondo" || $product->forma_armazon->nombre == "Ovalado" || $product->forma_armazon->nombre == "Cat Eye")
                    <span style="font-size: 13px;" class="badge badge-primary mt-2">Recomendado para tu forma de cara</span>	
                  @endif
                @endif
                @if($receta->forma->nombre == "Diamante")
                  @if($product->forma_armazon->nombre == "Redondo" || $product->forma_armazon->nombre == "Rectangular" || $product->forma_armazon->nombre == "Cat Eye")
                    <span style="font-size: 13px;" class="badge badge-primary mt-2">Recomendado para tu forma de cara</span>	
                  @endif
                @endif
                @if($receta->forma->nombre == "Corazon")
                  @if($product->forma_armazon->nombre == "Rectangular")
                    <span style="font-size: 13px;" class="badge badge-primary mt-2">Recomendado para tu forma de cara</span>	
                  @endif
                @endif
              @endisset
              </div>
              <div class="card card-footer">
                <a  @isset($receta) href="/producto?product_id={{$product->id}}&receta_id={{$receta->id}}" @else href="/producto?product_id={{$product->id}}" @endisset>Ver producto</a>
              </div>
              
            </div>
        </div>
        @endforeach			
    
    </div>
   
</div>

    
@endsection