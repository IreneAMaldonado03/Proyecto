<?php
include 'bdatos.php';
 // Verificar conexión
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 // Consulta para seleccionar datos
 $sql = "SELECT id, name, email FROM Users";
 $result = $conn->query($sql);

 // Verificar si hay resultados
 if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Actualizar</th><th>Eliminar</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td>";
        echo "<td><form method='POST' action='actualizar.php'><input type='hidden' name='id' value='".$row["id"]."'><input type='text' name='new_name' placeholder='Nuevo nombre'><input type='text' name='new_email' placeholder='Nuevo email'><input type='submit' value='Actualizar'></form></td>";
        echo "<td><form method='POST' action='eliminar.php'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' value='Eliminar'></form></td></tr>";
    }
    echo "</table>";
 } else {
    echo "0 resultados";
 }

 $conn->close();
 ?>