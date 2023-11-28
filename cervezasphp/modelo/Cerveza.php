<?php

namespace ObjetosDB;
require_once "Model.php";
use PDO;
use ObjetosDB\Model;

require_once 'Model.php';

class Cerveza extends Model
{
    public $idCerveza;
    public $nombre;
    public $pais;
    public $precio;
    public $tipo;
    public $alcohol;
    public $rutaImagen;
    public $documentoDescripcion;

    function __construct() {}

    public function constructPeroConOtroNombrePorqueSiNoPHPSeQueja($nombre, $pais, $precio, $tipo, $alcohol, $rutaImagen = null, $documentoDescripcion = null) {

        $this->nombre = str_replace("'","",$nombre);
        $this->pais = str_replace("'","",$pais);
        $this->precio = $precio;
        $this->tipo = str_replace("'","",$tipo);
        $this->alcohol = $alcohol;
        $this->rutaImagen = str_replace("'","",$rutaImagen);
        $this->documentoDescripcion = str_replace("'","",$documentoDescripcion);
    }

    public static function all(){
        $db = Model::db();
        $statement = $db->query('SELECT idCerveza, nombre, pais, precio, tipo, alcohol, rutaImagen, documentoDescripcion  FROM cervezas');
        $cervezas = $statement->fetchAll(PDO::FETCH_CLASS, 'ObjetosDB\Cerveza');

        return $cervezas;
    }
    
    public static function find($id){
        $db = Model::db();
        $stmt = $db->prepare('SELECT idCerveza, nombre, pais, precio, tipo, alcohol, rutaImagen, documentoDescripcion FROM cervezas WHERE idCerveza =:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, Cerveza::class);
        $cerveza = $stmt->fetch(PDO::FETCH_CLASS);

        return $cerveza;
    }
    public function insertar(){
        $db = Model::db();
        $stmt = $db->prepare("INSERT INTO cervezas(nombre, pais, precio, tipo, alcohol, rutaImagen, documentoDescripcion) VALUES(:nombre, :pais, :precio, :tipo, :alcohol, :rutaImagen, :documentoDescripcion)");
        $stmt->bindValue(':nombre', $this->nombre);
        $stmt->bindValue(':pais', $this->pais);
        $stmt->bindValue(':precio', $this->precio);
        $stmt->bindValue(':tipo', $this->tipo);
        $stmt->bindValue(':alcohol', $this->alcohol);
        $stmt->bindValue(':rutaImagen', $this->rutaImagen);
        $stmt->bindValue(':documentoDescripcion', $this->documentoDescripcion);
        return $stmt->execute();
        /*$res= $stmt->execute();
        $this->$id=*/
    }
    public static function borrar($id){
        try {
            $db = Model::db();

            $stmt = $db->prepare("SELECT rutaImagen, documentoDescripcion FROM cervezas WHERE idCerveza = ?");
            $stmt->execute([$id]);
            $datos = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($datos);

            $stmt = $db->prepare("DELETE FROM cervezas WHERE idCerveza = ?");
            $stmt->execute([$id]);

            if (file_exists("./imagenes/".$datos['rutaImagen'])) {
                unlink("./imagenes/".$datos['rutaImagen']);
            }
    
            if (file_exists('beer_desc/'.$datos['documentoDescripcion'])) {
                unlink('beer_desc/'.$datos['documentoDescripcion']);
            }
    
            return true;
        } catch (\PDOException $e) {
            die("Error al borrar la cerveza");
            return false;
        }
    }
    public static function actualizar($id,$nombre, $pais, $precio, $tipo, $alcohol, $rutaImagen, $documentoDescripcion){
        try {
            $db = Model::db();
            if ($documentoDescripcion != null) {
            
                $stmt = $db->prepare("SELECT documentoDescripcion FROM cervezas WHERE idCerveza = ?");
                $stmt->execute([$id]);
                $datos = $stmt->fetch(PDO::FETCH_ASSOC);

                if (file_exists('beer_desc/'.$datos['documentoDescripcion'])) {
                    unlink('beer_desc/'.$datos['documentoDescripcion']);
                }
            }

            $stmt = $db->prepare("UPDATE cervezas SET nombre = ?,  pais = ?, precio = ?,tipo = ?, alcohol = ?, rutaImagen=?, documentoDescripcion=? WHERE idCerveza = ?");
            $stmt->execute([$nombre,  $pais, $precio,$tipo, $alcohol, $rutaImagen, $documentoDescripcion, $id]);
        } catch (\PDOException $e) {
            die("Error al actualizar datos de la cerveza");
        }
    }
}


/*
PARA HACER:
- AÑADIR LAS INFORMACIONES DE LAS CERVEZAS A LA BD
- TERMINAR ESTA CLASE CON LOS APUNTES DE RAFACABEZA. YA ESTÁ EN EL NAVEGADOR LA PÁGINA Y ALTURA CORRECTA, SÓLO DE AHI PARA ABAJO
- LA VISTA DONDE APAREZCAN LAS CERVEZAS EN EL INDEX
*/