<?php
session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    // Usuario y clave fijos para ejemplo
    if ($usuario === "admin" && $clave === "1234") {
        $_SESSION["usuario"] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        $mensaje = "Usuario o clave incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <main class="container">
    <h2>Iniciar sesión</h2>
    <form method="POST" role="form" aria-label="Formulario de inicio de sesión">
        <input type="text" name="usuario" placeholder="Usuario" required aria-label="Usuario"><br>
        <input type="password" name="clave" placeholder="Clave" required aria-label="Contraseña"><br>
        <button type="submit" role="button" aria-label="Entrar">Entrar</button>
    </form>
    <p style="color:red;"> <?php echo $mensaje; ?> </p>
    </main>
</body>
</html>
