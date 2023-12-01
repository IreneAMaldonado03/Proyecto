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
   $sql = "SELECT * FROM registros WHERE email='$username' AND password='$password'";
   $resultado = mysqli_query($conn, $sql);

   if (mysqli_num_rows($resultado) === 1) {

       $user = mysqli_fetch_assoc($resultado);
       if (password_verify($password, $email['password'])) {

           $_SESSION['username'] = $user['email'];
           $_SESSION['name'] = $user['name'];
           $_SESSION['id'] = $user['id'];

           header("Location: inicio.php");
           exit();

       } else {

           header("Location: iSesion.php?error=Credenciales invalidas, por favor revise su escritura");
           exit();

       }
   } else {

       header("Location: iSesion.php?error=Usuario no encontrado");
       exit();

   }

} else {

   header("Location: iSesion.php");
   exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <title>Inicio Sesion</title>
</head>
<body>
<section id="inicio_de_sesion">
   <h2>Inicio de sesión</h2>
   <form action="iSesion.php" method="post">
     <input type="email" name="email" id="email" placeholder="Correo electrónico">
     <input type="password" name="password" id="password" placeholder="Contraseña">
     <button type="submit">Iniciar sesión</button>
   </form>
 </section>
</body>
</html>