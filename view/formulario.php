<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit();
}
?>
<form action='../controller/registro.php' method='POST' role='form' aria-label='Formulario de registro de usuario'>
  <label for='nombre'>Nombre:</label>
  <input type='text' name='nombre' id='nombre' required aria-label='Nombre del usuario'>
  <input type='submit' value='Registrar' role='button' aria-label='Registrar usuario'>
</form>