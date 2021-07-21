<?php
    session_start();
    include "util/conexion.php";
    if(isset($_GET['plataforma']) && ($_GET['plataforma'] != '')) {
      $plataforma = $_GET['plataforma'];
    } else {
      echo '<script>window.location="index.php";</script>';
    }
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
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
  <link rel="stylesheet" href="styles/main.css">
</head>
<body>
  <div class="d-flex flex-row-reverse pt-2">
  <?php
    if(isset($_SESSION['user'])) {
    ?>
    <p class="text-primary ml-1 mr-5"><?php echo $_SESSION['user']['correo'] ?></p>
    <p class="text-center text-success">Ingresado con</p>
    <?php
    } else {
    ?>
    <a role="button" class="btn btn-primary btn-sm ml-2 mr-5" href="registro.php">Registrarse</a>
    <a role="button" class="btn btn-primary btn-sm ml-2 mr-2" href="ingreso.php">Ingresar</a>
    <?php
    }
    ?>
  </div>
  
  <div class="fluid-container p-3 mb-3 mx-auto text-center w-75">
    <a class="main-brand" href="index.php">
      <img src="res/img/icons/brand.png" class="d-inline-block align-middle" alt="">
      Juegoteca
    </a>
  </div>
  <div class="main-primary-buttons-div">
    <div class="main-primary-buttons">
      <div class="btn-group">
        <a role="button" class="btn btn-primary" href="index.php">INICIO</a>
        <a role="button" class="btn btn-primary" href="juegos.php?plataforma=pc">PC</a>
        <a role="button" class="btn btn-primary" href="juegos.php?plataforma=xbox_one">XBOX ONE</a>
        <a role="button" class="btn btn-primary" href="juegos.php?plataforma=xbox">XBOX</a>
        <a role="button" class="btn btn-primary" href="juegos.php?plataforma=ps5">PS5</a>
        <a role="button" class="btn btn-primary" href="juegos.php?plataforma=ps4">PS4</a>
        <a role="button" class="btn btn-primary" href="juegos.php?plataforma=switch">SWITCH</a>
        <a role="button" class="btn btn-primary" href="juegos.php?plataforma=wii_u">WII U</a>
        <a role="button" class="btn btn-primary" href="atencion_cliente.php">ATENCION AL CLIENTE</a>
        <a role="button" class="btn btn-primary" href="carrito.php">MI CARRO DE COMPRAS</a>
      </div>
    </div>
  </div>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <div class="container">
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col"><p class="bg-primary text-white text-center">Juegos de <?php echo $plataforma ?></p></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM productos WHERE plataforma like '%$plataforma%'";
        $result = $conn->query($sql);

        while($item = $result->fetch_array(MYSQLI_ASSOC)){
        ?>
          <tr> 
            <th scope="row">
              <a href="juego.php?id=<?php echo $item['id'] ?>">
                <img src="<?php echo $item['miniatura'] ?>" class="rounded" alt="<?php echo $item['nombre'] ?>">
                <p class="text-center text-white"><?php echo $item['nombre'] ?></p>
              </a>
              <div class="container w-25">
                <p class="bg-success text-white text-center">Precio Oferta $<?php echo $item['precio'] ?>.</p>
              </div>
              <div class="text-center">
                <a role="button" class="btn btn-primary" href="carrito.php?id=<?php echo $item['id'] ?>">Añadir al Carro</a>
              </div>
            </th>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>