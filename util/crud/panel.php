<?php
    include "../conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JuegoTeca</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../styles/main.css">
</head>
<body>
    <div class="main-div container-fluid d-flex flex-column align-items-center">
        <h1 class="sz5 pb-2 text-white">Productos</h1>
        <table class="table w-75 text-white">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);

            while($item = $result->fetch_array(MYSQLI_ASSOC)){
            ?>
                <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['nombre'] ?></td>
                    <td><?php echo $item['precio'] ?></td>
                    <td>
                        <a role="button" class="btn btn-success btn-lg" href="ver.php?id=<?php echo $item['id'] ?>">Ver</a>
                        <a role="button" class="btn btn-info btn-lg" href="editar.php?id=<?php echo $item['id'] ?>">Editar</a>
                        <a role="button" class="btn btn-danger btn-lg" href="eliminar.php?id=<?php echo $item['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <div class="container-fluid d-flex flex-row align-items-center mt-5 w-75">
            <a role="button" class="btn btn-primary btn-lg" href="../../index.php">Volver</a>
            <a role="button" class="btn btn-primary btn-lg mx-auto" href="crear.php">Crear producto</a>
        </div>
    </div>
</body>
</html>