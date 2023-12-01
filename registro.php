<?php
  include 'bdatos.php' ;

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  // Verificar conexión
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Insertar datos en la base de datos
  $sql = "INSERT INTO registro (names, email, pass) VALUES ('$name','$email', '$password')";

  if ($conn->query($sql) === TRUE) {
      echo "Registro exitoso";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  header("Location: /idx2.php");
  ?>