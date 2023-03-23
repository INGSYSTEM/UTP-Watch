<?php

  if (isset($_SESSION['user_id'])) {
    session_start();
    header('Location: inicio.php');
    exit();
  }
  require 'db.php';

  if (!empty($_POST['user']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT user, password FROM usuarios WHERE user = :user');
    $records->bindParam(':user', $_POST['user']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (is_array($results) && count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: inicio.php");
      exit();
    } else {
      $error_msg = 'Lo sentimos, esas credenciales no coinciden';
    }        
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="shortcut icon" href="../img/favicon_utp_watch.png" type="image/x-icon">

  <title>UTP Watch</title>
</head>
<body>

  <div class="contenedor_datos">
    <div class="imagen">
      <!-- aquí se colocaría la imagen -->
    </div>
    <div class="datos">
      <div class="registro_entrada">
        <form action="index.php" method="post">
          <h2 style="color:var(--blue);">Iniciar Sesión</h2>
          <input type="text" name="user" id="" class="entry" placeholder="Nombre Usuario">
          <input type="password" name="password" class="entry" id="" placeholder="Contraseña">
          <div id="error-msg" style="color: red; margin-bottom: 20px;"><?php echo isset($error_msg) ? $error_msg : ''; ?></div>
          <button type="submit" name="login" class="botones">Ingresar</button>
        </form>
        <button class="botones" onclick="window.location='registro.php'">Resgistrate</button>
        <a href="#">¿Olvidaste tu contraseña?</a>
        <script>
          // Mostrar el mensaje de error si existe
          var errorMsgEl = document.getElementById('error-msg');
          if (errorMsgEl.innerHTML.trim() !== '') {
            errorMsgEl.style.display = 'block';
          }
        </script>
      </div>
    </div>
  </div>
</body>
</html>