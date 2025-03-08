<?php
require 'conexion.php'; // Conexión a Xata

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cuenta = $_POST['cuenta'];

    // Respuestas procesadas
    $respuestas = [
        'p1' => $_POST['p1'] ?? 'No contestada',
        // Añadir más preguntas
    ];

    $correctas = 0;
    $incorrectas = 0;
    $no_contestadas = 0;

    foreach ($respuestas as $pregunta => $respuesta) {
        if ($respuesta === '2') { // Respuesta correcta (cambiar según la pregunta)
            $correctas++;
        } elseif ($respuesta === 'No contestada') {
            $no_contestadas++;
        } else {
            $incorrectas++;
        }
    }

    $stmt = $conn->prepare("INSERT INTO respuestas (nombre, cuenta, correctas, incorrectas, no_contestadas) VALUES (:nombre, :cuenta, :correctas, :incorrectas, :no_contestadas)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':cuenta', $cuenta);
    $stmt->bindParam(':correctas', $correctas);
    $stmt->bindParam(':incorrectas', $incorrectas);
    $stmt->bindParam(':no_contestadas', $no_contestadas);

    if ($stmt->execute()) {
        echo "Respuestas guardadas correctamente.";
    } else {
        echo "Error al guardar las respuestas.";
    }
}
?>
