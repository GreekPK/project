<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=projekt', 'root', '');
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sofort Spielen</title>
        <link href="../CSS/register.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../CSS/register.css">
        <link href="../Bilder/sofort spielen.png" rel="icon">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
    <?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
    $error = false;
    $Benutzername = isset($_POST['Benutzername']) ? $_POST['Benutzername']:"";
    $EMail = isset($_POST['EMail']) ? $_POST['EMail']:"";
    $Passwort = isset($_POST['Passwort']) ? $_POST['Passwort']:"";
   
  
    if(!filter_var($EMail, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($Passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM benutzer WHERE EMail = :EMail");
        $result = $statement->execute(array('EMail' => $EMail));
        $user = $statement->fetch();
        
        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }    
    }
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $Passwort_hash = password_hash($Passwort, PASSWORD_DEFAULT);
        
        $statement = $pdo->prepare("INSERT INTO benutzer (Benutzername, EMail, Passwort) VALUES (:Benutzername, :EMail, :Passwort)");
        $result = $statement->execute(array('Benutzername' => $Benutzername, 'EMail' => $EMail, 'Passwort' => $Passwort_hash));
        
        if($result) {        
            echo 'Du wurdest erfolgreich registriert. <a href="../HTML/register.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}
 
if($showFormular) {
?>

        <header class="header">
            <div class="logo">
                <a href="../HTML/index.php"><img src="../Bilder/sofort spielen.png" alt="sofort spielen" class="image">&nbsp;Sofort</br>&nbsp;Spielen</a>
            </div>
                <nav class="navbar">
                    <a href="../HTML/index.php">Startseite</a>
                </nav>
        </header>
        <div  class="wrapper">
            <div class="form-box login"> 
                <form action="#">
                    <h1>Anmelden</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Benutzername" required><i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Passwort" required><i class='bx bxs-lock-alt'></i>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" name="angemeldet_bleiben" value="1"> Angemeldet bleiben</label>
                        <a href="../HTML/passwort.php">Password vergessen?</a>
                    </div>
                        <button type="submit" class="btn">Anmelden</button>
                    <div class="register-link">
                        <p>Noch keinen Konto?<a href="#"> Registrieren</a></p>
                    </div>
                </form>
            </div>
            <div class="form-box register">
            <form action="?register=1" method="POST">
                    <h1>Registrieren</h1>
                    <div class="input-box">
                        <input type="text" name="Benutzername" placeholder="Benutzername" required><i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="email" name="EMail" placeholder="Email" required><i class='bx bx-envelope' ></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="Passwort" placeholder="Passwort" required><i class='bx bxs-lock-alt'></i>
                    </div>
                        <button type="submit" class="btn">Registrieren</button>
                    <div class="login-link">
                        <p>Schon einen Konto?<a href="#"> Anmelden</a></p>
                    </div>
                </form>
            </div>
        </div>

        <?php
} //Ende von if($showFormular)
?>

        <script src="../JavaScript/script.js"></script>
    </body>
</html>