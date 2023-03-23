<?php
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: inicio.php');
  }
  require 'db.php';

  if (!empty($_POST['user']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, user, password FROM users WHERE user = :user');
    $records->bindParam(':user', $_POST['user']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: inicio.php");
    } else {
      $message = 'Lo sentimos, esas credenciales no coinciden';
    }
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="shortcut icon" href="../img/favicon_utp_watch.png" type="image/x-icon">
  <title>UTP Watch</title>
</head>
<body>
  <div class="contenedor_datos">
    <h1 class="titulo_login">Iniciar Sesión</h1>
    <div class="imagen">
      <!-- aquí se colocaría la imagen -->
    </div>
    <div class="datos">
      <div class="registro_entrada">
        <form action="inicio.php" method="post">
          <input type="text" name="user" id="" class="entry" placeholder="Nombre Usuario">
          <input type="password" name="password" class="entry" id="" placeholder="Contraseña">
          <button type="submit" name="login" class="botones">Ingresar</button>
        </form>
        <button class="botones" onclick="window.location='registro.php'">Resgistrate</button>
        <a href="#">¿Olvidaste tu contraseña?</a>
      </div>
    </div>
  </div>
</body>
</html>