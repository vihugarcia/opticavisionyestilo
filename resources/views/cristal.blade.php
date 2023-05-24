@extends('layouts.app')

@section('content')


<?php
    if(session()->has('fin')){        
?>

  <script>
                swal("Compra completada, desea agregar más productos o finalizarla?", {
                        icon: 'success',
                        buttons: {                          
                          seguir: {
                            text: "Seguir comprando",
                            value: "seguir",
                          },
                          catch: {
                            text: "Finalizar compra",
                            value: "finalizar",
                          },                         
                        },
                      })
               .then((value) => {
                      switch (value) {  
                        case "seguir":
                        window.location.href = '/productos';
                         break;                                                                 
                        case "finalizar":
                        window.location.href = '/pedido';
                         break;                                           
                      }
                });
              
        </script>
         <?php session()->forget('fin'); ?>        
  <?php } ?>


<div class="container">
    <nav aria-label="breadcrumb" class="mt-3 mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Lentes</a></li>
          <li class="breadcrumb-item"><a href="#">Armazones</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cristal</li>
        </ol>
      </nav>
<div class="row" style="font-family: 'Titillium Web', sans-serif">
    <div class=col-md-6>
      <div class="swiper-overflow-container">
      <div class="swiper-container s3">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img style="width:50%; height: 30vh" src="/img/lente.webp"></div>                                         
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
          <h3 class="text-product-price" style="margin-bottom: -5px;">${{$cristal->tipo_cristal->monto}}</h3>				
        <br>       
        <h4 class="text-product-title mt-2" style="color: #676767">{{$cristal->tipo_cristal->nombre}}</h4>
        <h6 class="text-product-description mt-3">{{$cristal->tipo_cristal->descripcion}}</h6>
        <!--
        <h6 class="text-product-description mt-3">Recomendamos utilizar <a href="#">Pantalón Costumbre</a> o <a href="#">Pollera Gris</a> para completar el look.</h6>
        <h6 class="text-product-description mt-3">Contamos con la remera <a href="#">Remerón TUPAC</a>, que es del mismo estilo.</h6>        
        
        <h6 class="text-product-description mt-3 mb-3"><a href="#">VER TABLA DE TALLES</a></h6>
        -->
        <form action="/alcarrocristal" method="POST"> 
          <input type="hidden" value="{{$cristal->id}}" name="cristal_id">                  
          <input type="hidden" name="_token" value="{{ csrf_token() }}">                           
          <input id="btn-add" type="submit" class="btn btn-secondary mt-3" value="AGREGAR AL CARRITO">
        </form>
        
        </div>     
           
    </div>
</div>

<div class="row" style="font-family: 'Titillium Web', sans-serif">
    <div class="col-md-12 text-center">
        <h5 class="mt-5">Información de producto</h5>
        <table class="table table-stripped">
            <tbody>
                <tr>
                    <th>Nombre </th>
                      <td> {{$cristal->tipo_cristal->nombre}}</td>                   
                  </tr>
                <tr>                                    
            </tbody>
        </table>
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
    <img style="width: 100%; height: 100%" src="img-products/{{$cristal->img1}}" />
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