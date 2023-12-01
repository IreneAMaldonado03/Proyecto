<?php
  $username = $_POST['username'];
  $password = $_POST['password'];

  $servername = "localhost";
  $database = "my_database";
  $db_username = "root";
  $db_password = "";

  // Conexión
  $conn = new mysqli($servername, $db_username, $db_password, $database);

  // Verificar conexión
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Insertar datos en la base de datos
  $sql = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";

  if ($conn->query($sql) === TRUE) {
      echo "Registro exitoso";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  ?>