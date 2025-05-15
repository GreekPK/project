<?php
session_start();
include("connect_db.php");

if (isset($_POST['reset'])) {
    $email = $_POST['EMail'] ?? '';
    $neuesPasswort = $_POST['neuesPasswort'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ungültige E-Mail-Adresse.";
    } elseif (strlen($neuesPasswort) < 6) {
        echo "Das neue Passwort muss mindestens 6 Zeichen lang sein.";
    } else {
        $passwortHash = password_hash($neuesPasswort, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("UPDATE benutzer SET Passwort = ? WHERE EMail = ?");
        $stmt->bind_param("ss", $passwortHash, $email);

        if ($stmt->execute() && $stmt->affected_rows > 0) {
            echo "Passwort erfolgreich zurückgesetzt. <a href='register.php'>Zum Login</a>";
        } else {
            echo "Diese E-Mail wurde nicht gefunden.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Passwort vergessen</title>
    <link rel="stylesheet" href="/projekt/Projekt/CSS/register.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-box login">
            <form method="POST" action="">
                <h1>Passwort zurücksetzen</h1>
                <div class="input-box">
                    <input type="email" name="EMail" placeholder="E-Mail" required>
                </div>
                <div class="input-box">
                    <input type="password" name="neuesPasswort" placeholder="Neues Passwort" required>
                </div>
                <button type="submit" name="reset" class="btn">Zurücksetzen</button>
            </form>
        </div>
    </div>
</body>
</html>
