<?php
    session_start();
    include "util/conexion.php";
    include "util/ultimos_juegos.php" // carga ultimos 3 juegos de la BD en $games ([])
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
    <a role="button" class="text-danger mr-2 my-auto" href="ingreso.php?action=logout">Cerrar sesion</a>
    <p class="text-success ml-1 mr-4 my-auto"><?php echo $_SESSION['user']['apodo'] ?></p>
    <p class="text-center text-success my-auto">Bienvenid@</p>
    <?php
      if($_SESSION['user']['tipo'] == 'admin') {
    ?>
      <a role="button" class="btn btn-primary text-white mr-2" href="util/crud/panel.php">Panel admin</a>
    <?php
      }
    ?>
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
    <a class="main-brand" href="#">
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
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleControls" data-slide-to="1"></li>
      <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="juego.php?id=<?php echo $games[0]['id'] ?>">
          <img class="d-block w-75" src="<?php echo $games[0]['imagen'] ?>" width="400" height="400">
        </a>
      </div>
      <div class="carousel-item">
        <a href="juego.php?id=<?php echo $games[1]['id'] ?>">
          <img class="d-block w-75" src="<?php echo $games[1]['imagen'] ?>" width="400" height="400">
        </a>
      </div>
      <div class="carousel-item">
        <a href="juego.php?id=<?php echo $games[2]['id'] ?>">
          <img class="d-block w-75" src="<?php echo $games[2]['imagen'] ?>" width="400" height="400">
        </a>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        
  <p class="text-center">Encuentra los mejores juegos en la plataforma que utilices!</p>
  <div class="container-fluid d-flex flex-column align-items-center">
    <div class="container">
      <p class="bg-primary text-white text-center">ULTIMAS NOVEDADES.</p>
    </div>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <th> 
            <a href="juego.php?id=<?php echo $games[0]['id'] ?>">
              <img src="<?php echo $games[0]['miniatura'] ?>" class="rounded" alt="game">
              <p class="text-center text-white"><?php echo $games[0]['nombre'] ?></p>
            </a>
            <p class="bg-success text-white text-center">Precio Oferta $<?php echo $games[0]['precio'] ?>.</p>
            <div class="text-center">
              <a role="button" class="btn btn-primary" href="carrito.php?id=<?php echo $games[0]['id'] ?>">Añadir al Carro</a>
            </div>
          </th>
          <th> 
          <a href="juego.php?id=<?php echo $games[1]['id'] ?>">
              <img src="<?php echo $games[1]['miniatura'] ?>" class="rounded" alt="game">
              <p class="text-center text-white"><?php echo $games[1]['nombre'] ?></p>
            </a>
            <p class="bg-success text-white text-center">Precio Oferta $<?php echo $games[1]['precio'] ?>.</p>
            <div class="text-center">
              <a role="button" class="btn btn-primary" href="carrito.php?id=<?php echo $games[1]['id'] ?>">Añadir al Carro</a>
            </div>
          </th>
          <th> 
            <a href="juego.php?id=<?php echo $games[2]['id'] ?>">
              <img src="<?php echo $games[2]['miniatura'] ?>" class="rounded" alt="game">
              <p class="text-center text-white"><?php echo $games[2]['nombre'] ?></p>
            </a>
            <p class="bg-success text-white text-center">Precio Oferta $<?php echo $games[2]['precio'] ?>.</p>
            <div class="text-center">
              <a role="button" class="btn btn-primary" href="carrito.php?id=<?php echo $games[2]['id'] ?>">Añadir al Carro</a>
            </div>
          </th>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>