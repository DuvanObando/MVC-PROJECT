<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit();
}
include("../model/conexion.php");
$resultado = mysqli_query($conexion, "SELECT * FROM usuarios");
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo $fila["nombre"] . " ";
    echo '<a href="editar.php?id=' . $fila["id"] . '">Editar</a> ';
    echo '<a href="eliminar.php?id=' . $fila["id"] . '" onclick="return confirm(\'¿Seguro que deseas eliminar?\')">Eliminar</a><br>';
}
?>
