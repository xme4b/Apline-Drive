<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BMW M3 Competition - Details</title>
    <link rel="stylesheet" href="../stylesheets/index.css" />
    <link rel="stylesheet" href="../stylesheets/details.css" />
    <link rel="stylesheet" href="../stylesheets/logo.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <header class="main-header">
        <div class="logo">
            <a href="../index.php"><img src="../pictures/logo.jpg" alt="Alpine Drive Logo" /></a>
        </div>
        <nav class="navbar" id="mainNavbar">
            <a href="../index.php">Start</a>
            <a href="./autos.html">Autos</a>
            <a href="./vertrag.html">Vertrag</a>
            <a href="./kontakt.html">Kontakt</a>
            <a href="./impressum.html">Impressum</a>
            <a href="./datenschutz.html">AGB´s</a>
        </nav>
        <div class="burger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </header>

    <section class="detail-section">
        <img src="../pictures/M3.jpg" alt="BMW M3 Competition G80 xDrive" class="detail-image" />
        <div class="detail-content">
            <h1>BMW M3 Competition G80 xDrive</h1>
            <p>Motor: 3.0L R6 Biturbo</p>
            <p>Leistung: 510 PS</p>
            <p>Antrieb: Allrad</p>
            <p>Ausstattung: Sportlich-aggressives Design trifft auf Präzision</p>

            <label for="rental-duration"><strong>Mietdauer auswählen:</strong></label>
            <select id="rental-duration" class="rental-select">
                <option value="4h">4 Stunden</option>
                <option value="1d" selected>1 Tag</option>
                <option value="1w">1 Woche</option>
            </select>

            <p class="price" id="display-price">€ 299,– / Tag</p>

            <div class="rental-datetime">
                <div>
                    <label for="rental-start"><strong>Abholung:</strong></label><br>
                    <input type="datetime-local" id="rental-start" name="rental-start" required class="rental-date" />
                </div>
                <div id="rental-end-wrapper">
                    <label for="rental-end"><strong>Rückgabe:</strong></label><br>
                    <input type="datetime-local" id="rental-end" name="rental-end" required class="rental-date" />
                </div>
            </div>

            <div class="detail-buttons">
                <a href="./autos.html" class="btn-details">Zurück</a>
                <a href="./vertrag.html" class="btn-to-car">Buchen</a>
            </div>
        </div>
    </section>

    <section class="highlight-section">
        <h2>Fahrgefühl auf Motorsportniveau</h2>
        <p class="intro">Erleben Sie die Perfektion deutscher Ingenieurskunst. Der M3 Competition liefert Performance,
            die unter die Haut geht.</p>
    </section>

    <section class="gallery-section">
        <div class="gallery">
            <img src="../pictures/m3_innen.jpg" alt="Innenraum BMW M3" class="gallery-img" />
            <img src="../pictures/m3_side.jpg" alt="Seitenansicht BMW M3" class="gallery-img" />
            <img src="../pictures/m3_rear.jpg" alt="Heckansicht BMW M3" class="gallery-img" />
        </div>
    </section>

    <section class="specs-section">
        <h3>Technische Daten</h3>
        <ul class="spec-list">
            <li>Motor: 3.0L TwinPower Turbo R6</li>
            <li>PS: 510</li>
            <li>Getriebe: 8-Gang M Steptronic</li>
            <li>0–100 km/h: 3.9 Sekunden</li>
            <li>Top Speed: 290 km/h</li>
        </ul>
    </section>

    <section class="equipment-section">
        <h3>Besondere Ausstattung</h3>
        <ul class="equipment-list">
            <li>M-Sportsitze mit Memory</li>
            <li>Adaptives M-Fahrwerk</li>
            <li>Laserlicht</li>
            <li>Carbon Interieur</li>
            <li>Live Cockpit Professional</li>
        </ul>
    </section>

    <section class="booking-cta">
        <p class="cta-text">Bereit für pure Fahrfreude? Jetzt Termin sichern!</p>
        <a href="./vertrag.html" class="btn-to-car">Jetzt reservieren</a>
    </section>

    <footer class="main-footer">
        <p>&copy; Alpine Drive - Autovermietung | <a href="./impressum.html">Impressum</a> | <a
                href="./AGBs.html">Datenschutz</a></p>
    </footer>

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
                    priceDisplay.textContent = '€ 299,– / Tag';
                    endWrapper.style.display = 'block';
                    break;
                case '1w':
                    priceDisplay.textContent = '€ 1.699,– / Woche';
                    endWrapper.style.display = 'block';
                    break;
            }
        }

        updatePriceAndVisibility();
        rentalSelect.addEventListener('change', updatePriceAndVisibility);
    </script>
</body>

</html>