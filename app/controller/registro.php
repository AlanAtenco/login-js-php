<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
// if (isset($_SESSION['usuario'])) {
//     echo json_encode([1, "Usuario ya registrado", "index.php"]);
//     exit();
// }

// Verificar si se enviaron los datos correctamente
if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['apellido']) && !empty($_POST['apellido']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Guardar los datos en la sesión
    $_SESSION['registro'] = [
        "nombre" => $nombre,
        "apellido" => $apellido,
        "email" => $email,
        "password" => $password
    ];

    // Respuesta en JSON para que el frontend maneje la redirección
    echo json_encode([1, "Registro exitoso", "login.php"]);
} else {
    // Si faltan datos, devolver una respuesta de error
    echo json_encode([0, "Error: Faltan datos"]);
}
?>
