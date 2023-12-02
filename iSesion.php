<?php
session_start();
include 'bdatos.php';

if (isset($_POST['email']) && isset($_POST['pass'])) {
// Funcion para validar el usuario
function validate($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

// Verifica los datos del incio de Sesion


   $email =  validate($_POST['email']);
   $pass = validate($_POST['pass']);
   $sql = "SELECT * FROM registro WHERE email='$email' AND pass='$pass'";
   $resultado = mysqli_query($conn, $sql);

   if (mysqli_num_rows($resultado) === 1) {

       $user = mysqli_fetch_assoc($resultado);
       if ($user['email']===$email && $user['pass'] === $pass){//password_verify($pass, $user['pass'])) {

           $_SESSION['email'] = $user['email'];
           $_SESSION['names'] = $user['names'];
           $_SESSION['id'] = $user['id'];

           header("Location: inicio.php");
           exit();

       } else {

           header("Location: idx2.php?error=Credenciales invalidas");
           exit();

       }
   } else {

       header("Location: idx2.php?error=Usuario no encontrado");
       exit();

   }

} else {

   header("Location: 'idx2.php'");
   exit();

}
