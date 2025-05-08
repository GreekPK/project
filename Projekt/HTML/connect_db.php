<?php 
/*session_start();
$pdo = new PDO('mysql:host=localhost;dbname=projekt', 'root', '');*/

$servername = "localhost";
$username = "root";
$password = "";
$database = "projekt"; // Deine Datenbank
 
$mysqli = new mysqli($servername, $username, $password, $database);
 
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}
?>