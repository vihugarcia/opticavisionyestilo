<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Confirmación de Pago</title>
</head>
<body>
    <p>Hola <strong>{{$usuario->user->name}}!</strong>.</p>
    <p>Recibiste una confirmación de compra de visión y estilo con el número: <strong>{{$orden->id}}</strong>.</p>
    <p>Para visualizarla ingresá al siguiente link: <a class="btn btn-secondary" href="https://web.visionyestilo.com.ar/ordenes" target_="blank">Ver orden de compra</a> .</p>   
   
    <p>Ante cualquier duda comunicate con nosotros! </p>
  	
</body>
</html>