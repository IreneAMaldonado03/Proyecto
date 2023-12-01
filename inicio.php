<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>
    
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Inicio</title>
    </head>
    <body>
        <h1>Inicio</h1>
        <main>
            <a href="cSesion.php" class="logout-button">Cerrar sesión</a>
            <div class="content">
                <h2>Registros</h2>
                <div class="table-container">
                    <?php 
                    include 'tabla.php';
                    ?>
                </div>
            </div>
        </main>
    </body>
    </html>
    
    <?php
    } else {
        header("Location: sesion.php");
        exit();
    }
?>