<?php

require "../Controlador.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva cerveza</title>
</head>

<body>
    <h1>
        Agregar nueva cerveza
    </h1>
    
    <form method="post" action="../index.php" enctype="multipart/form-data">
    <!-- form method="post" action="Controlador::agregarCerveza()">-->
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" require>
        </div>
        <div>
            <label>País</label>
            <input type="text" name="pais" require>
        </div>
        <div>
            <label>Precio</label>
            <input type="number" name="precio" require>
        </div>
        <div>
            <label>Tipo</label>
            <select name="tipo" require>
                <option value="" selected disabled hidden>Seleccionar...</option>
                <option value="Tostada">Tostada</option>
                <option value="Rubia">Rubia</option>
                <option value="De trigo">De trigo</option>
                <option value="Negra">Negra</option>
            </select>
        </div>
        <div>
            <label>Graduación alcohóloca</label>
            <input type="number" name="alcohol" require>
        </div>
        <div>
            <label>Nombre imagen asociada</label>
            <input type="text" name="rutaImagen">
            <br> <small>* Sin cualificar, sólo introducir nombre de archivo (como "cerveza_??????.png")</small>
        </div>
        <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 5*1048576; //5 MB ?>">
            <label>Fichero descripción pdf/docx</label>
            <input type="file" name="documentoDescripcion">
        </div>
        <div>
            <br>
            <input type="reset" name="reset">
            <input type="submit" name="submit">
        </div>
    </form>
</body>

</html>