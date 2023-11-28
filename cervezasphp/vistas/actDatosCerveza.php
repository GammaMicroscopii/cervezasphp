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
    <title>Actualizar cerveza</title>
</head>

<body>
    <h1>
        Elige una cerveza para actualizar sus datos
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
            <label>Id de la cerveza que desea actualizar: </label>
            <input type="number" name="idActualizar" require>
        </div>
        <div>
            <label>Nuevo nombre</label>
            <input type="text" name="nuevoNombre" require>
        </div>
        <div>
            <label>Nuevo país</label>
            <input type="text" name="nuevoPais" require>
        </div>
        <div>
            <label>Nuevo precio</label>
            <input type="number" name="nuevoPrecio" require>
        </div>
        <div>
            <label>Nuevo tipo</label>
            <select name="nuevoTipo" require>
                <option value="" selected disabled hidden>Seleccionar...</option>
                <option value="Tostada">Tostada</option>
                <option value="Rubia">Rubia</option>
                <option value="De trigo">De trigo</option>
                <option value="Negra">Negra</option>
            </select>
        </div>
        <div>
            <label>Nueva graduación alcohóloca</label>
            <input type="number" name="nuevoAlcohol" require>
        </div>
        <div>
            <label>Nuevo nombre imagen asociada</label>
            <input type="text" name="nuevaRutaImagen">
            <br> <small>* Sin cualificar, sólo introducir nombre de archivo (como "cerveza_??????.png")</small>
            <br> <small>** Si introduces nueva imagen, escribe el nombre de esa nueva imagen con extensión.</small>
        </div>
        <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 10*1048576; //10 MB ?>">
            <label>Nueva imagen (jpg/png)</label>
            <input type="file" name="nuevaImagen">
            
            <label>Nuevo documento descripción (pdf/docx)</label>
            <input type="file" name="nuevoDocumentoDescripcion">
        </div>
        <div>
            <br>
            <input type="reset" name="reset">
            <input type="submit" name="submit">
        </div>
    </form>
</body>

</html>