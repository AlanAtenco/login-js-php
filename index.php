<?php
    require_once "./app/config/dependencias.php";
    session_start();
    require_once "./app/controller/inicio.php"

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?=css.'index.css';?>"><!--url interna -->
    </head>
<body>
    <p>Bienvenido <?=$_SESSION['usuario']['nombre']?></p> 
    
<a href="cerrar_sesion.php" class="btn btn-dark btn-lg" >Cerrar Sesion</a>


</body>
</html>
