<?php

    require "Controlador.php";
    $controller = new Controlador();
  
    if(isset($_POST["idBorrar"])){
        $idSinComillas=str_replace("'","",$_POST["idBorrar"]);
        $controller-> borrarCerveza($idSinComillas);
    }else if(isset($_POST["idActualizar"])){


        if (isset($_FILES["nuevaImagen"]["tmp_name"])) {
            $extension = substr($_FILES["nuevaImagen"]["name"], -4);

            if ($_FILES["nuevaImagen"]["size"] <= 10*1048576 &&($extension==".png" || $extension==".jpg")) {
                move_uploaded_file($_FILES["nuevaImagen"]["tmp_name"], "imagenes/" . $_FILES['nuevaImagen']['name']);
            } else {
                echo "Excepción al subir archivo nuevaImagen: o tiene más de 10 MB o no tiene una extensión .png o .jpg";
            }
        }

        if (isset($_FILES["nuevoDocumentoDescripcion"]["tmp_name"])) {
            $nombreArchivo = $_FILES["nuevoDocumentoDescripcion"]["name"];

            if ($_FILES["nuevodocumentoDescripcion"]["size"] <= 5*1048576 &&(substr($nombreArchivo, -4)==".pdf" || substr($nombreArchivo, -5)==".docx")) {
                $controller -> actualizarCerveza($_POST["idActualizar"],$_POST["nuevoNombre"],$_POST["nuevoPais"],$_POST["nuevoPrecio"],$_POST["nuevoTipo"],$_POST["nuevoAlcohol"],$_POST["nuevaRutaImagen"],$_FILES["nuevoDocumentoDescripcion"]["name"]);
            } else {
                echo "Excepción al subir archivo nuevoDocumentoDescripción: o tiene más de 5 MB o no tiene una extensión .pdf o .docx";
            }
        } else {
            $controller -> actualizarCerveza($_POST["idActualizar"],$_POST["nuevoNombre"],$_POST["nuevoPais"],$_POST["nuevoPrecio"],$_POST["nuevoTipo"],$_POST["nuevoAlcohol"],$_POST["nuevaRutaImagen"], null);
        }

       


    }else if (isset($_POST["nombre"])) {

        $anyadirConArchivo = false;
        
        if (isset($_FILES["documentoDescripcion"]["tmp_name"])) {
            
            $nombreArchivo = $_FILES["documentoDescripcion"]["name"];
            if ($_FILES["documentoDescripcion"]["size"] <= 5*1048576 && (substr($nombreArchivo, -4)==".pdf" || substr($nombreArchivo, -5)==".docx")) {
                $nuevaUbicacion = "beer_desc/" . basename($nombreArchivo);
                if (move_uploaded_file($_FILES["documentoDescripcion"]["tmp_name"], $nuevaUbicacion)) {
                    $anyadirConArchivo = true;
                } else {
                    echo "No ha podido subirse el archivo";
                }
                
            }
        }

        if ($anyadirConArchivo) {
            $controller->agregarCerveza($_POST["nombre"], $_POST["pais"], $_POST["precio"], $_POST["tipo"], $_POST["alcohol"], $_POST["rutaImagen"], basename($nombreArchivo));
        } else {
            $controller->agregarCerveza($_POST["nombre"], $_POST["pais"], $_POST["precio"], $_POST["tipo"], $_POST["alcohol"], $_POST["rutaImagen"], null);
            echo basename($nombreArchivo);
        }
    }

    $cervezas = $controller->dameTodasLasCervezas();
    $i = 0;
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal de Cervezas</title>
</head>
<body>
    <h1>
    VISTA DE CERVEZAS
    </h1>
    <table style="border: 3px solid black;">
        <tr>
        <?php foreach ($cervezas as $clave => $valor) {
                //salta de linea
                if( $i == 3) {
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
            <img style="margin:auto;" src="imagenes/<?php echo $valor->rutaImagen?>" alt="Cerveza <?php echo $valor->nombre ?>" width="133" height="200">
            <br>
            </td>
            <?php $i = $i+1;
        } ?>
        </tr>
    </table>
    </br>
    </br>
    <a href="vistas/agregar.php">
        <button>Agregar nueva cerveza</button>
    </a>
    <a href="vistas/datosCerveza.php">
        <button>Ver datos de una cerveza</button>
    </a>
    <a href="vistas/actDatosCerveza.php">
        <button>Actualizar datos de una cerveza</button>
    </a>
    <a href="vistas/eliminar.php">
        <button>Eliminar una cerveza</button>
    </a>
</body>
</html>