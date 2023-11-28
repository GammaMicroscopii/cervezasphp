<?php

require_once "modelo/Cerveza.php";
use ObjetosDB\Cerveza;

class Controlador {

    function __construct(){}

    function agregarCerveza($nombre, $pais, $precio, $tipo, $alcohol, $rutaImagen, $documentoDescripcion) {
       $cerveza = new Cerveza();
        $cerveza->constructPeroConOtroNombrePorqueSiNoPHPSeQueja($nombre, $pais, $precio, $tipo, $alcohol, $rutaImagen, $documentoDescripcion);
        $todas = $this->dameTodasLasCervezas();
        
        //si la cerveza $this ya existe en la bd con el mismo nombre, no la añade
        $yaAnyiadida = false;

        foreach ($todas as $k => $v) {
            if ($v->nombre == $nombre) {
                $yaAnyiadida = true;
            }
        }
        
        if ($yaAnyiadida) {
            return false;
        } else {
            return $cerveza->insertar();
        }
    }

    function dameTodasLasCervezas() {
        return Cerveza::all();
    }

    function borrarCerveza($id){
        return Cerveza::borrar($id);
    }

    function verCerveza($id){
        $idSinComillas=str_replace("'","",$id);
        return Cerveza::find($idSinComillas);
    }
    
    function actualizarCerveza($idActualizar,$nuevoNombre,$nuevoPais,$nuevoPrecio,$nuevoTipo,$nuevoAlcohol,$nuevaRutaImagen,$nuevoDocumentoDescripcion){
        
        if ($nuevoDocumentoDescripcion != null){
            move_uploaded_file($_FILES["nuevoDocumentoDescripcion"]['tmp_name'], "beer_desc/$nuevoDocumentoDescripcion");
        }

        return Cerveza::actualizar($idActualizar,$nuevoNombre,$nuevoPais,$nuevoPrecio,$nuevoTipo,$nuevoAlcohol,$nuevaRutaImagen, $nuevoDocumentoDescripcion);
    }
}