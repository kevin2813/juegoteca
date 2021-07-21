<?php
    session_start();
    include "util/conexion.php";
    if(!empty($_POST)) {
      $id_juego = $_POST['id_juego'];
      $id_usuario = $_POST['id_usuario'];
      $apodo = $_POST['apodo'];
      $comentario = $_POST['comentario'];
      $fecha = date("Y-m-d H:i:s");

      $sql = "INSERT INTO comentarios ";
      $sql .= "(id_juego, id_usuario, apodo, comentario, fecha) ";
      $sql .= "VALUES ('$id_juego', '$id_usuario', '$apodo', '$comentario','$fecha')";
      $result = $conn->query($sql);
      if($result === TRUE) {
          echo '<script>alert("Comentario realizado correctamente!");</script>';
          echo '<script>window.location="juego.php?id='. $id_juego .'";</script>';
      } else {
          echo '<script>alert("Error al intentar crear comentar! ERROR: ' . $result . ');</script>';
          echo '<script>window.location="juego.php?id='. $id_juego .'";</script>';
      }
    }

    if(isset($_GET['id']) && ($_GET['id'] != '')) {
        $id = $_GET['id'];

        if(isset($_GET['action']) && ($_GET['action'] == 'like')) {
          $sql_2 = "UPDATE comentarios
          SET likes = likes + 1
          WHERE id_juego = $id AND id_usuario = {$_GET['id_usuario']}";
  
          $result2 = $conn->query($sql_2);
  
          if($result2 === TRUE) {
          echo'<script type="text/javascript">
              alert("Like indicado correctamente");
              window.location.href="juego.php?id='. $id .'";
              </script>';
          } else {
              echo '<script>alert("Error al intentar dar like ERROR: ' . $result2 . ');</script>';
              echo '<script>window.location="juego.php?id='. $id .'";</script>';
          }
        }

        $sql = "SELECT * FROM productos WHERE id=$id";
        $result = $conn->query($sql);
        $item = $result->fetch_assoc();
        if(!$item) {
            echo '<script>alert("Juego no encontrado!");</script>';
            echo '<script>window.location="index.php";</script>';
        }

        $sql = "SELECT * FROM comentarios WHERE id_juego=$id";
        $result = $conn->query($sql);
    } else {
        echo '<script>alert("Id no especificada!");</script>';
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

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="styles/main.css">
</head>
<body>
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
  <?php
    $categorias = preg_split("/[\s,]+/", $item['categoria']);
  ?>
  <div class="container align-items-center h-100">
    <p class="bg-primary text-white text-center my-4">Detalles de <?php echo $item['nombre'] ?></p>
    <div class="conatainer row text-center mx-auto">
      <div class="col">
          <img src="<?php echo $item['miniatura'] ?>" class="rounded" alt="<?php echo $item['nombre'] ?>">
      </div>
      <div class="col">
          <p class="text-center text-info"><?php echo $item['nombre'] ?></p>
          <p class="text-center text-white"><?php echo $item['descripcion'] ?></p>
          <?php
          foreach($categorias as $cat) {
          ?>
          <p class="text-center text-white-50 py-0 d-inline">[<?php echo $cat ?>]</p>
          <?php
          }
          ?>
      </div> 
    </div>
    <div class="conatainer row text-center mx-auto">
      <div class="col">
          <h4 class="text-white mx-auto py-1 d-inline">Precio oferta </h4>
          <h4 class="text-success font-weight-bold mx-auto py-1 d-inline">$<?php echo $item['precio'] ?></h4>
      </div>
      <div class="col">
          <a role="button" class="btn btn-primary" href="carrito.php?id=<?php echo $item['id'] ?>">Añadir al Carro</a>
      </div> 
    </div>
    <!---->
  

    
    <!---->
    <div class="fluid-container h-auto rounded border border-info my-4">
      <p class="bg-primary text-white text-center">Comentarios de <?php echo $item['nombre'] ?></p>
      <?php
      if(isset($_SESSION['user'])) {
      ?>
      <form action="juego.php" method="POST" id="formComentario">
        <input type="hidden" id="id_juego" name="id_juego" value="<?php echo $item['id'] ?>">
        <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['user']['id'] ?>">
        <input type="hidden" id="apodo" name="apodo" value="<?php echo $_SESSION['user']['apodo'] ?>">
        <div class="form-group w-75 mx-auto">
          <label for="comentario" class="text-white mx-auto">Escribe un comentario de este juego</label>
          <textarea class="form-control" id="comentario" name="comentario" ></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary mt-1">Comentar</button>
        </div>
      </form>
      <?php
      } else {
      ?>
      <div class="text-center text-white">
        <p class="text-warning d-inline">Debes ingresar con tu cuenta para comentar</p>
        <a role="button" class="btn btn-info" href="ingreso.php">Ingresar</a>
      </div>
      <?php
      }
      ?>
      <?php
      while($comentario = $result->fetch_array(MYSQLI_ASSOC)){
      ?>
      <div class="container row mx-auto mt-5 mb-2 pt-4 border-top border-info">
        <div class="col-4 my-auto">
            <img src="https://image.flaticon.com/icons/png/128/16/16363.png" class="" alt="user">
            <p class="bg-dark text-white text-center w-25 mx-auto py-1"><?php echo $comentario['apodo'] ?></p>
        </div>
        <div class="col-7">
          <div class="row">
            <p class="text-justify text-white"><?php echo $comentario['comentario'] ?></p>
          </div>
          <div class="row">
            <p class="text-white-50 d-inline">( <?php echo $comentario['likes'] ?> )</p>
            <a role="button" class="d-inline ml-1" href="juego.php?action=like&id=<?php echo $comentario['id_juego'] ?>&id_usuario=<?php echo $comentario['id_usuario'] ?>"><span class="material-icons">thumb_up</span></a>
            <p class="d-inline text-info ml-auto align-middle"><?php echo $comentario['fecha'] ?></p>
          </div>
        </div> 
      </div>
      <?php
      }
      ?>
    </div>
    
  </div>
</body>
</html>