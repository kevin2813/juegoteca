<?php
    session_start();
    include "util/conexion.php";
    if(isset($_GET['action']) && $_GET['action'] != '') {
        unset($_SESSION['user']);
        echo '<script>alert("Sesion cerrada correctamente!");</script>';
        echo '<script>window.location="index.php";</script>';
    }

    if(!empty($_POST)) {
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];

        $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
        $result = $conn->query($sql);
        $item = $result->fetch_assoc();
        if(!$item) {
            echo '<script>alert("Correo no registrado!");</script>';
            echo '<script>window.location="ingreso.php";</script>';
        } else {
            if($item['clave'] != $clave) {
                echo '<script>alert("Contraseña incorrecta!");</script>';
                echo '<script>window.location="ingreso.php";</script>';
            } else {
                $item_array = array(
                    'id'            =>  $item['id'],
                    'nombre'        =>  $item['nombre'],
                    'apellido'      =>  $item['apellido'],
                    'apodo'         =>  $item['apodo'],
                    'correo'        =>  $item['correo'],
                    'tipo'          =>  $item['tipo']
                );
                $_SESSION['user'] = $item_array;
                echo '<script>alert("Ingresado correctamente! Hola '. $item['nombre'] .'!");</script>';
                echo '<script>window.location="index.php?usuario='. $item['nombre'] .'";</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/main.css">
    
    <title>Juegoteca</title>
</head>
<body>
    <div class="main-div container-fluid flex-column align-items-center text-white">
        <h1 class="sz4 py-4 text-center">Ingreso</h1>
        <form class="w-50 text-center mx-auto" action="ingreso.php" method="POST" id="formIngreso">
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg mt-4">Ingresar</button>
            </div>
        </form>
        <div class="text-center">
            <a role="button" class="btn btn-light btn-lg py-1 mt-3" href="index.php">Volver</a>
        </div>
    </div>
</body>
</html>