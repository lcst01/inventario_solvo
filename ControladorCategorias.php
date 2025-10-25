
<?php


 

require_once "Modelos/ModeloCategorias.php";


 

class ControladorCategorias

{

    public static function crearCategoria(){
      //validamos que sea el método post y venga la variable post categoría

        if(
            $_SERVER['REQUEST_METHOD'] !== 'POST' ||
            !isset($_POST['categoria'])
        ){
            return;
        }
      
        //tomamos y saneamos el valor - trim quita los espacios en blanco a los extremos
        $categoria = trim($_POST['categoria']);

    // 2) Validar: letras (con acentos), números, espacios y guiones

        if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü0-9\s\-]+$/u', $categoria)) {

            echo '
                <script>
                    Swal.fire({
                        title: "Cuidado",
                        text: "No se permiten caracteres especiales.",
                        icon: "error",
                        confirmButtonText: "Entendido"
                    }).then(() => {
                        window.location = "categorias";
                    });
                </script>
            ';
            return;
        }

        //instanciamos el modelo y su metodo para registrar 
        $nuevoId = ModeloCategorias::registrarCategoria($categoria);

        //respuesta para el frontend
        if($nuevoId){

            echo '
                <script>
                    Swal.fire({
                        title: "Registro Exitoso",
                        text: "La categoría se registró exitosamente",
                        icon: "success",
                        confirmButtonText: "Ok"
                    }).then(() => {
                        window.location = "categorias";
                    });
                </script>
            ';
            return;

        }else{
            echo '
                <script>
                    Swal.fire({
                        title: "Error",
                        text: "No fue posible registrar la categoría. Por favor intenta nuevamente",
                        icon: "error",
                        confirmButtonText: "Entendido"
                    }).then(() => {
                        window.location = "categorias";
                    });
                </script>
            ';
            return;
        } 

    }
}