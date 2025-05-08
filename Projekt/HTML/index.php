<?php
include("connect_db.php");

$result = $mysqli->query("
    SELECT spiele.*, kategorien.Name AS KategorieName 
    FROM spiele 
    JOIN kategorien ON spiele.Kategorie_ID = kategorien.Kategorie_ID
");
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
    <link rel="stylesheet" href="../CSS/swiper-bundle.min.css">
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
            <a href="../HTML/index.php" class="logo">Sofort<span>Spielen</span></a>
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
                    <li><a href="../HTML/index.php">Hauptseite</a></li>
                    <li><a href="#trending">Trend Spiele</a></li>
                    <li><a href="#new">Neue Spiele</a></li>
                    <li><a href="#contact">Kontaktiere Uns</a></li>
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
    <!-- Home Section Start -->
    <section class="home container" id="home">
        <img src="../Bilder/home.png" alt="">
        <div class="home-text">
            <h1>CITY OF THE <br> FUTURE</h1>
            <a href="#" class="btn">Jetzt verfügbar</a>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- Trending Section Start -->
    <section class="trending container animeX" id="trending">
        <div class="heading">
            <i class='bx bxs-flame'></i>
            <h2>Trend Spiele</h2>
        </div>
        <!-- Content -->
        <div class="trending-content swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="../Bilder/trending1.webp" alt="">
                        <div class="box-text">
                            <h2>Cyberpunk 2077</h2>
                            <h3>Aktion</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <span>4.7</span>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-cart'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="../Bilder/trending2.jpg" alt="">
                        <div class="box-text">
                            <h2>Battlefield 2042</h2>
                            <h3>Aktion</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <span>4.7</span>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-cart'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="../Bilder/trending3.jpg" alt="">
                        <div class="box-text">
                            <h2>Assassin's Creed</h2>
                            <h3>Aktion</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <span>4.7</span>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-cart'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="../Bilder/trending4.jpg" alt="">
                        <div class="box-text">
                            <h2>Ghost of Tsushima</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <span>4.7</span>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-cart'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 5 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="../Bilder/trending5.png" alt="">
                        <div class="box-text">
                            <h2>GTA V</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <span>4.7</span>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-cart'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 6 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="../Bilder/trending6.jpg" alt="">
                        <div class="box-text">
                            <h2>Dying Light 2</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <span>4.7</span>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-cart'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 7 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="../Bilder/trending7.png" alt="">
                        <div class="box-text">
                            <h2>Halo Infinite</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <span>4.7</span>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-cart'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 8 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="../Bilder/trending8.png" alt="">
                        <div class="box-text">
                            <h2>Resident Evil Village</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <span>4.7</span>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-cart'></i></a>
                            </div>
                        </div>
                    </div>
                </div>

              </div>

        </div>
    </section>
    <!-- Trending Section End -->
    <!-- New Section Start -->
    <section class="new container animeX" id="new">
        <div class="heading">
            <i class='bx bx-game'></i>
            <h2>Neue Spiele</h2>
        </div>
        <ul>
            <li class="list" data-filter="all">Alle</li>
            <li class="list" data-filter="pc">PC-Spiele</li>
            <li class="list" data-filter="mobile">Handyspiele</li>
        </ul>
        <!-- Content -->
        <div class="new-content">
            <!-- Box 1 -->
            <?php
            $imageIndex = 1;
            while ($row = $result->fetch_assoc()):
            // Bildpfad automatisch setzen z. B. new1.jpg, new2.jpg ...
            $imagePath = "../Bilder/new" . $imageIndex++ . ".jpg";
            ?>

            <div class="box" data-item="mobile">
                <img src="<?= $imagePath ?>" alt="Spielbild">
                <div class="box-text">
                    <h2><a href="spiel.php?id=<?= $row['Spiel_ID'] ?>"><?= htmlspecialchars($row['Titel']) ?></a></h2>
                    <h3><?= htmlspecialchars($row['KategorieName']) ?></h3>
                    <div class="progress-line">
                        <span></span>
                    </div>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <span>4.7</span>
                        </div>
                        <a href="spiel.php?id=<?= $row['Spiel_ID'] ?>" class="box-btn"><i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <!-- New Section End -->
    <!-- Contact Us Start -->
    <div class="contact animeX" id="contact">
        <img src="../Bilder/contact.jpg">
        <div class="form">
            <h1>Kontaktiere Uns</h1>
            <form action="https://api.web3forms.com/submit" method="POST">
                <input type="hidden" name="access_key" value="da22a2f0-a35e-499a-b496-3e04a31c07d9">
                <div class="inputBx">
                <input type="text" name="name" placeholder="Deinen Namen" required>
            </div>
            <div class="inputBx">
                <input type="email" name="email" placeholder="E-Mail"required>
            </div>
            <div class="inputBx">
                <textarea name="message" placeholder="Ihre Nachricht" required></textarea>
            </div>
            <div class="inputBx">
                <input type="submit" name="Submit"></input>
            </div>
            </form>
        </div>
    </div>
    <!-- Contact Us End -->
    <!-- Copyright -->
    <div class="copyright container">
        <a href="#" class="logo">Sofort<span>Spielen</span></a>
        <p>&#169; 2025 Alle Rechte vorbehalten</p>
    </div>

<!-- Link Swiper File -->
<script src="../JavaScript/swiper-bundle.min.js"></script>
    <!-- Link to Js -->
    <script src="../JavaScript/main.js"></script>
</body>
</html>