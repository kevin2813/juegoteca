<?php
    include "../conexion.php";
    if($_POST) {
        $id = $_POST['id'];

        $sql_2 = "DELETE FROM producto
        WHERE id = $id";

        $result2 = $conn->query($sql_2);

        echo'<script type="text/javascript">
            alert("Juego eliminado!");
            window.location.href="../../index.php";
            </script>';
    }
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <style>
        .main-div {
            background-image: url("https://www.giannicomusic.net/wp-content/uploads/2017/01/dark-background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100%;
            min-height: 100vh;
            color: white;
        }

        .sz5 {
            font-size: 5rem;
        }

        .sz4 {
            font-size: 4rem;
        }

        .sz2 {
            font-size: 2rem;
        }
    </style>

    <title>Productos</title>
</head>
<body>
    <div class="main-div container-fluid text-center">
        <h1 class="sz4 pb-2">Seguro desea eliminar el siguiente producto?</h1>

        <?php
            $sql = "SELECT * FROM productos WHERE id = $id";
            $result = $conn->query($sql);
            $item = $result->fetch_assoc();
        ?>

        <form class="mx-auto w-50" action="eliminar.php" method="POST">
            <div class="form-group">
                <span class="mt-4">ID</span>
                <input class="form-control" id="id" name="id" style="text-align: center;" type="text" value="<?php echo $id ?>" readonly>
            </div>
            <div class="form-group">
                <span class="mt-4">Nombre</span>
                <input class="form-control" id="nombre" name="nombre" style="text-align: center;" type="text" value="<?php echo $item['nombre'] ?>" disabled>
            </div>
            <div class="form-group">
                <span class="mt-4">Precio</span>
                <input class="form-control" id="precio" name="precio" style="text-align: center;" type="text" value="<?php echo $item['precio'] ?>" disabled>
            </div>
            <div class="form-group">
                <span class="mt-4">Imagen</span>
                <input class="form-control" id="imagen" name="imagen" style="text-align: center;" type="text" value="<?php echo $item['imagen'] ?>" disabled>
            </div>
            <div class="form-group">
                <span class="mt-4">Categoria</span>
                <input class="form-control" id="categoria" name="categoria"style="text-align: center;" type="text" value="<?php echo $item['categoria'] ?>" disabled>
            </div>
            <div class="form-group">
                <span class="mt-4">Descripcion</span>
                <input class="form-control" id="descripcion" name="descripcion" style="text-align: center;" type="text" value="<?php echo $item['descripcion'] ?>" disabled>
            </div>
            <div class="form-group">
                <span class="mt-4">Plataforma</span>
                <input class="form-control" id="plataforma" name="plataforma" style="text-align: center;" type="text" value="<?php echo $item['plataforma'] ?>" disabled>
            </div>
            <div class="form-group">
                <span class="mt-4">Cantidad</span>
                <input class="form-control" id="cantidad" name="cantidad" style="text-align: center;" type="text" value="<?php echo $item['cantidad'] ?>" disabled>
            </div>
            <div class="form-group">
                <div class="container-fluid d-flex flex-row align-items-center mt-5">
                    <a role="button" class="btn btn-primary btn-lg" href="panel.php">Volver</a>
                    <button class="btn btn-success btn-lg ml-auto" type="submit">Eliminar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>