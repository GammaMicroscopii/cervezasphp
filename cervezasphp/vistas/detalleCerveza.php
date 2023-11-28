<?php

    require "../Controlador.php";
    $controller = new Controlador();
    if(isset($_POST["idDetalle"])){
        $cerveza=$controller ->verCerveza($_POST["idDetalle"]);
    }

   // var_dump($cerveza);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de cervezas</title>
</head>
<body>
    <h1>
        Detalles de la cerveza
    </h1>
    <?php /*foreach ($cerveza as $clave => $valor) {?>
        <ul>
            <li><?php echo($clave .": ".$valor)?></li>
        </ul>
    <?php }*/ ?>

<img src="../imagenes/<?php echo $cerveza->rutaImagen?>" alt="Cerveza <?php echo $cerveza->nombre ?>" width="133" height="200">
            
    <ul>
        <li>Nombre: <?php echo $cerveza->nombre; ?></li>
        <li>País: <?php echo $cerveza->pais; ?></li>
        <li>Precio: <?php echo $cerveza->precio/10; ?> €</li>
        <li>Tipo: <?php echo $cerveza->tipo; ?></li>
        <li>Grad. alcohólica: <?php echo $cerveza->alcohol/10; ?> %</li>
    </ul>
    
</body>
</html>