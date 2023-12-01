<?php
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

 // Consulta SQL para seleccionar datos
 $sql = "SELECT id, username, password FROM Users";
 $result = $conn->query($sql);

 // Verificar si hay resultados
 if ($result->num_rows > 0) {
     echo "<table><tr><th>ID</th><th>Nombre de usuario</th><th>Contraseña</th></tr>";
     // Imprimir datos de cada fila
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
     }
     echo "</table>";
 } else {
     echo "0 resultados";
 }

 $conn->close();
 ?>