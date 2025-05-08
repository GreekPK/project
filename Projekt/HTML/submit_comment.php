<?php
include("../HTML/connect_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nutzername = $_POST["Nutzername"] ?? 'Anonymous';
    $nachricht = $_POST["Nachricht"] ?? '';

    $stmt = $conn->prepare("INSERT INTO kommentare (Nutzername, Nachricht) VALUES (?, ?)");
    $stmt->bind_param("ss", $nutzername, $nachricht);

    if ($stmt->execute()) {
        echo "Gespeichert";
    } else {
        echo "Fehler beim Speichern!";
    }
    $stmt->close();
}
?>