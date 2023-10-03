@extends('layouts.app')

@section('content')
<?php
Use App\Carrito;
Use App\Models\Receta; 
?>

@isset($_GET['receta_id'])
  @php 
    $receta = Receta::find($_GET['receta_id']) ; 

  @endphp
@endisset
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
    @if(isset($primero))
      @if($primero)
       <h2 class="text-center text-secondary">Por favor, elija su primer par de anteojos para ver de <strong>lejos</strong></h2>
       @else      
       <h2 class="text-center text-secondary">Por favor, elija su segundo par de anteojos para ver de <strong>cerca</strong></h2>
      @endif
    @endif
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
                      <div class="swiper-slide"><img 	@if($product->tipo_fondo != null) 
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
                      src="/img-products/{{$product->img1}}"></div>
                      @endif
                      @if($product->img2)
                      <div class="swiper-slide"><img 	@if($product->tipo_fondo != null) 
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
                       src="/img-products/{{$product->img2}}"></div>	
                      @endif
                      @if($product->img3)
                      <div class="swiper-slide"><img 	@if($product->tipo_fondo != null) 
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
                       src="/img-products/{{$product->img3}}"></div>									
                      @endif
                      @if($product->img4)
                      <div class="swiper-slide"><img 	@if($product->tipo_fondo != null) 
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
                       src="/img-products/{{$product->img4}}"></div>										
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
              @if(isset($receta->forma))
            @if($receta->forma->nombre == "Ovalada")
              @if($product->forma_armazon->nombre == "Cuadrado" || $product->forma_armazon->nombre == "Rectangular" || $product->forma_armazon->nombre == "Aviador")
              <span style="font-size: 12px;" class="text text-success mt-2">Recomendado para tu forma de cara <b><i class="fa fa-check" aria-hidden="true"></b></i>  
              @else
              <span style="font-size: 13px;" class="mt-2 text text-white">2 </span>                        
              @endif
            @endif
            @if($receta->forma->nombre == "Redonda")
              @if($product->forma_armazon->nombre == "Cuadrado" || $product->forma_armazon->nombre == "Rectangular")
              <span style="font-size: 12px;" class="text text-success mt-2">Recomendado para tu forma de cara <b><i class="fa fa-check" aria-hidden="true"></b></i>
                @else
                <span style="font-size: 13px;" class="mt-2 text text-white">2 </span>                                    
                @endif
            @endif
            @if($receta->forma->nombre == "Cuadrada")
              @if($product->forma_armazon->nombre == "Redondo" || $product->forma_armazon->nombre == "Ovalado" || $product->forma_armazon->nombre == "Cat Eye")
              <span style="font-size: 12px;" class="text text-success mt-2">Recomendado para tu forma de cara <b><i class="fa fa-check" aria-hidden="true"></b></i>                                      
              @else
              <span style="font-size: 13px;" class="mt-2 text text-white">2 </span>                                      
              @endif
            @endif
            @if($receta->forma->nombre == "Diamante")
              @if($product->forma_armazon->nombre == "Redondo" || $product->forma_armazon->nombre == "Rectangular" || $product->forma_armazon->nombre == "Cat Eye")
              <span style="font-size: 12px;" class="text text-success mt-2">Recomendado para tu forma de cara <b><i class="fa fa-check" aria-hidden="true"></b></i>
                @else
                <span style="font-size: 13px;" class="mt-2 text text-white">2 </span>                                  
                @endif
            @endif
            @if($receta->forma->nombre == "Corazon")
              @if($product->forma_armazon->nombre == "Rectangular")
              <span style="font-size: 12px;" class="text text-success mt-2">Recomendado para tu forma de cara <b><i class="fa fa-check" aria-hidden="true"></b></i>
                @else
                <span style="font-size: 13px;" class="mt-2 text text-white">2 </span>                                     
                @endif
            @endif
            @endif
          @endisset
              </div>
              <div class="card card-footer">
                <a  @isset($receta) @isset($_GET['degresivos']) href="/producto?product_id={{$product->id}}&receta_id={{$receta->id}}&degresivos=si" @else href="/producto?product_id={{$product->id}}&receta_id={{$receta->id}}" @endisset @else href="/producto?product_id={{$product->id}}" @endisset>Ver producto</a>
              </div>
              
            </div>
        </div>
        @endforeach			
    
    </div>
   
</div>

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  @php 
    if(!isset($solocerca)){
      $solocerca = false;
    }

    if(!isset($multifocales)){
      $multifocales = false; 
    }

    if(!isset($desolmultifocales)){
      $desolmultifocales = false; 
    }
    
    $sololejos = false; 
    
  @endphp

  
  @if(!isset($degresivos) && !isset($primero) && !$multifocales)
    @if(isset($receta))

<script>

    jQuery(document).ready(function(){
        const id = "<?php echo $receta->id ?>";
        const distancia_id = "<?php echo $receta->distancia_apto_id ?>";
        const solo_cerca = "<?php echo $solocerca ?>";                
      
          swal("¿Quieres lentes de sol, blancos o clips on?", {
          closeOnEsc: false,
          closeOnClickOutside: false,
          buttons: {
            cancel: "Blancos",
            catch: {
              text: "De Sol",
              value: "catch",
            }, 
            clipOn: {          
            text: "ClipOn",
              value: "clipOn",
          },         
        }
      })        
        .then((value) => {
          switch (value) {                        

            case "clipOn":
              window.location.href = "https://web.visionyestilo.com.ar/verproductorecetado?receta_id="+id+"&tipo_lente=clipOn";
              break;
        
            case "catch":
              window.location.href = "https://web.visionyestilo.com.ar/verproductorecetado?receta_id="+id+"&tipo_lente=desol";
              break;                 

            default:
              if(distancia_id == 2 || solo_cerca == true){
                swal("¿Buscas lentes monofocales o degresivos?", {

               closeOnEsc: false,
          closeOnClickOutside: false,
              buttons: {
                cancel: "Monofocales",
                catch: {
                  text: "Degresivos",
                  value: "catch",
                },                
            }
          })        
            .then((value) => {
              switch (value) {       
                case "catch":
                  if(solo_cerca)
                    window.location.href = "https://web.visionyestilo.com.ar/verproductorecetado?receta_id="+id+"&degresivos=si&distancia=cerca";
                  else
                    window.location.href = "https://web.visionyestilo.com.ar/verproductorecetado?receta_id="+id+"&degresivos=si";
                  break;                                                 
              }
            });
          }
          if(distancia_id == 3 && solo_cerca == false){
            swal("sólo lejos, sólo cerca o multifocales?", {
              closeOnEsc: false,
              closeOnClickOutside: false,             
              buttons: {
                cancel: "Sólo lejos",
                catch: {
                  text: "Sólo cerca",
                  value: "catch",
                },                
              multifocales: {          
                 text: "Multifocales",
                 value: "multifocales",
              },                        
            }
          })        
            .then((value) => {
              switch (value) {       
                case "catch":
                  window.location.href = "https://web.visionyestilo.com.ar/verproductorecetado?receta_id="+id+"&distancia=cerca";
                  break;  
             
                case "multifocales":
                  window.location.href = "https://web.visionyestilo.com.ar/verproductorecetado?receta_id="+id+"&distancia=multifocales";
                  break; 
              }
            });
          }
          }
        });
      });
    
  </script>

<style>
  .swal-modal{
    width:600px !important;
}
</style>
@endif
@endif
@endsection