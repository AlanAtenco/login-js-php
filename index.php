<?php
require_once "./app/config/dependencias.php";
require_once "./app/controller/inicio.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Productos</title>
    <link rel="stylesheet" href="<?= css . 'productos.css'; ?>">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Registro de Producto</h3>
                </div>
                <div class="card-body">
                    <!-- Formulario con manejo de evento onsubmit para registrar el producto -->
                    <form id="form-registro" onsubmit="event.preventDefault(); registrar_producto();">
                        <div class="form-group">
                            <label for="nombre-producto">Nombre del Producto:</label>
                            <input type="text" class="form-control" id="nombre-producto" name="nombre-producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo letras" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio del Producto:</label>
                            <input type="text" class="form-control" id="precio" name="precio" pattern="\d+(\.\d{1,2})?" title="Solo números y hasta dos decimales" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Registrar Producto</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Mostrar los productos registrados -->
            <?php if (!empty($_SESSION['productos'])): ?>
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Productos Registrados</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($_SESSION['productos'] as $key => $producto): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= htmlspecialchars($producto['nombre']) ?> - $<?= htmlspecialchars($producto['precio']) ?>
                                    <div>
                                        <button type="button" class="btn btn-warning btn-sm" onclick="editar_producto(<?= $key ?>, '<?= htmlspecialchars($producto['nombre']) ?>', <?= htmlspecialchars($producto['precio']) ?>)">Editar</button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_producto(<?= $key ?>)">Eliminar</button>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Enlace para cerrar sesión -->
<a href="cerrar_sesion.php" id="sesion" class="btn btn-dark btn-lg">Cerrar Sesión</a>

<!-- Archivo JS para manejo de CRUD -->
<script src="./public/js/crud.js"></script>

</body>
</html>
