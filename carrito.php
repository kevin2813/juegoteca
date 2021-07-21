<?php
    session_start();
    include "util/conexion.php";
    if(isset($_GET['id']) && ($_GET['id'] != '')) {
        if(isset($_GET['action'])  && ($_GET['action'] != '')) {
            if($_GET['action'] == 'delete') {
                foreach($_SESSION['shopping_cart'] as $keys => $values) {
                    if($values['id'] == $_GET['id']){
                        unset($_SESSION['shopping_cart'][$keys]);
                        echo '<script>alert("Juego quitado del carrito!");</script>';
                        echo '<script>window.location="carrito.php";</script>';
                    }
                }
            }
        } else {
            $id = $_GET['id'];
            $sql = "SELECT * FROM productos WHERE id=$id";
            $result = $conn->query($sql);
            $item = $result->fetch_assoc();
            if(isset($_SESSION['shopping_cart'])){
                $item_array_id = array_column($_SESSION['shopping_cart'], 'id');
                if(!in_array($_GET['id'], $item_array_id)){
                    $count = count($_SESSION['shopping_cart']);
                    $item_array = array(
                        'id'            =>  $item['id'],
                        'nombre'        =>  $item['nombre'],
                        'precio'        =>  $item['precio'],
                        'miniatura'        =>  $item['miniatura']
                    );
                    $_SESSION['shopping_cart'][$count] = $item_array;
                    echo '<script>alert("Juego añadido al carrito!");</script>';
                    echo '<script>window.location="carrito.php";</script>';
                } else {
                    echo '<script>alert("Juego ya añadido!");</script>';
                    echo '<script>window.location="carrito.php";</script>';
                }
            } else {
                $item_array = array(
                    'id'            =>  $item['id'],
                    'nombre'        =>  $item['nombre'],
                    'precio'        =>  $item['precio'],
                    'miniatura'        =>  $item['miniatura']
                );
                $_SESSION['shopping_cart'][0] = $item_array;
                echo '<script>alert("Juego añadido al carrito!");</script>';
                echo '<script>window.location="carrito.php";</script>';
            }
        }
    } else {
        if(!isset($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'] = [];
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/main.css">
    
    <title>Juegoteca</title>
</head>
<body>
    <div class="main-div container-fluid d-flex flex-column align-items-center">
        <h1 class="sz4 py-4 text-center text-white">Carrito</h1>
        <table class="table table-borderless w-75 text-white">
            <thead>
                <th scope="col">ID</th>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio (CLP)</th>
                <th scope="col"></th>
            </thead>
            <tbody>
            <?php
            $total = 0;

            foreach($_SESSION['shopping_cart'] as $item_s){
            ?>
                <tr>
                    <td class="align-middle"><?php echo $item_s['id'] ?></td>
                    <td class="align-middle">
                        <a href="juego.php?id=<?php echo $item_s['id'] ?>">
                            <img src="<?php echo $item_s['miniatura'] ?>" alt="img">
                        </a>
                    </td>
                    <td class="align-middle">
                        <a class="text-white" href="juego.php?id=<?php echo $item_s['id'] ?>"><?php echo $item_s['nombre'] ?></a>
                    </td>
                    <td class="align-middle">$<?php echo $item_s['precio'] ?></td>
                    <td class="align-middle">
                        <form action="DELETE"></form>
                        <a role="button" class="btn btn-danger btn-lg" href="carrito.php?action=delete&id=<?php echo $item_s['id'] ?>">Quitar del carrito</a>
                    </td>
                </tr>
            <?php
                $total += $item_s['precio'];
            }
            ?>
                <tr>
                    <td class="align-middle"></td>
                    <td class="align-middle"></td>
                    <td class="font-weight-bold">Total</td>
                    <td class="align-middle">$<?php echo $total ?></td>
                    <td class="align-middle"></td>
                </tr>
            </tbody>
        </table>
        <a role="button" class="btn btn-primary btn-lg m-2" href="pagar.php">Continuar al pago</a>
        <a role="button" class="btn btn-light btn-lg py-1 m-2" href="index.php">Volver</a>
    </div>
</body>
</html>