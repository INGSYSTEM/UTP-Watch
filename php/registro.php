<?php
  require 'db.php';

  $message = '';

  if (!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (user, email, password) VALUES (:user, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user', $_POST['user']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Haz creado de manera exitosa un nuevo usuario';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta: ' . $stmt->errorInfo()[2];
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
  <link rel="stylesheet" href="../css/registro.css">
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
        <!-- aquí se colocarían los datos -->
        <span style="text-justify: center; margin-bottom: 20px;">Registrate</span>
        <form action="registro.php" method="POST" onsubmit="return validarFormulario()">
          <input type="text" name="user" class="entry" placeholder="Nombre Usuario">
          <input type="email" name="email" class="entry" placeholder="ejemplo@utpwatch.com">
          <input type="password" name="password" id="contraseña" class="entry" placeholder="Contraseña">
          <input type="password" name="repetir_password" id="repetir_contraseña" class="entry" placeholder="Repetir la Contraseña">
          <button type="submit" class="botones">Guardar</button>
        </form>
        <button type="submit" class="botones" onclick="window.location='index.php'">Iniciar Sesión</button>
        <a href="#">¿Olvidaste tu contraseña?</a>
      </div>
    </div>
  </div>
  
  <script>
  function validarFormulario() {
    // Obtener los valores ingresados en los campos Contraseña y Repetir la Contraseña
    var contraseña = document.getElementById("contraseña").value;
    var repetirContraseña = document.getElementById("repetir_contraseña").value;
    
    // Validar si las contraseñas son iguales
    if (contraseña !== repetirContraseña) {
      alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
      return false; // Evita que se envíe el formulario
    }
    
    return true; // Permite que se envíe el formulario
  }
  </script>  
</body>
</html>