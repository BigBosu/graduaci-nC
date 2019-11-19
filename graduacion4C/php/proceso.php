<?php
include("conexion.php");

$nombre = $_POST["nombre"];
$password = hash("whirlpool", $_POST["password"]);
$email = $_POST["email"];

$statement = "INSERT INTO usuarios (nombre, password, email) VALUES ('$nombre' , '$password' , '$email')";
$resultado = $conexionDB->query($statement);

?>