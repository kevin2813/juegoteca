<?php
    include "util/conexion.php";
    if(!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $comentario = $_POST['comentario'];
        $fecha = date("Y-m-d H:i:s");

        $sql = "INSERT INTO contactos ";
        $sql .= "(nombre, correo, telefono, comentario, fecha) ";
        $sql .= "VALUES ('$nombre','$correo','$telefono','$comentario','$fecha')";
        $result = $conn->query($sql);
        if($result === TRUE) {
            echo '<script>alert("Comentario enviado correctamente!");</script>';
            echo '<script>window.location="atencion_cliente.php";</script>';
        } else {
            echo '<script>alert("Error al intentar enviar comentario! ERROR: ' . $result . ');</script>';
            echo '<script>window.location="atencion_cliente.php";</script>';
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
    <div class="main-div container-fluid flex-column align-items-center text-white w-75">
        <h1 class="sz4 py-4 text-center">Atención al cliente</h1>
        <form action="atencion_cliente.php" method="POST" id="formComentario">
            <div class="row w-75 text-center mx-auto">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="from-group">
                        <label for="comentario">Comentario</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="4"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg mt-4">Enviar</button>
            </div>
        </form>
        <div class="text-center">
            <a role="button" class="btn btn-light btn-lg py-1 mt-3" href="index.php">Volver</a>
        </div>
    </div>
</body>
</html>