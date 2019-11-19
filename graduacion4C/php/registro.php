<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Registro</title>
    
</head>
<body>
    <form action="proceso.php" method="POST">
    <div class="form-group">
        <label for="exampleInputName1">Nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" name="email">
    </div>
        <br><br>
        <button class="btn btn-outline-dark">Registro</button>
    </form>    
</body>
</html>