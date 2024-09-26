<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
    exit;
}

// Inicializar el array de productos si no existe
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Registrar un nuevo producto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'registrar') {
    $nombreProducto = trim($_POST['nombre-producto']);
    $precioProducto = trim($_POST['precio']);
    if (!empty($nombreProducto) && !empty($precioProducto)) {
        $_SESSION['productos'][] = [
            'nombre' => $nombreProducto,
            'precio' => $precioProducto
        ];
        echo json_encode([1, "Producto registrado correctamente."]);
    } else {
        echo json_encode([0, "Faltan datos del producto."]);
    }
    exit;
}

// Editar producto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'editar') {
    $key = $_POST['producto_key'];
    
    if (isset($_SESSION['productos'][$key])) {
        $_SESSION['productos'][$key]['nombre'] = $_POST['nuevo_nombre'];
        $_SESSION['productos'][$key]['precio'] = $_POST['nuevo_precio'];
        echo json_encode([1, "Producto actualizado correctamente."]);
    } else {
        echo json_encode([0, "Producto no encontrado."]);
    }
    exit;
}

// Eliminar producto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'eliminar') {
    $key = $_POST['producto_key'];
    
    if (isset($_SESSION['productos'][$key])) {
        unset($_SESSION['productos'][$key]);
        $_SESSION['productos'] = array_values($_SESSION['productos']); // Reindexar array después de eliminar
        echo json_encode([1, "Producto eliminado correctamente."]);
    } else {
        echo json_encode([0, "Producto no encontrado."]);
    }
    exit;
}
?>
