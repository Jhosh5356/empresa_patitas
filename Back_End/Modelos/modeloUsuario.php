<!DOCTYPE html> <!--Ejecuta html 5 (documenta un codigo)-->
<html lang="es"> <!--Indica el idioma-->
<head>
    <meta charset="UTF-8"> <!--hoja para aceptar caracteres latinos-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--denifir el ancho del dispositivo-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ejecucion Usuario</title>
</head>

<?php
    class inicio {

        function guardar ($duc) { //se crea el metodo registrar
            
            //permite la conexion con la base de datos en el primer parametro esta el motor y en el segundo el nombre de la base de datos y el tercero deberia ir la contraseña y usuario pero no hay
            $conexion = new PDO ('mysql:host=localhost;dbname=empresapatitas','root');
            
            //las cadenas de conexion siempre van primero //para la conexion se utilizar la variable insertar
            $insertar = $conexion -> prepare ('insert into usuarios (nombre, telefono, correo, clave) values (?,?,?,?)');    
            
            //al parametrizar se crea una aplicacion segura evitando que alguna persona inyecte codigo
            $insertar -> bindParam (1, $duc ['w1']); 
            $insertar -> bindParam (2, $duc ['w2']);
            $insertar -> bindParam (3, $duc ['w3']);
            $insertar -> bindParam (4, $duc ['w4']);
        
            $insertar -> execute ();

            echo "<script> alert ('Se registro con exito!');</script>";
        }
        //ACTUALIZAR
        function actualizar ($act) {
            
            $conexion = new PDO ('mysql:host=localhost;dbname=empresapatitas','root');
            
            $editar = $conexion -> prepare ('update usuarios set nombre=?, telefono=?, correo=?, clave=? where idusuario=?'); 

            $editar -> bindParam (1, $act ['w1']); 
            $editar -> bindParam (2, $act ['w2']);
            $editar -> bindParam (3, $act ['w3']);
            $editar -> bindParam (4, $act ['w4']);
            $editar -> bindParam (5, $act ['w5']);

            $editar -> execute ();

            echo "<script> alert ('Se actualizaron los datos con exito!');</script>";

        }
        //ELIMINAR

        function eliminar ($eli) {
            
            $conexion = new PDO ('mysql:host=localhost;dbname=empresapatitas','root');
            
            $borrar = $conexion -> prepare ('delete from usuarios where idusuario=?'); 

            $borrar -> bindParam (1, $eli ['p1']); 

            $borrar -> execute ();

            echo "<script> alert ('Se elimino el usuario con exito!');</script>";

        }

        //CONSULTAR

        //Array es una tabla 

        function consultar () {
            
            $conexion = new PDO ('mysql:host=localhost;dbname=empresapatitas','root');
            
            $vista = $conexion -> prepare ('select * from usuarios'); 

            $vista -> execute ();

            $tabla = $vista -> fetchAll (PDO::FETCH_ASSOC);

            echo " <table class='table caption-top table-bordered table-hover'> 
                    <tr> 
                        <th> Código </th>
                        <th> Nombre </th>
                        <th> Teléfono </th>
                        <th> Correo </th>
                        <th> Contraseña </th>
                    </tr>";
            
            foreach ($tabla as $datos) {
                    //Mostrar columnas
                //Columna Código
                echo "<tr>";
                echo "<td>";
                echo $datos ["idusuario"];
                echo "</td>";

                //Columna Nombre
                echo "<td>";
                echo $datos ["nombre"];
                echo "</td>";

                //Columna Teléfono
                echo "<td>";
                echo $datos ["telefono"];
                echo "</td>";

                //Columna Correo
                echo "<td>";
                echo $datos ["correo"];
                echo "</td>";

                //Columna Contraseña
                echo "<td>";
                echo $datos ["clave"];
                echo "</td>";

                echo "</tr>"; 
            }
            echo "</table>";
            
        }
}
?>
</html>