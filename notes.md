# Vorab
In diesem Dokument werden die ganzen Notizen aufgeschrieben. Rechtschreibung und Gramatik werden hier auser Kraft gesetzt.

Herr D. wird folgend als Auftraggeber gennant.

# Notizen die einfach so einfallen
Auf der Seite detail-#.php wird zurzeit die Mietdauer zu Auswahl dargestellt. Auf der Seite sind Felder:

* Mietdauer
* Abholung
* Rückgabe

Das Feld Rückgabe kann entfernt werden da der Besitzer des Fahrzeuges eine Rückgabezeit bzw. Rückgabe Datum wählen muss. Es handelt sich um eine einfache Reservierung.

Im Backend kann der Auftraggeber die Daten vom Kunden ausfüllen. Dabei würde ich folgende Daten empfehlen.

* Vorname
* Nachname
* Geburtsdatum
* Wohnadresse
* Ausweisnummer
* Führerscheinnummer
* Ausstellungsdatum (Gültig ab)
* Verfallsdatum (Gültig bis)

Im Backend muss der Geschäftsführer die Reservierung genehmigen. Dabei kann auf einen Butto gedrückt werden und dies wird dann gebucht. Im Anschluss wird im Kalender die Daten reserviert.

# Eventuelle Funktionen
```
isReserved()
permitReservation()
```
