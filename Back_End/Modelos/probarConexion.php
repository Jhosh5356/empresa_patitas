<?php
include ("modeloConexion.php");

try {
    $objConexion = new modeloConexion ();
    $objConexion -> conectar ();
    echo ("Conexion correta!");
    $objConexion = $objConexion -> desconectar ();
} catch (\Throwable $th) {
    echo ("Error en la conexion: ".$error -> getMessage ());
    die ();
}
?>