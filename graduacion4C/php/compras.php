<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function(){
            var $paquetes = $("#paquete1,#paquete2,#paquete3");
            $paquetes.on("change",function(){
                var lugares= $(this).val();
                var precio = $(this).attr("data-precio");
                var total = lugares*precio;
                $(this).next("p").text("$"+total);
            });

            $("#modalConfirmar").modal({
                show:false
            });

            $("#btnConfirmar").on("click",function(){
                var total = 0;
                $("#modalConfirmar").modal("show");
                $paquetes.each(function(){
                    var numero = $(this).val();
                    var $precioCaja = $(this);
                    var precio = $precioCaja.attr("data-precio")*numero;

                    total = total + parseInt(precio);
                    
                });
                $("#precioFinal").text("El total es: $" + total);
            });
            $("#btnAceptar").on("click", function(){
                $btn=$(this);
                $btn.prop("disabled", true);

                var lugaresPaquete1 = $("#paquete1").val();
                var lugaresPaquete2 = $("#paquete2").val();
                var lugaresPaquete3 = $("#paquete3").val();

                $.ajax({
                    url:"comprar.php",
                    method:"POST",
                    data:{
                        paquete1: lugaresPaquete1,
                        paquete2: lugaresPaquete2,
                        paquete3: lugaresPaquete3
                    }
                })
                .done(function(){
                    $btn.prop("disabled", false);
                    $("#modalConfirmar").modal("hide")
                })
            })
        });
    </script>

    <style> 
        .column{
            display: inline-table;
            
        }
        img{
          width: 64px; 
        }

        </style>
        </head>
        <body>
        <div class="column">
            <img src="../img/basic.svg" alt="Basico">
            <br>
            <input type="number" id="paquete1" data-precio="100" value="0" min="0" max="10" class="ham"/>
            <p>$35</p>
        </div>
        <div class="column">
            <img src="../img/medium.svg" alt="Medio">
            <br>
            <input type="number" id="paquete2" data-precio="500" value="0" min="0" max="10"/>
            <p>$15</p>
        </div>
        <div class="column">
            <img src="../img/premium.svg" alt="Medio">
            <br>
            <input type="number" id="paquete3" data-precio="1000" value="0" min="0" max="10"/>
            <p>$20</p>
        </div>
        <br>
        <button class="btn btn-outline-dark" id="btnConfirmar">
    Confirmar
    </button>

    <div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h5>Desea confirmar la compra?</h5>
            <p id="precioFinal"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" id="btnCancelar">Cancelar</button>
            <button type="button" class="btn btn-outline-primary" id="btnAceptar">Aceptar</button>
        </div>
        </div>
    </div>
    </div>

</body>
</html>