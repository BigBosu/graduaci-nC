<?php

session_start();

include("conexion.php");
$usuario = $_POST["nombre"];
$password = hash("whirlpool", $_POST["password"]);

$statement = "SELECT id, nombre, password FROM usuarios WHERE nombre = '$usuario' AND password = '$password'";

$resultado = $conexionDB->query($statement);

if($resultado->num_rows>0){
echo "Bienvenido" .$nombre;
session_start();
$_SESSION["datosUsuario"]=mysqli_fetch_assoc($resultado);
$_SESSION["nombre"] = $nombre;
}
else{
    echo"Usuario o password incorrectos";
}
//var_dump($resultado);

?>