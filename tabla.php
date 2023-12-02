<?php
include 'bdatos.php';
 // Verificar conexión
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 // Consulta para seleccionar datos
 $sql = "SELECT id, names, email FROM registro";
 $result = $conn->query($sql);

 // Verificar si hay resultados
 if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th></th><th></th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["names"]."</td><td>".$row["email"]."</td>";
        echo "<td><form class='bt-a' action='actualizar.php' method='post'><input type='hidden' name='id' value='".$row["id"]."'><input type='text' name='new_name' value='".$row["names"]."'><input type='text' name='new_email' value='".$row["email"]."'><input type='submit' value='Actualizar'></form></td>";
        echo "<td><form class='bt-e' action='eliminar.php' method='post'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' value='Eliminar'></form></td>";
    }
    echo "</table>";
 } else {
    echo "0 resultados";
 }

 $conn->close();
 ?>