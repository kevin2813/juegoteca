<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd = "test";

//Creamos la conexion
$conn = new mysqli($servername, $username, $password, $bd);


//verificamos la conexion
if ($conn->connect_error){
    die("Conevion fallida: " . $conn->connect_error);
}

echo '<script>console.log("Conexion establecida");</script>';

?>