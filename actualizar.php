<?php
 $id = $_POST['id'];
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

 // Consulta SQL para actualizar datos
 $sql = "UPDATE Users SET username='$username', password='$password' WHERE id=$id";

 if ($conn->query($sql) === TRUE) {
     echo "Actualización exitosa";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $conn->close();
 ?>