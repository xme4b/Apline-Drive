<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Porsche Cayenne Coupe Hybrid - Details</title>
    <link rel="stylesheet" href="../stylesheets/index.css" />
    <link rel="stylesheet" href="../stylesheets/details.css" />
    <link rel="stylesheet" href="../stylesheets/logo.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <?php include_once("./navbarDetails.html"); ?>
    <!-- Detailbereich -->
    <section class="detail-section">
        <img src="../pictures/porsche.jpg" alt="Porsche Cayenne Coupe Hybrid" class="detail-image" />
        <div class="detail-content">
            <h1>Porsche Cayenne Coupe Hybrid</h1>
            <p>Motor: V6 Plug-In Hybrid</p>
            <p>Leistung: 462 PS</p>
            <p>Antrieb: Allrad</p>
            <p>Ausstattung: Stilvoll, effizient & kraftvoll – ideal für Langstrecken & Alltag</p>

            <label for="rental-duration"><strong>Mietdauer auswählen:</strong></label>
            <select id="rental-duration" class="rental-select">
                <option value="4h">4 Stunden</option>
                <option value="1d" selected>1 Tag</option>
                <option value="1w">1 Woche</option>
            </select>

            <p class="price" id="display-price">€ 269,– / Tag</p>

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
        <h2>Sportlicher Luxus trifft Effizienz</h2>
        <p class="intro">Der Porsche Cayenne Coupe Hybrid vereint Dynamik mit modernster Hybridtechnologie – für alle,
            die Komfort und Umweltbewusstsein verbinden wollen.</p>
    </section>

    <!-- Galerie -->
    <section class="gallery-section">
        <div class="gallery">
            <img src="../pictures/porsche_innen.jpg" alt="Innenraum" class="gallery-img" />
            <img src="../pictures/porsche_side.jpg" alt="Seitenansicht" class="gallery-img" />
            <img src="../pictures/porsche_rear.jpg" alt="Heckansicht" class="gallery-img" />
        </div>
    </section>

    <!-- Technische Daten -->
    <section class="specs-section">
        <h3>Technische Daten</h3>
        <ul class="spec-list">
            <li>Motor: 3.0L V6 + Elektro</li>
            <li>Systemleistung: 462 PS</li>
            <li>Getriebe: 8-Gang Tiptronic</li>
            <li>0–100 km/h: 5.1 Sekunden</li>
            <li>Elektrische Reichweite: bis zu 40 km</li>
        </ul>
    </section>

    <!-- Ausstattung -->
    <section class="equipment-section">
        <h3>Besondere Ausstattung</h3>
        <ul class="equipment-list">
            <li>Panorama-Glasdach</li>
            <li>Matrix-LED-Scheinwerfer</li>
            <li>BOSE® Surround Sound-System</li>
            <li>Sitzheizung vorne und hinten</li>
            <li>ParkAssistent inkl. Rückfahrkamera</li>
        </ul>
    </section>

    <!-- Call to Action -->
    <section class="booking-cta">
        <p class="cta-text">Bereit für ein umweltfreundliches Fahrerlebnis? Buchen Sie noch heute!</p>
        <a href="./vertrag.html" class="btn-to-car">Jetzt reservieren</a>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; Alpine Drive - Autovermietung | <a href="./impressum.html">Impressum</a> | <a
                href="./AGBs.html">Datenschutz</a></p>
    </footer>

    <!-- JS Logik -->
    <script>
        const priceDisplay = document.getElementById('display-price');
        const rentalSelect = document.getElementById('rental-duration');
        const endWrapper = document.getElementById('rental-end-wrapper');

        function updatePriceAndVisibility() {
            const value = rentalSelect.value;
            switch (value) {
                case '4h':
                    priceDisplay.textContent = '€ 149,– / 4 Stunden';
                    endWrapper.style.display = 'none';
                    break;
                case '1d':
                    priceDisplay.textContent = '€ 269,– / Tag';
                    endWrapper.style.display = 'block';
                    break;
                case '1w':
                    priceDisplay.textContent = '€ 1.599,– / Woche';
                    endWrapper.style.display = 'block';
                    break;
            }
        }

        updatePriceAndVisibility();
        rentalSelect.addEventListener('change', updatePriceAndVisibility);
    </script>
</body>

</html>