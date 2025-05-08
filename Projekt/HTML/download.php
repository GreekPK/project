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

$sql = "SELECT * FROM kommentare ORDER BY Kommentare_ID DESC LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sofort Spielen</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../Bilder/sofort spielen.png" type="image/x-icon">
    <!-- Link To CSS -->
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Swiper CSS File Link-->
    <link rel="stylesheet" href="../Css/swiper-bundle.min.css">
</head>
<body>
    <!-- Custom Scroll Bar-->
    <div class="progress">
        <div class="progress-bar" id="scroll-bar"></div>
    </div>
    <!-- Header -->
    <header>
        <!-- Nav -->
        <div class="nav container">
            <!-- Logo -->
            <a href="../HTML/index.html" class="logo">Sofort<span>Spielen</span></a>
            <!-- Nav Icons -->
            <div class="nav-icons">
                <i class='bx bx-cart'></i>
                <i class='bx bx-bell bx-tada' id="bell-icon"><span></span></i>
                <a href="../HTML/register.php"><i class='bx bx-user'></i></a>
                <div class="menu-icon">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </div>
            <!-- Menu -->
            <div class="menu">
                <img src="../Bilder/menu.png" alt="">
                <div class="navbar">
                    <li><a href="../HTML/index.html">Hauptseite</a></li>
                    <li><a href="../HTML/index.html #trending">Trend Spiele</a></li>
                    <li><a href="../HTML/index.html #new">Neue Spiele</a></li>
                    <li><a href="../HTML/index.html #contact">Kontaktiere Uns</a></li>
                </div>
            </div>
            <!-- Notification -->
            <div class="notification">
                <div class="notification-box">
                    <i class='bx bxs-check-circle'></i>
                    <p>Herzlichen Glückwunsch, Ihr Spiel wurde erfolgreich heruntergeladen.</p>
                </div>
                <div class="notification-box box-color">
                    <i class='bx bxs-x-circle' ></i>
                    <p>Änderungen konnten nicht übernommen werden.</p>
                </div>
            </div>

        </div>
    </header>
    <!-- Video -->
    <div class="video-container container">
        <video src="../Videos/Subway Surfers Official.mp4" muted autoplay></video>
    </div>
    <!-- About -->
    <div class="about container animeX">
        <h2>Über das Spiel</h2>
        <p>Es gibt viele Beispiele für diese Art von Spielen auf Mobilgeräten. Zu den berüchtigtsten zählen beispielsweise Temple Run oder Subway Surfers, die Sie ab heute auch auf Ihren Windows-PC herunterladen können. In diesem von Kiloo entwickelten Spiel hat unser endloser Lauf eine Ausrede. Wir schlüpfen in die Rolle eines süßen Straßenvandalen, der es liebt, U-Bahn-Stationen und Linien aus aller Welt mit Graffiti zu schmücken. Und natürlich muss er vor der Polizei fliehen, die ihn verfolgt, um weiterhin seine ganze Kunst in den verschiedenen Szenarien zur Schau stellen zu können, während er unterwegs auch versucht, Münzen einzusammeln. Und nicht nur herumlaufen, sondern Hoverboard fahren.
        </p>
    </div>
    <!-- ScreenShots -->
    <div class="screenshots container animeX">
        <h2>ScreenShots</h2>
        <div class="screenshots-content">
            <img src="../Bilder/screenshots1.jpg" alt="">
            <img src="../Bilder/screenshots2.jpg" alt="">
            <img src="../Bilder/screenshots3.jpg" alt="">
        </div>

    </div>
    <!-- Download -->
    <div class="download animeX">
        <h2>Download Links</h2>
        <div class="download-links">
            <a href="../Videos/Subway Surface.apk" download="">Für Android</a>
            <a href="../Videos/Subway Surface.apk">Für IOS</a>
            <a href="../Videos/Subway Surface.apk">Für Windows</a>
        </div>
    </div>

    <!-- Comments, Rating -->
    <div class="comment-sect animeX">
        <div class="comment-send">
            <div>
                <h1>Hinterlasse ein Kommentar</h1>
            </div>
            <div>
                <span id="comment"><?php echo $total_rows; ?></span> Kommentare
            </div>
            <div class="commenttext">
                <p>Wir freuen uns von dir zu hören!</p><br>
            </div>
            <div class="comments">
                <?php while($row = mysqli_fetch_assoc($res_data)) { ?>
                    <div class="parents">
                    <img src="<?php echo ($row['Nutzername'] === 'Anonymous') ? '../Bilder/anonym.png' : '../Bilder/user.png'; ?>" alt="User">
                    <div>
                        <h1><?php echo htmlspecialchars($row['Nutzername']); ?></h1>
                        <p><?php echo nl2br(htmlspecialchars($row['Nachricht'])); ?></p>
                        <span class="date">
                        <?php echo date("d.m.Y H:i", strtotime($row['Erstellungsdatum'])); ?>
                        </span>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="commtentbox">
                <img src="user_1.png" alt="">
                <div class="content">
                    <h2>Name: </h2>
                    <input type="text" value="Anonymous" class="user">
                </div>
            </div>

            <div class="commentinput">
                <input type="text" placeholder="Schreibe dein Kommentar" class="usercomment">
                <div class="buttons">
                    <button type="submit" disabled id="publish">Senden</button>
                </div>
            </div>
            <p></p>
        </div>
    </div>

    <!-- Copyright -->
    <div class="copyright container">
        <a href="#" class="logo">Sofort<span>Spielen</span></a>
        <p>&#169; 2025 Alle Rechte vorbehalten</p>
    </div>

    <!-- Comments -->
    <script>
        function showReplyForm(self) {
            var commentId = self.getAttribute("data-id");
            if (document.getElementById("form-" + commentId).style.display == "") {
                document.getElementById("form-" + commentId).style.display = "none";
            } else {
                document.getElementById("form-" + commentId).style.display = "";
            }
        }
    </script>

    <script>
        "use strict";
        const userID = {
            name: null,
            identity: null,
            image: null,
            message: null,
            date: null
        }
        const userComment = document.querySelector(".usercomment");
        const publishBtn = document.querySelector("#publish");
        const comments = document.querySelector(".comments");
        const userName = document.querySelector(".user");
        userComment.addEventListener("input", e => {
            if(!userComment.value) {
                publishBtn.setAttribute("disabled", "disabled");
                publishBtn.classList.remove("abled")
            }else {
                publishBtn.removeAttribute("disabled");
                publishBtn.classList.add("abled");
            }
        })

        function addPost() {
            console.log("Der Knopf funktioniert!")
            if(!userComment.value) return;
            userID.name = userName.value;
            if(userID.name === "Anonymous") {
                userID.identity = false;
                userID.image = "../Bilder/anonym.png";
            }else {
                userID.identity = true;
                userID.image = "../Bilder/user.png"
            }

            userID.message = userComment.value;
            userID.date = new Date().toLocaleString();

            fetch('submit_comment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `Nutzername=${encodeURIComponent(userID.name)}&Nachricht=${encodeURIComponent(userID.message)}`
        }).then(response => response.text())
        .then(data => {
            let published =
            `<div class="parents">
                <img src="${userID.image}">
                <div>
                    <h1>${userID.name}</h1>
                    <p>${userID.message}</p>
                    <span class="date">${userID.date}</span>
                </div>
            </div>`

            comments.innerHTML += published;
            userComment.value = "";

            let commentsNum = document.querySelectorAll(".parents").length;
            document.getElementById("comment").textContent = commentsNum;
        }).catch(error => console.error("Fehler beim Speichern: ", error));
        }

        publishBtn.addEventListener("click", addPost)
    </script>

<!-- Link Swiper File -->
<script src="../JavaScript/swiper-bundle.min.js"></script>
    <!-- Link to Js -->
    <script src="../JavaScript/main.js"></script>
</body>
</html>