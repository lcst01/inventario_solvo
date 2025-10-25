<?php


 

require_once "Modelos/Conexion.php";


 

class ModeloCategorias

{


 

    //REGISTRAR CATEGORIAS Y DEVOLVER EL ID INSERTADO O NULL SI FALLA

    public static function registrarCategoria(string $nombre): ?int

    {


 

        $nombre = trim($nombre);

        if ($nombre === ''){

            return null;

        }


 

        $sql = "INSERT INTO categorias (nombre_categoria) VALUES (:nombre_categoria)";


 

        try{

            $pdo = Conexion::pdo();

            $stmt = $pdo->prepare($sql);


 

            //enlazamos parámetros

            $stmt->bindValue(':nombre_categoria', $nombre, PDO::PARAM_STR);


 

            if(!$stmt->execute()){

                return null;

            }


 

            $id = (int) $pdo->lastInsertId();

            return $id > 0 ? $id : null;


 

        }catch(PDOException $e){

            //nunca mostrar este detalle al usuario, se loguea para control interno

            error_log("Error en registrarCategoria: " . $e->getMessage());

            return null;

        }



 

    }

}