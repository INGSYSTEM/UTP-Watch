<?php
// Conectarse a la base de datos
$db = new PDO('sqlite:db_usuarios.db');

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contraseña'];

// Insertar los datos en la tabla de usuarios
$stmt = $db->prepare('INSERT INTO usuarios (USUARIO, CORREO, CONTRASEÑA) VALUES (:usuario, :correo, :contrasena)');
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':contrasena', $contrasena);
$stmt->execute();

// Cerrar la conexión a la base de datos
$db = null;

// Redirigir al usuario a la página de inicio
header('Location: login.html');
?>
