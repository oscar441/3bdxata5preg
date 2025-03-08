<?php
require 'conexion.php'; // Conexión a Xata

$query = $conn->query("SELECT * FROM respuestas");
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultados as $resultado) {
    echo "<h3>Nombre: {$resultado['nombre']} - Número de Cuenta: {$resultado['cuenta']}</h3>";
    echo "<p>Correctas: {$resultado['correctas']}, Incorrectas: {$resultado['incorrectas']}, No contestadas: {$resultado['no_contestadas']}</p>";
}
?>
