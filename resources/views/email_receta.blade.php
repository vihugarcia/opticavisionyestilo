<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Receta Vision y Estilo Óptica</title>
</head>
<body>
    <p>Hola <strong>{{$usuario->user->name}}!</strong>.</p>
    <p>Recibiste una receta de Óptica Visión y Estilo.</p>
    <p>Para visualizarla y ver los productos disponibles ingresá al siguiente link: <a class="btn btn-secondary" href="https://web.visionyestilo.com.ar/verproductorecetado?receta_id={{$receta->id}}" target_="blank">Ver productos recetados</a> .</p>
      <ul>
        <li>Email: {{ $usuario->user->email }}</li>
        <li>Password: {{$usuario->dni}}</li>       
    </ul>
   
    <p>Ante cualquier duda comunicate con nosotros! </p>
  	
</body>
</html>