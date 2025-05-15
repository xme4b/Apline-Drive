# Apline-Drive

Frontend:
-  Header-Ansicht (Star, Autos, Vertrag ect.) ist bisher verschieden, je Seite
-  Mobile-Ansicht in einem eigenem CSS-File definiere (aus dem Bisherigen löschen)
-  Mehemts; Bilder / evtl Videos einfügen, Vertragsbedingungen und AGB´s einfügen. (Textbasierte Seite sollte reichen)
-  Zum Schluss die Farbdarstellung Einheitlich machen.

Backend:
-  Seite in ein PHP Vormat bringen (ist ziemlich leicht, fallst dus nicht weißt einfach googeln)
-  Scripts (verwende derzeit JS in HTML) und DB-Verbindung in einem eigenen Ordner übergeben
-  Die DB einrichtung würd ich nicht On-Prem machen, sondern gleich dann beim Webhost (Binde hier vll nur die Buchungslogik ein, ohne Zahlung)
-  PHPMailer hinzufügen oder gleich am Webhost schaun ob die Möglichkeit da ist für eine Bestätigungsmail 
-  Stripe API Anbindung - (hier könnte natürlich auch eine Mail kommen)

Idee: 
Ablauf der Buchung
1. User wählt Auto + Zeitraum
2. Formular POST an PHP → isCarAvailable() prüfen
3. Falls verfügbar, weiter zu Stripe Checkout
4. Nach Zahlung: Eintrag in bookings + Mailversand
5. In der Auto-Detailseite → Verfügbarkeit dynamisch prüfen



Für Mehmet;
- Digitale-Zahlung;
  https://stripe.com/at/payments
- Vorort-Zahlung; 
  https://stripe.com/at/terminal/wisepad3

- Webhosting & Domain
  https://www.world4you.com/

- AGB´s
  https://www.wko.at/agb
  https://www.shopify.com/de/tools/richtlinien-generator/richtlinie-fur-geschaftsbedingungen?term=agb%20generieren%20kostenlos&adid=565806664933&campaignid=15439902470&utm_medium=cpc&utm_source=google&gad_source=1&gad_campaignid=15439902470&gbraid=0AAAAAC3Mv88DDQuFDSXu8IyWBNIS_NaUa&gclid=Cj0KCQjwoZbBBhDCARIsAOqMEZXylxlzRaZIRqHsSS-x9I3e2r9ZuHFrlvtb3AzjinTwriQ-NRdIxsEaAoyzEALw_wcB&cmadid=516586848;cmadvertiserid=10730501;cmcampaignid=26990768;cmplacementid=324286430;cmcreativeid=163722649;cmsiteid=5500011#ToolContent

- Mietvertrag
  Selber erstellen, schau bei OJ-Cars es an und kopier es in eine Textdatei, bearbeite es so dass es für dich passt. Lass ChatGPT es auf, Rechtschreibung, Grammatik, Logik und auf das Österreichische Recht prüfen.
