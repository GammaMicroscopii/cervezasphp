<?php

require "../Controlador.php";
$controller = new Controlador();
/*require "../Archivador.php";*/

$cervezas = $controller->dameTodasLasCervezas();
$i = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar cerveza</title>
</head>

<body>
    <h1>
        Eliminar una cerveza
    </h1>

    <table style="border: 3px solid black;">
        <tr>
        <?php foreach ($cervezas as $clave => $valor) {
                //salta de linea
                if( $i == 5) {
                    ?>
                    </tr>
                    <tr>
                    <?php $i = 0;
                }    
            ?>
            <td style="padding: 10px; text-align:center; border:1px solid black;">

            <h2>
                <?php echo $valor->nombre ?>
            </h2>
            <img style="margin:auto;" src="../imagenes/<?php echo $valor->rutaImagen?>" alt="Cerveza <?php echo $valor->nombre ?>" width="133" height="200">
            <br>
            <?php echo "Id: ".$valor->idCerveza ?>
            </td>
            <?php $i = $i+1;
        } ?>
        </tr>
    </table>
    
    <form method="post" action="../index.php" enctype="multipart/form-data">
    <!-- form method="post" action="Controlador::agregarCerveza()">-->
       
        <div>
            <label>Id a borrar: </label>
            <input type="number" name="idBorrar" require>
        </div>
        
        <div>
            <br>
            <input type="reset" name="reset">
            <input type="submit" name="submit">
        </div>
    </form>
</body>

</html>