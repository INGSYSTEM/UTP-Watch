<?php
  // Iniciar sesión
  session_start();

  // Eliminar todas las variables de sesión
  session_unset();

  // Destruir la sesión
  session_destroy();

  header("Location: index.php"); // redirigir a la página de inicio o a cualquier otra página que desees
  exit();
?>
