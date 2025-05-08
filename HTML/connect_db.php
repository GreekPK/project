<?php 
/*session_start();
$pdo = new PDO('mysql:host=localhost;dbname=projekt', 'root', '');*/



$servername = "localhost";
$username = "root";
$password = "";
$database = "projekt"; // <-- Name deiner Datenbank

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}


?>