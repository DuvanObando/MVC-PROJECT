<?php
session_start();
if (!isset($_SESSION["usuario"])) {
	header("Location: login.php");
	exit();
}
include('view/formulario.php');
echo '<form method="POST" style="margin-top:10px;"><button type="submit" name="logout">Cerrar sesión</button></form>';
if (isset($_POST["logout"])) {
	session_destroy();
	header("Location: login.php");
	exit();
}
?>