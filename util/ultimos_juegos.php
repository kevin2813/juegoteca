<?php
    include "conexion.php";
    $sql = "SELECT * FROM productos ORDER BY id DESC LIMIT 3";
    $result = $conn->query($sql);
    $games = [];
    while($item = $result->fetch_array(MYSQLI_ASSOC)){
      $games[] = $item;
    }
?>