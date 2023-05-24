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
        
@if(Auth::user())

<div class="container mt-3">
    <div class="card">
        <div class="card-header text-center bg-white" style="padding: 20px;">
                <h4>CONFIRMACIÓN DE PEDIDO</h4>                
        </div>
        <div class="card-body">
        <nav aria-label="breadcrumb" class="mt-3 mb-3" style="font-size: 13px;">
            <ol class="breadcrumb" style="padding: 10px;">
              <li class="breadcrumb-item" style="font-weight: bold;"><a href="#">Carrito</a></li>
              <li class="breadcrumb-item" ><a href="#">Detalles de Pago</a></li>
              <li class="breadcrumb-item">Pendiente de pago <i style="margin-top: 4px;margin-left: 5px;color: #7d7d7d;" class="fa fa-check-circle"></i></li>
            </ol>
          </nav>
          <div class="row">
              <div class="col-md-8">
                    <h3 class="badge badge-secondary badge-m">Armazones</h3>
                    <table class="table">                      
                        <thead>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>     
                            <?php $total = 0; ?>                       
                            @foreach(array_unique($carrito->products) as $product)
                                @if($product->tipo_producto == 'Armazon')
                                    <tr>
                                    <td>
                                        <div class="row">
                                        <div class="col-2">
                                            <img height="30px" style="border-radius: 5px;" src="img-products/{{$product->img1}}">
                                        </div>
                                        <div class="col-10">
                                        <h6 class="text-product-title" style="color: rgb(73, 73, 73);font-size: 16px;">{{$product->nombre}}</h5>                                                           
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($product->descuento_porcentaje != 0)					
                                        <?php $porcentaje = 0; $price = 0;
                                        $porcentaje = $product->monto*$product->descuento_porcentaje; 
                                        $porcentaje = $porcentaje / 100;
                                        $price = $product->monto - $porcentaje; 											
                                        ?>
                                        <span style="color: #bebebe; font-size: 12px;"><s>${{$product->monto * $product->tipo_cambio->valor}}</s></span>                                
                                        <span class="text-product-price" style="font-size: 16px;">${{$price * $product->tipo_cambio->valor}}<span>		
                                        @else
                                        <span class="text-product-price" style="font-size: 16px;">${{$product->monto * $product->tipo_cambio->valor}}</span>
                                        @endif
                                    </td>
                                    <td>             
                                        <?php $count = 0; ?>                  
                                        @foreach ($carrito->products as $product1)
                                            @if($product->nombre == $product1->nombre)
                                                <?php $count++; ?>                  
                                            @endif
                                        @endforeach
                                        <div class="row">                                                                                
                                            <p class="text-product-price" style="font-size: 17px;">x{{$count}}</p>                                             
                                        </div>                 
                                    </td>
                                    <td>
                                        @if($product->descuento_porcentaje != 0)					
                                                <?php $porcentaje = 0; $price = 0;
                                                $porcentaje = $product->monto*$product->descuento_porcentaje; 
                                                $porcentaje = $porcentaje / 100;
                                                $price = $product->monto - $porcentaje; 
                                                $total = $price * $count; 											
                                                ?>                                                             
                                        <span class="text-product-price" style="font-size: 17px;">${{$total * $product->tipo_cambio->valor}}<span>		
                                        @else
                                        <?php  $total = $product->monto * $count; ?>
                                        <span class="text-product-price" style="font-size: 17px;">${{$total * $product->tipo_cambio->valor}}</span>
                                        @endif
                                    </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    
                    <table class="table ">    
                        <h3 class="badge badge-secondary">Cristales</h3>                  
                        <thead>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>       
                            @if($carrito->cristales)                     
                            @foreach(array_unique($carrito->cristales) as $cristal)
                            <tr>
                            <td>
                                <div class="row">
                                <div class="col-2">
                                    <img height="30px" style="border-radius: 5px;" src="img/lente.webp">
                                </div>
                                <div class="col-10">
                                <h6 class="text-product-title" style="color: rgb(73, 73, 73);font-size: 16px;">{{$cristal->tipo_cristal->nombre}}</h5>                                                           
                                </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-product-price" style="font-size: 17px;">${{$cristal->tipo_cristal->monto * $cristal->tipo_cambio->valor}}</span>
                            </td>
                            <td>             
                                <?php $count = 0; ?>                  
                                @foreach ($carrito->cristales as $cristal1)
                                    @if($cristal->tipo_cristal->nombre == $cristal1->tipo_cristal->nombre )
                                        <?php $count++; ?>                  
                                    @endif
                                @endforeach
                                <div class="row">                                                                                
                                    <p class="text-product-price" style="font-size: 17px;">x{{$count}}</p>                                             
                                </div>                        
                            </td>
                            <td>                           
                                <?php $total = $cristal->tipo_cristal->monto * $count;  ?>
                                <span class="text-product-price" style="font-size: 17px;">${{$total * $cristal->tipo_cambio->valor}}</span>
                                
                            </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>


                    <h3 class="badge badge-secondary badge-m">Accesorios</h3>
                    <table class="table">                      
                        <thead>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>     
                            <?php $total = 0; ?>                       
                            @foreach(array_unique($carrito->products) as $product)
                                @if($product->tipo_producto == 'Accesorio')
                                    <tr>
                                    <td>
                                        <div class="row">
                                        <div class="col-2">
                                            <img height="30px" style="border-radius: 5px;" src="img-products/{{$product->img1}}">
                                        </div>
                                        <div class="col-10">
                                        <h6 class="text-product-title" style="color: rgb(73, 73, 73);font-size: 16px;">{{$product->nombre}}</h5>                                                           
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($product->descuento_porcentaje != 0)					
                                        <?php $porcentaje = 0; $price = 0;
                                        $porcentaje = $product->monto*$product->descuento_porcentaje; 
                                        $porcentaje = $porcentaje / 100;
                                        $price = $product->monto - $porcentaje; 											
                                        ?>
                                        <span style="color: #bebebe; font-size: 12px;"><s>${{$product->monto * $product->tipo_cambio->valor}}</s></span>                                
                                        <span class="text-product-price" style="font-size: 16px;">${{$price * $product->tipo_cambio->valor}}<span>		
                                        @else
                                        <span class="text-product-price" style="font-size: 16px;">${{$product->monto * $product->tipo_cambio->valor}}</span>
                                        @endif
                                    </td>
                                    <td>             
                                        <?php $count = 0; ?>                  
                                        @foreach ($carrito->products as $product1)
                                            @if($product->nombre == $product1->nombre)
                                                <?php $count++; ?>                  
                                            @endif
                                        @endforeach
                                        <div class="row">                                                                                
                                            <p class="text-product-price" style="font-size: 16px;">x{{$count}}</p>                                             
                                        </div>                          
                                    </td>
                                    <td>
                                        @if($product->descuento_porcentaje != 0)					
                                                <?php $porcentaje = 0; $price = 0;
                                                $porcentaje = $product->monto*$product->descuento_porcentaje; 
                                                $porcentaje = $porcentaje / 100;
                                                $price = $product->monto - $porcentaje; 
                                                $total = $price * $count; 											
                                                ?>                                                             
                                        <span class="text-product-price" style="font-size: 16px;">${{$total * $product->tipo_cambio->valor}}<span>		
                                        @else
                                        <?php  $total = $product->monto * $count; ?>
                                        <span class="text-product-price" style="font-size: 16px;">${{$total * $product->tipo_cambio->valor}}</span>
                                        @endif
                                    </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <form id="saved-form" action="/detalles" method="POST"> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                        <p class="text-product-description" style="margin-left: 15px;margin-bottom: 10px;"  id="name">Por favor, completá todos los datos requeridos para un mejor envío.</p>                 
                            <div class="form-group" >
                                <label class="col-md-4 control-label">Nombre Completo<span style="color: red">*</span></label>
                                <div class="col-md-12">
                                    <input id="username" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
                                </div>		
                            </div>                         
                            <div class="form-group" >						
                                <label class="col-md-4 control-label">DNI<span style="color: red">*</span></label>
                                <div class="col-md-12">
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{Auth::user()->usuario->dni}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Teléfono de Contacto<span style="color: red">*</span></label>
                                <div class="col-md-12">
                                    <input id="phone" type="text" class="form-control" name="telefono" required>
                                </div>	
                            </div>		
                            <div class="form-group">
                                <label class="col-md-4 control-label">Dirección<span style="color: red">*</span></label>
                                <div class="col-md-12">
                                    <input id="street_name" type="text" class="form-control" name="direccion" value="{{ old('name') }}" required>
                                </div>	
                            </div>					
                            <div class="form-group">						
                                <label class="col-md-4 control-label">Altura<span style="color: red">*</span></label>
                                <div class="col-md-12">
                                    <input id="street_number" type="number" class="form-control" name="street_number">
                                </div>
                            </div>
                            <div class="form-group">						
                                <label class="col-md-4 control-label">Código Postal<span style="color: red">*</span></label>
                                <div class="col-md-12">
                                    <input id="zip_code" type="number" class="form-control" name="zip_code" required>
                                </div>
                            </div>
                            <div class="form-group">						
                                <label class="col-md-4 control-label">Provincia<span style="color: red">*</span></label>
                                <div class="col-md-12">
                                    <select id="city" class="form-control" name="city" required>
                                        <option value="Buenos Aires">Bs. As.</option>
                                        <option value="Catamarca">Catamarca</option>
                                        <option value="Chaco">Chaco</option>
                                        <option value="Chubut">Chubut</option>
                                        <option value="Cordoba">Cordoba</option>
                                        <option value="Corrientes">Corrientes</option>
                                        <option value="Entre Rios">Entre Rios</option>
                                        <option value="Formosa">Formosa</option>
                                        <option value="Jujuy">Jujuy</option>
                                        <option value="La Pampa">La Pampa</option>
                                        <option value="La Rioja">La Rioja</option>
                                        <option value="Mendoza">Mendoza</option>
                                        <option value="Misiones">Misiones</option>
                                        <option value="Neuquen">Neuquen</option>
                                        <option value="Rio Negro">Rio Negro</option>
                                        <option value="Salta">Salta</option>
                                        <option value="San Juan">San Juan</option>
                                        <option value="San Luis">San Luis</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                        <option value="Santa Fe">Santa Fe</option>
                                        <option value="Sgo. del Estero">Sgo. del Estero</option>
                                        <option value="Tierra del Fuego">Tierra del Fuego</option>
                                       <option value="Tucuman">Tucuman</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">						
                                <label class="col-md-4 control-label">Localidad<span style="color: red">*</span></label>
                                <div class="col-md-12">
                                    <input id="location" type="text" class="form-control" name="location" required>
                                </div>
                            </div>
                            <?php 
                            $subtotal = 0;
                            foreach($carrito->products as $product){
                              if($product->descuento_porcentaje != 0){					
                                      $porcentaje = 0; $price = 0;
                                      $porcentaje = $product->monto*$product->descuento_porcentaje; 
                                      $porcentaje = $porcentaje / 100;
                                      $price = $product->monto - $porcentaje;
                                      $subtotal = $subtotal + ($price * $product->tipo_cambio->valor); 		
                                      									                                                    
                              }else{
                                  $subtotal = $subtotal + ($product->monto * $product->tipo_cambio->valor);                    
                              }
                            }

                            if($carrito->cristales){              
                                foreach($carrito->cristales as $cristal){
                                    $subtotal = $subtotal + ($cristal->tipo_cristal->monto * $cristal->tipo_cambio->valor);   
                                }
                            }
              
                            $envio = 2500;
                            $total = $subtotal + $envio; 
                            
                            ?>
                            <input type="hidden" name="total" value="{{$total}}">
    
                            <div class="form-group">						
                                <label class="col-md-4 control-label">Información adicional (Opcional)</label>
                                <div class="col-md-12">
                                    <textarea type="text" class="form-control" name="adicional"></textarea>
                                </div>
                            </div>
                        </form>
                    
            
              </div>
             
              
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header">
                        <h5 class="text-center">TOTAL DEL CARRITO</h5>
                      </div>
                      <div class="card-body">                  
                  <div style="padding: 10px 50px 10px 50px;">
                  <h6 class="text-product-description">Subtotal: <span class="text-product-price" style="float: right; font-size: 15px;">${{$subtotal}}</span></h6>
                  <hr>
                  <h6 class="text-product-description">Envío: <span class="text-product-price" style="float: right; font-size: 15px;">$2500</span></h6>
                  <hr>
                  <h6 class="text-product-price">TOTAL: <span class="text-product-price" style="float: right">${{$total}}</span></h6>
                  </div>
                      </div>
                      <div class="card-footer">
                        <a id="finalizar-btn" class="btn btn-secondary" style="width: 100%">FINALIZAR COMPRA</a>
                        <a id="agregar" class="btn btn-outline-secondary mt-2" style="width: 100%">AGREGAR MÁS PRODUCTOS</a>
                        <a href="/anular" class="btn btn-outline-danger mt-2" style="width: 100%">ANULAR COMPRA</a>
                      </div>
                  </div>

              </div>
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
        const id = "<?php echo $carrito->receta_id ?>";
        $('#agregar').on('click', function(){ 
            swal("¿Querés otro par de anteojos o algún accesorio ?", {
                closeOnEsc: false,
              closeOnClickOutside: false,  
          buttons: {          
            cancel: 'Nada más' , 
            catch: {
              text: "Ver anteojos",
              value: "catch",
            }, 
            clipOn: {          
            text: "Ver accesorios",
              value: "clipOn",
          }
        }})        
        .then((value) => {
          switch (value) {
        
            case "clipOn":
              window.location.href = "https://web.visionyestilo.com.ar/accesorios?receta_id="+id;
              break;
        
            case "catch":
              window.location.href = "https://web.visionyestilo.com.ar/verproductorecetado?receta_id="+id;
              break;                 
          }
        });
      });       


    $('#finalizar-btn').on('click', function(){ 
        
        swal({
            closeOnEsc: false,
              closeOnClickOutside: false,  
        title: "¿Completaste los datos correctamente?",
        text: "De ser así el sitio te llevará a la sección de Mercado Pago para abonar y de ser aprobado el pago el producto será despachado a la información solicitada. Si se encuentra en duda de algún dato, puede seguir editando cuantas veces lo requiera, ante cualquier duda ¡consulte!",
        icon: "warning",
        buttons: ["¡Seguir editando!", "Estoy seguro"],
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {      
            var username = $('#username').val();
            var dni = $('#dni').val();
            var phone = $('#phone').val();
            var street_name = $('#street_name').val();
            var street_number = $('#street_number').val();
            var zip_code = $('#zip_code').val();
            var city = $('#city').val();
            var location = $('#location').val();
            if(username != "" && dni != "" && phone != "" && phone != "" && street_name != "" && street_number != "" && zip_code != "" && city != "" && location != ""){
                $('#saved-form').submit();
            }else{
                swal({       
                    title: "¡Debes completar todos los campos!",                    
                text: "No olvides colocar la dirección correctamente, un número de contacto con código de área y toda la información solicitada. Es importante que completes todos los campos.", 
                button: "¡Completar!",
                });

                $('html, body').animate({
                scrollTop: $("#name").offset().top
            }, 2000);
            }
                                                                          
        }else{            
            swal({   
                  
                text: "No olvides colocar la dirección correctamente, un número de contacto con código de área y toda la información solicitada. Es importante que completes todos los campos.", 
                button: "¡Completar!",
                });

                $('html, body').animate({
                scrollTop: $("#name").offset().top
            }, 2000);
        }
        });
    });
  });
    </script>

@else

<div class="container" style>
   
    <div class="row">
        <div class="alert alert-warning">
            <div class="row" style="text-align: center !important" >
                <div clas="col-md-12">
                    <i style="font-size: 100px;" class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                </div>
            </div>
            Por favor, para continuar debes iniciar sesión. Lo hacemos con la intención de que puedas estar al tanto de los pedidos que haz solicitado. Gracias.
        </div>
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


@endif


<script>

    jQuery(document).ready(function(){
        
        const id = "<?php echo $carrito->receta_id ?>";

          swal("¿Querés otro par de anteojos o algún accesorio ?", {
            closeOnEsc: false,
              closeOnClickOutside: false,  
          buttons: {          
            cancel: 'Nada más' , 
            catch: {
              text: "Ver anteojos",
              value: "catch",
            }, 
            clipOn: {          
            text: "Ver accesorios",
              value: "clipOn",
          }
        }})        
        .then((value) => {
          switch (value) {
        
            case "clipOn":
              window.location.href = "https://web.visionyestilo.com.ar/accesorios?receta_id="+id;
              break;
        
            case "catch":
              window.location.href = "https://web.visionyestilo.com.ar/verproductorecetado?receta_id="+id;
              break;                 
          }
        });
      });
  </script>


@endsection