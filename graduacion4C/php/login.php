<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <style>
        .fa-spin{
            display: none;
        }    
    </style>
    <script>
        $(function(){
            $boton = $("#btnIngresar");
            $spinner = $(".fa-spin");
            $boton.on("click",function(evento){
                evento.preventDefault();
                $boton.prop("disabled", true);
                $spinner.show();

                var v_usuario = $("#usuario").val();
                var v_password = $("#password").val();

                $.ajax({
                    url: "vip.php",
                    method: "POST",
                    data:{
                        nombre: v_usuario,
                        password: v_password
                    }
                })
                .done(function(informacion){
                    console.log(informacion);
                    $("#resultado").text(informacion);

                });
            });
        });
    </script>
</head>
<body>
<section class="container-fluid">
    <section class="row">
        <form action="vip.php" method="POST">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="text" name="nombre" class="form-control" id="usuario">
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark" id="btnIngresar">
                    Ingresar
                    </button>
                    <i class="fas fa-spinner fa-spin"></i>
                    <p class="text-danger" id="resultado"></p>
                </div>       
            </div>
        </form>
    </section>
</section>
    
</body>
</html>