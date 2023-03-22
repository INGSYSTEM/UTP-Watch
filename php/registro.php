<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="shortcut icon" href="../img/logo_utp_watch_sin_fondo.png" type="image/x-icon">
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
        <form action="data.php" method="POST" onsubmit="return validarFormulario()">
          <input type="text" name="usuario" class="entry" placeholder="Nombre Usuario">
          <input type="email" name="correo" class="entry" placeholder="ejemplo@utpwatch.com">
          <input type="password" name="contraseña" id="contraseña" class="entry" placeholder="Contraseña">
          <input type="password" name="repetir_contraseña" id="repetir_contraseña" class="entry" placeholder="Repetir la Contraseña">
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