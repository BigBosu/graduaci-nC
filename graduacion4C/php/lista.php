<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<?php
    include("conexion.php");
    $consulta = "SELECT nombre, password, email FROM usuarios";
    $resultado = $conexionDB->query($consulta);
    //var_dump($resultado);
    $usuarios = array();

    echo"<table class=\"table table-striped\">
        <tr>
    <th>Nombre</th>
    <th>Password</th>
    <th>Email</th>
        </tr>
    ";

    while($fila = mysqli_fetch_assoc($resultado)){
        $usuarios[] = $fila;
        $nombre = $fila["nombre"];
        $password = $fila["password"];
        $email = $fila["email"];

        echo"<tr>
                <td>$nombre</td>
                <td>$password</td>
                <td>$email</td>
                ";
                

    }

    //var_dump($usuarios);

?>
</body>
</html>