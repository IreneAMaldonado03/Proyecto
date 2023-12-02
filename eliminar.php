<?php
include 'bdatos.php';

 $id = $_POST['id'];
 $sql = "DELETE FROM registro WHERE id=$id";

 $result = $conn->query($sql);

  if ($result) {
      echo "Registro eliminado con éxito";
  } else {
      echo "Hubo un error al eliminar el registro: " . $conn->error;
  }

 $conn->close();
 header("Location: inicio.php");

?>