<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Mercedes Benz S63 AMG - Details</title>
    <link rel="stylesheet" href="../stylesheets/index.css" />
    <link rel="stylesheet" href="../stylesheets/details.css" />
    <link rel="stylesheet" href="../stylesheets/logo.css">
    <link rel="stylesheet" href="../stylesheets/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <?php include_once("./navbarDetails.html"); ?>
    <!-- Detailbereich -->
    <section class="detail-section">
        <img src="../pictures/amg.jpg" alt="Mercedes Benz S63 AMG" class="detail-image" />
        <div class="detail-content">
            <h1>Mercedes Benz S63 AMG</h1>
            <p>Motor: V8 Biturbo</p>
            <p>Leistung: 680 PS</p>
            <p>Antrieb: 4MATIC+</p>
            <p>Ausstattung: Luxus & Performance vereint</p>

            <label for="rental-duration"><strong>Mietdauer auswählen:</strong></label>
            <select id="rental-duration" class="rental-select">
                <option value="4h">4 Stunden</option>
                <option value="1d" selected>1 Tag</option>
                <option value="1w">1 Woche</option>
            </select>

            <p class="price" id="display-price">€ 349,– / Tag</p>

            <div class="rental-datetime">
                <div>
                    <label for="rental-start"><strong>Abholung:</strong></label><br />
                    <input type="datetime-local" id="rental-start" name="rental-start" required class="rental-date" />
                </div>
                <div id="rental-end-wrapper">
                    <label for="rental-end"><strong>Rückgabe:</strong></label><br />
                    <input type="datetime-local" id="rental-end" name="rental-end" required class="rental-date" />
                </div>
            </div>

            <div class="detail-buttons">
                <a href="./autos.html" class="btn-details">Zurück</a>
                <a href="./vertrag.html" class="btn-to-car">Buchen</a>
            </div>
        </div>
    </section>

    <!-- Highlight -->
    <section class="highlight-section">
        <h2>Power und Prestige in Perfektion</h2>
        <p class="intro">Der Mercedes-Benz S63 AMG vereint kompromisslose Leistung mit stilvollem Komfort – das perfekte
            Fahrzeug für besondere Anlässe oder luxuriöse Fahrten.</p>
    </section>

    <!-- Fun-Section -->
    <section class="fun-section">
        <h2></h2>

        <div class="fun-icons-wrapper">
            <div class="icon-block">
                <img src="../pictures/laugh.png" alt="Lachen">
                <p>Fahrspaß pur für jede Gelegenheit</p>
            </div>

            <div class="icon-block">
                <img src="../pictures/gift.png" alt="Geschenk">
                <p>Exklusive Angebote & Geschenkgutscheine</p>
            </div>

            <div class="icon-block">
                <img src="../pictures/car1.png" alt="Auto">
                <p>Luxusfahrzeuge, die Eindruck hinterlassen</p>
            </div>

            <div class="icon-block">
                <img src="../pictures/funfun.png" alt="Auto">
                <p>Machen sie ihren Anlass, noch Besonders!</p>
            </div>
        </div>

    </section>

    <!-- Galerie -->
    <section class="gallery-section">
        <div class="gallery">
            <img src="../pictures/amgheck.jpg" alt="Innenraum" class="gallery-img" />
            <img src="../pictures/amgside.jpg" alt="Seitenansicht" class="gallery-img" />
            <img src="../pictures/amg_innen.jpg" alt="Heckansicht" class="gallery-img" />
            <img src="../pictures/amg_innen2.jpg" alt="Heckansicht" class="gallery-img" />
        </div>
        <br>
        <div class="gallery-innen">
            <img src="../pictures/amginnen.png" alt="Heckansicht" class="gallery-innen-img-big" />
        </div>
    </section>

    <!-- Technische Daten -->
    <section class="specs-section">
        <h3>Technische Daten</h3>
        <ul class="spec-list">
            <li>Motor: 4.0L V8 Biturbo</li>
            <li>PS: 680</li>
            <li>Getriebe: 9-Gang Automatik</li>
            <li>0–100 km/h: 3.5 Sekunden</li>
            <li>Top Speed: 300 km/h</li>
        </ul>
    </section>

    <!-- Ausstattung -->
    <section class="equipment-section">
        <h3>Besondere Ausstattung</h3>
        <ul class="equipment-list">
            <li>Panorama-Glasdach</li>
            <li>Massagesitze & Lederausstattung</li>
            <li>Burmeister Surround System</li>
            <li>Ambientebeleuchtung mit 64 Farben</li>
            <li>Head-Up Display</li>
        </ul>
    </section>

    <!-- Call to Action -->
    <section class="booking-cta">
        <p class="cta-text">Bereit für das ultimative Fahrerlebnis? Buchen Sie jetzt!</p>
        <a href="./vertrag.html" class="btn-to-car">Jetzt reservieren</a>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; Alpine Drive - Autovermietung | <a href="./impressum.html">Impressum</a> | <a
                href="./AGBs.html">Datenschutz</a></p>
    </footer>

    <!-- Script: Preislogik + Rückgabe-Anzeige -->
    <script>
        const priceDisplay = document.getElementById('display-price');
        const rentalSelect = document.getElementById('rental-duration');
        const endWrapper = document.getElementById('rental-end-wrapper');

        function updatePriceAndVisibility() {
            const value = rentalSelect.value;
            switch (value) {
                case '4h':
                    priceDisplay.textContent = '€ 179,– / 4 Stunden';
                    endWrapper.style.display = 'none';
                    break;
                case '1d':
                    priceDisplay.textContent = '€ 349,– / Tag';
                    endWrapper.style.display = 'block';
                    break;
                case '1w':
                    priceDisplay.textContent = '€ 1.999,– / Woche';
                    endWrapper.style.display = 'block';
                    break;
            }
        }

        updatePriceAndVisibility();
        rentalSelect.addEventListener('change', updatePriceAndVisibility);

    </script>
    <script>
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