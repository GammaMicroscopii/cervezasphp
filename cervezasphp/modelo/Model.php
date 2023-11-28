<?php
namespace ObjetosDB;
require_once "Credenciales.php";

use PDO;
use const ObjetosDB\DSN;
use const ObjetosDB\USUARIO;
use const ObjetosDB\CONTRASEÑA;

class Model
{
   protected static function db()
    {

        try {
            $db = new PDO(DSN, USUARIO, CONTRASEÑA);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $db;
    }
}