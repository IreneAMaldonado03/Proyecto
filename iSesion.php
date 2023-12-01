<?php

<html>
<section id="inicio_de_sesion">
    <h2>Inicio de sesión</h2>
    <form action="iSesion.php" method="post">
      <input type="email" name="correo_electronico" placeholder="Correo electrónico">
      <input type="password" name="contraseña" placeholder="Contraseña">
      <button type="submit">Iniciar sesión</button>
    </form>
  </section>
</html>

  $username = $_POST['username'];
  $password = $_POST['password'];

  $servername = "localhost";
  $database = "my_database";
  $db_username = "root";
  $db_password = "";

  // Crear conexión
  $conn = new mysqli($servername, $db_username, $db_password, $database);

  // Verificar conexión
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Verificar datos
  $sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "Inicio de sesión exitoso";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  ?>