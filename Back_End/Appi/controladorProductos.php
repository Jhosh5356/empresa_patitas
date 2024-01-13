<?php
//CODIGO DEL CONTROLADOR

include("../Modelos/modeloProducto.php");

//RUTA POST INSERTAR 

if(isset($_POST["codigo_Producto"]) && ! empty($_POST["codigo_Producto"])){
    try {

        $codigo = $_POST ["codigo_Producto"]; 
        $descripcion = $_POST ["descrip_Producto"]; 
        $precio = $_POST ["precio_Producto"];
        $categoria = $_POST ["categoria_Producto"];
        $estado = $_POST ["estado_Producto"];
        
        $objProducto = new modeloProducto ($codigo, $descripcion, $precio, $categoria, $estado); 

        $objProducto -> registrarProducto (); 

        echo(
            "<script>
                alert('El producto ha sido registrado con exito! ;)');
                location.href='../../Front_End/Productos/crear.html'; 
            </script>"
        ); 

    } catch (\Throwable $error) {
        echo("ERROR EN CONTROLADOR: ".$error);
        die(); 
    }
}

?>