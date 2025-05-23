<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Autovermietung - Startseite</title>
    <link rel="stylesheet" href=".\stylesheets\index.css">
    <link rel="stylesheet" href=".\stylesheets\cars.css">
    <link rel="stylesheet" href=".\stylesheets\logo.css">
    <link rel="stylesheet" href=".\stylesheets\menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="main-header">
        <div class="header-inner">
            <div class="logo">
                <a href="./index.html"><img src="./pictures/logo.jpg" alt="Alpine Drive Logo" /></a>
            </div>
            <div class="burger" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <nav class="navbar" id="mainNavbar">
            <a href="./pages/index.html">Start</a>
            <a href="./pages/autos.html">Autos</a>
            <a href="./pages/vertrag.html">Vertrag</a>
            <a href="./pages/kontakt.html">Kontakt</a>
            <a href="./pages/impressum.html">Impressum</a>
            <a href="./pages/datenschutz.html">AGB´s</a>
        </nav>
    </header>



    <section class="hero fade-in">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="./pictures/bmw.mp4" type="video/mp4">
        </video>

        <div class="video-overlay"></div>

        <div class="hero-text slide-up">
            <h1>Finden Sie Ihr perfektes Auto</h1>
            <p>Elegante Fahrzeuge. Faire Preise. Top-Service.</p>
            <a href="./pages/autos.html" class="btn">Jetzt entdecken</a>
        </div>
    </section>


    <section class="features">
        <div class="feature fade-in">
            <h2>Premium Fahrzeuge</h2>
            <p>Moderne Flotte mit eleganter Auswahl für jeden Geschmack.</p>
        </div>
        <div class="feature fade-in delay-1">
            <h2>Flexible Tarife</h2>
            <p>Stunden-, Tages- oder Langzeittarife – alles ist möglich.</p>
        </div>
        <div class="feature fade-in delay-2">
            <h2>Einfacher Buchungsprozess</h2>
            <p>Unkomplizierte Online-Reservierung ohne Stress.</p>
        </div>
    </section>

    <section class="slider-wrapper">
        <button class="slide-btn slide-left" onclick="moveSlide(-1)">&#10094;</button>

        <div class="slider-track" id="sliderTrack">
            <div class="slide">
                <h2>Mercedes Benz S63 AMG</h2>
                <img src="./pictures/amg.jpg" alt="Mercedes Benz S63 AMG">
                <a href="./pages/autos.html" class="btn-to-car"
                    style="flex: initial; display: inline-block; width: auto;">Zum Fahrzeug</a>
            </div>
            <div class="slide">
                <h2>BMW M3 Competition G80 Auto M xDrive</h2>
                <img src="./pictures/M3.jpg" alt="BMW M3">
                <a href="./pages/autos.html" class="btn-to-car"
                    style="flex: initial; display: inline-block; width: auto;">Zum Fahrzeug</a>

            </div>
            <div class="slide">
                <h2>Porsche Cayenne Coupe Hybrid</h2>
                <img src="./pictures/porsche.jpg" alt="Porsche Cayenne">
                <a href="./pages/autos.html" class="btn-to-car"
                    style="flex: initial; display: inline-block; width: auto;">Zum Fahrzeug</a>

            </div>
        </div>

        <button class="slide-btn slide-right" onclick="moveSlide(1)">&#10095;</button>
    </section>

    <footer class="main-footer">
        <p>&copy; Alpine Drive - Autovermietung | <a href="./pages/impressum.html">Impressum</a> | <a
                href="./pages/AGBs.html">Datenschutz</a></p>
    </footer>

    <script>
        let currentIndex = 0;
        const track = document.getElementById('sliderTrack');
        const totalSlides = track.children.length;

        function moveSlide(direction) {
            currentIndex = Math.min(Math.max(currentIndex + direction, 0), totalSlides - 1);
            const offset = -currentIndex * 100;
            track.style.transform = `translateX(${offset}%)`;
        }

        let startX = 0;
        let isDragging = false;

        const slider = document.querySelector('.slider-track');

        slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
        });

        slider.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            const moveX = e.touches[0].clientX;
            const diff = startX - moveX;

            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    moveSlide(1); // nach rechts wischen → nächstes Auto
                } else {
                    moveSlide(-1); // nach links wischen → vorheriges Auto
                }
                isDragging = false; // nur einmal pro Swipe auslösen
            }
        });

        slider.addEventListener('touchend', () => {
            isDragging = false;
        });


        function toggleMenu() {
            const navbar = document.getElementById("mainNavbar");
            const overlay = document.getElementById("overlay");
            const body = document.body;

            navbar.classList.toggle("active");
            overlay.classList.toggle("active");
            body.classList.toggle("no-scroll");
        }

        // Klick auf Overlay → Menü schließen
        document.getElementById("overlay").addEventListener("click", toggleMenu);


    </script>

</body>

</html>