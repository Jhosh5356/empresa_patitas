<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title> Productos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

    <?php

    class product { 

        function crear ($pat) { //se crea el metodo registrar
            
            //permite la conexion con la base de datos en el primer parametro esta el motor y en el segundo el nombre de la base de datos y el tercero deberia ir la contraseña y usuario pero no hay
            $enlace = new PDO ('mysql:host=localhost;dbname=empresapatitas','root');
            
            //las cadenas de conexion siempre van primero //para la conexion se utilizar la variable insertar
            $registrar = $enlace -> prepare ('insert into productos (descripProducto, precioProducto, categoriaProducto, estadoProducto) values (?,?,?,?)');    
            
            //al parametrizar se crea una aplicacion segura evitando que alguna persona inyecte codigo
            $registrar -> bindParam (1, $pat ['r1']); 
            $registrar -> bindParam (2, $pat ['r2']);
            $registrar -> bindParam (3, $pat ['r3']);
            $registrar -> bindParam (4, $pat ['r4']);
        
            $registrar -> execute ();

            echo "<script> alert ('Se registro el producto con exito!');</script>";
        }
}
?>
</html>