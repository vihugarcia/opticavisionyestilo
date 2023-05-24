@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb" class="mt-3 mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Lentes</a></li>
          <li class="breadcrumb-item"><a href="#">Sol</a></li>
          <li class="breadcrumb-item active" aria-current="page">Negros</li>
        </ol>
      </nav>
<div class="row" style="font-family: 'Titillium Web', sans-serif">
    <div class=col-md-6>
      <div class="swiper-overflow-container">
      <div class="swiper-container s3">
        <div class="swiper-wrapper">
          @if($producto->img1)
          
          <div class="swiper-slide"><a role="button" data-toggle="modal" data-target="#modal-zoom-img1"><img style="width: 100%" src="img-products/{{$producto->img1}}"/></a></div>
          
          @endif
          @if($producto->img2)
          <div class="swiper-slide"><img style="width: 100%" src="img-products/{{$producto->img2}}"></div>
          @endif
          @if($producto->img3)
          <div class="swiper-slide"><img style="width: 100%" src="img-products/{{$producto->img3}}"></div>
          @endif
          @if($producto->img4)
          <div class="swiper-slide"><img style="width: 100%" src="img-products/{{$producto->img4}}"></div>
          @endif         
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next" style="color: black;"></div>
        <div class="swiper-button-prev" style="color: black;"></div>
      </div>   
      </div>   
    </div>
    <div class="col-md-6 mt-2">
        <div class="text-center">
          @if($producto->descuento_porcentaje != 0)					
					<?php $porcentaje = 0; $price = 0;
					$porcentaje = $producto->monto*$producto->descuento_porcentaje; 
					$porcentaje = $porcentaje / 100;
					$price = $producto->monto - $porcentaje; 											
					?>
					<span style="color: #bebebe; font-size: 12px;"><s>${{$producto->monto * $producto->tipo_cambio->valor}}</s></span>
					<span class="text-product-price">${{$price * $producto->tipo_cambio->valor}}<span>		
					@else
          <h3 class="text-product-price" style="margin-bottom: -5px;">${{$producto->monto * $producto->tipo_cambio->valor}}</h3>
					@endif
        <br>
        @if($producto->descuento_porcentaje)
        <small style="color: #bebebe;">Producto con {{$producto->descuento_porcentaje}}% de descuento</small>
        @endif
        <h4 class="text-product-title mt-2" style="color: #676767">{{$producto->nombre}}</h4>
        <h6 class="text-product-description mt-3">{{$producto->descripcion}}</h6>
        <!--
        <h6 class="text-product-description mt-3">Recomendamos utilizar <a href="#">Pantalón Costumbre</a> o <a href="#">Pollera Gris</a> para completar el look.</h6>
        <h6 class="text-product-description mt-3">Contamos con la remera <a href="#">Remerón TUPAC</a>, que es del mismo estilo.</h6>        
        
        <h6 class="text-product-description mt-3 mb-3"><a href="#">VER TABLA DE TALLES</a></h6>
        -->
        <div class="row" style="font-family: 'Titillium Web', sans-serif">
          <div class="col-md-12 text-center">           
              <table class="table table-stripped mt-3">
                  <tbody>
                      <tr>
                          <th>Nombre</th>
                            <td> {{$producto->nombre}}</td>                   
                        </tr>
                      <tr>
                        <th>Color</th>
                          <td>{{$producto->color->nombre}}</td>                   
                      </tr>
                      <tr>
                        <th>Largo Patillas</th>
                          <td>
                              <span> {{$producto->largo_patillas}}mm.</span>                      
                          </td>                      
                      </tr>
                      <tr>
                        <th>Material</th>
                          <td>
                              <span> {{$producto->material->nombre}}</span>                      
                          </td>                      
                      </tr>
                      <tr>
                          <th>Forma</th>
                            <td>                        
                                <span> {{$producto->forma_armazon->nombre}}</span>
                            </td>                                       
                        </tr>
                  </tbody>
              </table>
          </div>
      </div>
        @isset($receta)
        <form action="/alcarro" method="POST"> 
          <input type="hidden" value="{{$producto->id}}" name="product_id">           
          <input type="hidden" value="{{$receta->id}}" name="receta_id">       
          @isset($_GET['tipo_lente'])
            <input type="hidden" value="{{$_GET['tipo_lente']}}" name="tipo_lente">       
          @endisset      
          @isset($_GET['distancia'])
            <input type="hidden" value="{{$_GET['distancia']}}" name="distancia">       
          @endisset      
          @isset($_GET['degresivos'])
            <input type="hidden" value="{{$_GET['degresivos']}}" name="degresivos">       
          @endisset       
          <input type="hidden" name="_token" value="{{ csrf_token() }}">                           
          <input id="btn-add" type="submit" class="btn btn-secondary mt-3" value="AGREGAR AL CARRITO">
        </form>
        @else
        <div class="alert alert-danger mt-2" style="font-size:12px">No puedes comprar sin receta</div>
        <form> 
          <input type="hidden" value="{{$producto->id}}" name="product_id">                                    
          <input type="hidden" name="_token" value="{{ csrf_token() }}">                           
          <input id="btn-add" type="submit" class="btn btn-secondary mt-3" value="AGREGAR AL CARRITO" disabled>
        </form>
       
        @endisset

        
        </div>     
           
    </div>
</div>


</div>


<div id="modal-zoom-img1" class="modal fade" role="dialog">
  <div class="modal-dialog" style="top: 15%">            
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header bg-dark">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="modal_button">&times;</span><span class="sr-only">Close</span></button>			
    </div>
    <div class="modal-body bg-dark">        
    <img style="width: 100%; height: 100%" src="img-products/{{$producto->img1}}" />
    </div>
    
    
    </div>
  
  </div>
  </div>


<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>

<script>

jQuery(document).ready(function(){
  $('#select-talle').on('change', function(){
    if($('#select-talle').val() != 0 && $('#select-color').val() != 0){
        $('#btn-add').prop("disabled",false);
    }else{
      $('#btn-add').prop("disabled",true);
    }
  });
  $('#select-color').on('change', function(){
    if($('#select-talle').val() != 0 && $('#select-color').val() != 0){
        $('#btn-add').prop("disabled",false);
    }else{
      $('#btn-add').prop("disabled",true);
    }
  });
  
});
  </script>


@endsection