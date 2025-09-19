<?php
include("../model/conexion.php");
$nombre = htmlspecialchars($_POST["nombre"]);
$query = "INSERT INTO usuarios(nombre) VALUES('$nombre')";
mysqli_query($conexion, $query);
echo "Usuario registrado.";
?>