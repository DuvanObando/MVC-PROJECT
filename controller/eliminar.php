<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit();
}
include("../model/conexion.php");
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $query = "DELETE FROM usuarios WHERE id=$id";
    if (mysqli_query($conexion, $query)) {
        echo "Usuario eliminado.";
    } else {
        echo "Error al eliminar.";
    }
} else {
    echo "ID no especificado.";
}
?>
