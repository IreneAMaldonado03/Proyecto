<?php

session_start();
include 'bdatos.php';

// Funcion para validar el usuario
function validate($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

// Verifica los datos del incio de Sesion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $email = validate($_POST['email']);
   $password = validate($_POST['password']);
   $sql = "SELECT * FROM registro WHERE email='$email' AND pass='$password'";
   $resultado = mysqli_query($conn, $sql);

   if (mysqli_num_rows($resultado) === 1) {

       $user = mysqli_fetch_assoc($resultado);
       if (password_verify($password, $user['password'])) {

           $_SESSION['email'] = $user['email'];
           $_SESSION['names'] = $user['names'];
           $_SESSION['id'] = $user['id'];

           header("Location: inicio.php");
           exit();

       } else {

           header("Location: idx2.php?error=Credenciales invalidas, por favor revise su escritura");
           exit();

       }
   } else {

       header("Location: idx2.php?error=Usuario no encontrado");
       exit();

   }

} else {

   header("Location: idx2.php");
   exit();

}