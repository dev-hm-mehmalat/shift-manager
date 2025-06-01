# Shift-Manager

**Shift-Manager** ist eine Laravel-Anwendung zur Verwaltung von Remits (z. B. Rechnungen oder Zahlungsbelegen) mit QR-Code-Funktion sowie einer integrierten Schichtverwaltung inklusive Kalenderansicht.

## Features

- Übersicht aller Remits
- Anlegen, Bearbeiten und Löschen von Remits
- QR-Code-Generierung für jeden Remit (z. B. zur schnellen Weitergabe oder Archivierung)
- Schichtverwaltung (CRUD: Anlegen, Bearbeiten, Löschen, Anzeigen von Schichten)
- Kalenderansicht für Schichten (zeigt geplante Schichten übersichtlich an)
- Moderne, erweiterbare Codebasis (Laravel, MVC)

## Screenshots

![Remit Übersicht](./public/images/demo-remit-list.png)  
*(Screenshot für Remits)*

![Schichtplan Übersicht](./public/images/demo-shift-index.png)  
*(Screenshot für Schichtübersicht)*

![Schicht-Kalender](./public/images/demo-shift-calendar.png)  
*(Screenshot Kalenderansicht)*

## Installation

1. **Repository klonen**
    ```bash
    git clone <dein-repo-link>
    cd shift-manager
    ```

2. **Abhängigkeiten installieren**
    ```bash
    composer install
    ```

3. **Umgebungsdatei einrichten**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    > Passe die `.env`-Datei an deine Datenbank-Konfiguration an!

4. **QR-Code-Paket installieren**
    ```bash
    composer require simplesoftwareio/simple-qrcode
    ```

5. **Migrationen ausführen (Datenbanktabellen erstellen)**
    ```bash
    php artisan migrate
    ```

6. **Server starten**
    ```bash
    php artisan serve
    ```
    Die Anwendung ist erreichbar unter: [http://localhost:8000](http://localhost:8000)

## Grundfunktionen

### Remits

- **Remit anlegen:** Über das Formular auf `/remit/create`
- **Remits ansehen:** Auf der Übersichtsseite `/remit`
- **Remit bearbeiten:** Über die Detailseite `/remit/{id}/edit`
- **Remit löschen:** Über die Detailseite oder Listenansicht
- **QR-Code:** Auf der Detailseite jedes Remits (`/remit/{id}`) wird automatisch ein QR-Code generiert.

### Schichten (Shift-Management)

- **Schicht anlegen:** Über das Formular auf `/shift/create`
- **Schichten ansehen:** Auf der Übersichtsseite `/shift`
- **Schicht bearbeiten:** Über die Detailseite `/shift/{id}/edit`
- **Schicht löschen:** Über die Detail- oder Listenansicht
- **Schicht-Kalender:** Übersicht aller geplanten Schichten auf `/shift/calendar`

## Weiterentwicklung (Ideen)

- Benutzerverwaltung (Authentifizierung und Rollen)
- Schichttausch-Feature (Mitarbeitende können Schichten tauschen)
- Benachrichtigungen per E-Mail (z. B. Erinnerungen an Schichtbeginn)
- Übersicht „Wer fehlt? Wer ist im Urlaub?“
- Mehrsprachigkeit (Localization)
- Frontend-Verbesserungen mit Livewire oder Vue.js

## Systemanforderungen

- PHP >= 8.2
- Composer
- Eine Datenbank (MySQL, MariaDB, SQLite, etc.)
- Node.js/NPM (optional für Frontend-Assets)

## Lizenz

MIT License

---

## Kontakt

Erstellt von **Hamza** – Fragen, Feedback oder Anregungen? Einfach melden!

---

## Quellen und Links

- [Laravel Dokumentation](https://laravel.com/docs)
- [Simple QrCode Paket](https://github.com/SimpleSoftwareIO/simple-qrcode)