<?php
    require_once "./app/config/dependencias.php";
    require_once "./app/controller/registro.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="<?=css.'registro.css';?>">
</head>
<body>
<div class="container">
<div class="row justify-content-center mt-5">
<div class="col-md-6">
<div class="card">
    <div class="card-header">
        <h3 class="text-center">Registro</h3>
    </div>
    <div class="card-body">
        <form action="registro.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>  
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
                <button type="button" id="btn_registro" class="btn btn-dark">Registrarse</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
<script src="./public/js/registro.js"></script>
</body>
</html>
