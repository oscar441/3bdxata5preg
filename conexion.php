<?php
$dsn = "mysql:host=TU_HOST_XATA;dbname=TU_BASE_DE_DATOS";
$usuario = "TU_USUARIO_XATA";
$contraseña = "TU_CONTRASEÑA_XATA";

try {
    $conn = new PDO($dsn, $usuario, $contraseña);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}
?>
