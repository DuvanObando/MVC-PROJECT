<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit();
}
include("../model/conexion.php");
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nombre"])) {
        $nombre = htmlspecialchars($_POST["nombre"]);
        $query = "UPDATE usuarios SET nombre='$nombre' WHERE id=$id";
        if (mysqli_query($conexion, $query)) {
            echo "Usuario actualizado.";
        } else {
            echo "Error al actualizar.";
        }
    } else {
        $resultado = mysqli_query($conexion, "SELECT nombre FROM usuarios WHERE id=$id");
        $usuario = mysqli_fetch_assoc($resultado);
        if ($usuario) {
            ?>
            <form method="POST">
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                <button type="submit">Actualizar</button>
            </form>
            <?php
        } else {
            echo "Usuario no encontrado.";
        }
    }
} else {
    echo "ID no especificado.";
}
?>
