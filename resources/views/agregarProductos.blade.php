@extends('layouts.app')
@section('content')

  <div class="card mb-3">
    <div class="card-body text-center">
      <h5 class="card-title">Ingreso de Productos</h5>
      <p class="card-text text-muted"><small class="text-muted">Antes de ingresar el producto, tenga en cuenta que necesitará todos los datos del mismo. El proceso se realiza una sola vez. Luego podrá editarlo o eliminarlo.</small></p>
      @if(session()->has('message'))
        <div class="alert alert-success">El producto se <strong>cargó con éxito</strong>, puede cargar otro si desea. </div>
      @endif
      <form method="POST" action="/add" enctype="multipart/form-data">          
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre (A mostrar)</label>
              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                
              </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Técnico (Nombre base)</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="nombre_base" required >              
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo de producto</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="tipo_producto_id" required >              
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Código del Producto</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required  >              
            </div>
         </div>

          <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>
            <div class="col-md-6">
              <textarea type="text" class="form-control" name="description"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Altas Graduaciones</label>
            <div class="col-md-6">
              <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="altasgraduaciones" id="altasi">
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
                <input id="name" type="number" class="form-control" name="calibre" required>              
            </div>
         </div>

         <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Largo Patillas</label>
            <div class="col-md-6">
              <input id="name" type="number" class="form-control" name="largo_patillas" required>              
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Sexo (M, F, U)</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="sexo" required>              
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Rango etario desde</label>
            <div class="col-md-6">
                <input id="name" type="number" class="form-control" name="rango_etario_desde" required>              
            </div>
         </div>

         <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Rango etario hasta</label>
            <div class="col-md-6">
              <input id="name" type="number" class="form-control" name="rango_etario_hasta" required>              
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Costo</label>
            <div class="col-md-6">
                <input id="name" type="number" class="form-control" name="Costo" required>              
            </div>
         </div>

         <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">Impuesto (%)</label>
          <div class="col-md-6">
              <input id="name" type="number" class="form-control" name="impuesto" required>              
          </div>
       </div>

       <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Ganancia</label>
        <div class="col-md-6">
            <input id="name" type="number" class="form-control" name="ganancia" required>              
        </div>
        </div>

        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">Monto</label>
          <div class="col-md-6">
              <input id="name" type="number" class="form-control" name="monto" required>              
          </div>
       </div>

       <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Monto Descuento</label>
        <div class="col-md-6">
            <input id="name" type="number" class="form-control" name="descuento" required>              
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

      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Habilitado</label>
       
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

      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Stock (Cantidad del mismo articulo)</label>
        <div class="col-md-6">
            <input id="name" type="number" class="form-control" name="stock" required>              
        </div>
     </div>
      
      <div class="form-group row">
          <label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
          <input id="file" class="btn btn-primary"name="file1" type="file" class="inputfile" />          
          </div>
          <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
            <input id="file" class="btn btn-primary"name="file2" type="file" class="inputfile" />          
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
              <input id="file" class="btn btn-primary"name="file3" type="file" class="inputfile" />          
              </div>
              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="file">Suba una imagen</label>
                <input id="file" class="btn btn-primary"name="file4" type="file" class="inputfile" />          
                </div>
                     
          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Cargar Producto
                  </button>
              </div>
          </div>
      </form>

    </div>
  </div>
	<script
	src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
<script>


  
  jQuery(document).ready(function(){
  $('#category').on('change', function(){    
    var category_id = $(this).val();    
  $.get('subcategories', {category_id: category_id}, function(subcategories){      
    $('#subcategory').empty();
  $.each(subcategories, function(index, subcategory){
      $('#subcategory').append("<option value= '"+ subcategory.id +"'>"+ subcategory.name +"</option>");                  
  })
});
});
});
</script>
@endsection