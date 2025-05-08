<?php
include("connect_db.php");

// Kommentar absenden
if (isset($_POST["submit"])) {
    $nutzername = $_POST["nutzername"];
    $nachricht = $_POST["nachricht"];

    $query = mysqli_query($conn, "INSERT INTO kommentare (Nutzername, Nachricht) VALUES ('$nutzername', '$nachricht')");

    if($query) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Fehler beim Speichern!";
    }
}

// Seitenblätterung vorbereiten
$pageno = isset($_GET['pageno']) ? (int)$_GET['pageno'] : 1;
$no_of_records_per_page = 5;
$offset = ($pageno - 1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM kommentare";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows  = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM kommentare ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Sofort Spielen</title>
    <link rel="shortcut icon" href="../Bilder/sofort spielen.png" type="image/x-icon">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<!-- Ladebalken -->
<div class="progress">
    <div class="progress-bar" id="scroll-bar"></div>
</div>

<!-- Header & Navigation -->
<header>
    <div class="nav container">
        <a href="../HTML/index.html" class="logo">Sofort<span>Spielen</span></a>
        <div class="nav-icons">
            <i class='bx bx-bell bx-tada' id="bell-icon"><span></span></i>
            <i class='bx bx-cart'></i>
            <div class="menu-icon">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </div>
        <div class="menu">
            <img src="../Bilder/menu.png" alt="">
            <div class="navbar">
                <li><a href="../HTML/index.html">Hauptseite</a></li>
                <li><a href="../HTML/index.html#trending">Trend Spiele</a></li>
                <li><a href="../HTML/index.html#new">Neue Spiele</a></li>
                <li><a href="../HTML/index.html#contact">Kontaktiere Uns</a></li>
            </div>
        </div>
        <div class="notification">
            <div class="notification-box">
                <i class='bx bxs-check-circle'></i>
                <p>Herzlichen Glückwunsch, Ihr Spiel wurde erfolgreich heruntergeladen.</p>
            </div>
            <div class="notification-box box-color">
                <i class='bx bxs-x-circle'></i>
                <p>Änderungen konnten nicht übernommen werden.</p>
            </div>
        </div>
    </div>
</header>

<!-- Video -->
<div class="video-container container">
    <video src="../Videos/Subway Surfers Official.mp4" muted autoplay></video>
</div>

<!-- Beschreibung -->
<div class="about container animeX">
    <h2>Über das Spiel</h2>
    <p>... (Dein vorhandener Beschreibungstext hier bleibt gleich) ...</p>
</div>

<!-- Screenshots -->
<div class="screenshots container animeX">
    <h2>ScreenShots</h2>
    <div class="screenshots-content">
        <img src="../Bilder/screenshots1.jpg" alt="">
        <img src="../Bilder/screenshots2.jpg" alt="">
        <img src="../Bilder/screenshots3.jpg" alt="">
    </div>
</div>

<!-- Download-Links -->
<div class="download animeX">
    <h2>Download Links</h2>
    <div class="download-links">
        <a href="../Videos/Subway Surface.apk" download="">Für Android</a>
        <a href="../Videos/Subway Surface.apk">Für IOS</a>
        <a href="../Videos/Subway Surface.apk">Für Windows</a>
    </div>
</div>

<!-- Kommentar-Bereich -->
<div class="comment-sect animeX">
    <div class="comment-send">
        <div>
            <h1>Hinterlasse ein Kommentar</h1>
        </div>
        <div class="commenttext">
            <p>Wir sind gefreut von dir zu hören!</p>
        </div>
        
        <!-- Formular -->
        <form method="POST">
            <div class="commtentbox">
                <img src="user_1.png" alt="">
                <div class="content">
                    <h2>Rede als: </h2>
                    <input type="text" name="nutzername" value="Anonymous" class="user" required>
                </div>
            </div>
            <div class="commentinput">
                <textarea name="nachricht" placeholder="Schreibe dein Kommentar" class="usercomment" required></textarea>
                <div class="buttons">
                    <button type="submit" name="submit" class="publish">Senden</button>
                </div>
            </div>
        </form>

        <!-- Ausgabe der Kommentare -->
        <div class="comments">
            <?php
            if ($res_data && mysqli_num_rows($res_data) > 0) {
                while ($row = mysqli_fetch_assoc($res_data)) {
                    echo "<div class='parents'>";
                    echo "<img src='user_1.png'>";
                    echo "<div>";
                    echo "<h1>" . htmlspecialchars($row['Nutzername']) . "</h1>";
                    echo "<p>" . htmlspecialchars($row['Nachricht']) . "</p>";
                    echo "<div class='engagements'><img src='like.png'><img src='share.png'></div>";
                    echo "<span class='date'>" . $row['Erstellungsdatum'] . "</span>";
                    echo "</div></div>";
                }
            } else {
                echo "<p>Keine Kommentare vorhanden.</p>";
            }
            ?>
        </div>

        <!-- Paginierung -->
        <ul class="pagination">
            <li><a href="?pageno=1">Erste</a></li>
            <li><a href="<?php echo $pageno > 1 ? '?pageno=' . ($pageno - 1) : '#'; ?>">Zurück</a></li>
            <li><a href="<?php echo $pageno < $total_pages ? '?pageno=' . ($pageno + 1) : '#'; ?>">Weiter</a></li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">Letzte</a></li>
        </ul>
    </div>
</div>

<!-- Footer -->
<div class="copyright container">
    <a href="#" class="logo">Sofort<span>Spielen</span></a>
    <p>&#169; 2025 Alle Rechte vorbehalten</p>
</div>

<!-- Scripts -->
<script src="../JavaScript/swiper-bundle.min.js"></script>
<script src="../JavaScript/main.js"></script>

</body>
</html>
