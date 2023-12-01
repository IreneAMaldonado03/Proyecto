<?php
include 'bdatos.php';

  $id = $_POST['id'];
  $n_name = $_POST['new_name'];
  $n_email = $_POST['new_email'];
  
  $sql = "UPDATE Users SET names='$n_name', email='$n_email' WHERE id=$id";
  $result = $conn->query($sql);

  if ($result) {
      echo "Registro actualizado con éxito";
  } else {
      echo "Hubo un error al actualizar el registro: " . $conn->error;
  }

$conn->close();
header("Location: inicio.php");
?>