<?php

session_start();
if(isset($_SESSION["nombre"])){
    echo "bienvenido al area de miembros de club";
}
else{
    header("Location: login.php");
}
?>