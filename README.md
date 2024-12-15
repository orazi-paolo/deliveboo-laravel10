# DeliveBoo - Food Delivery Platform 🍕
<div align="center">
    <img src="./public/images/deliveroo-logo.webp" alt="Deliveroo Logo" height="100px">
    <img src="./public/images/logo-deliveboo.png" alt="DeliveBoo Logo" height="40px">
</div>

DeliveBoo è una piattaforma di food delivery ispirata dalle piattaforme mderne più famose e celebri del Web, sviluppata con Vue 3, integrata con un backend Laravel 10 e MySQL.
Permette ai ristoratori di registrare la propria attività e gestire il proprio menù, mentre i clienti possono ordinare i loro piatti preferiti.

Vai alla repository frontend [DeliveBoo-FE](https://github.com/orazi-paolo/deliveboo-vue3).

## 📸 Galleria

- [Galleria immagini](GALLERY.md)

## Tecnologie Utilizzate 🛠

- Laravel 10.x
- PHP 8.1+
- MySQL
- Vue.js 3
- Bootstrap 5
- Sass
- Braintree (per i pagamenti)
- FontAwesome
- Bootstrap Icons

## Requisiti di Sistema 📋

- PHP >= 8.1
- Composer
- Node.js e npm
- MySQL
- Apache/Nginx

## Installazione 🚀

### 🧾 Requisiti di configurazione

1. Registrati su [Braintree](https://sandbox.braintreegateway.com) e crea un account di sviluppatore
2. Recupera le keys fornite da Braintree e inserisci le nel file .env del backend ( BRAINTREE_MERCHANT_ID, BRAINTREE_PUBLIC_KEY, BRAINTREE_PRIVATE_KEY )
3. Registrati su [Mailtrap](https://mailtrap.io/) e crea un account per poter testare la ricezione delle email

### ⚙️ Backend

1. Clona il repository

```bash
git clone https://github.com/orazi-paolo/deliveboo-laravel10.git
```

2. Installa le dipendenze del backend

```bash
composer install
```

3. Installa le dipendenze del frontend

```bash
npm install
```

4. Copia il file .env.example e rinominalo in .env

```bash
cp .env.example .env
```

5. Configura il file .env con le informazioni del tuo database
    - Consigliamo l'utilizzo di MySQL 8.0+

6. Genera la chiave per l'app Laravel

```bash
php artisan key:generate
```

7. Esegui le migrazioni per creare le tabelle del database

```bash
php artisan migrate
```

8. Popola il database con i dati di fake
```bash
php artisan db:seed
```


9. Crea il link simbolico per lo storage

```bash
php artisan storage:link
```

## Avvio dell'Applicazione 🎯

1. Avvia il server Laravel

```bash
php artisan serve
```

2. Avvia il server frontend

```bash
npm run dev
```

3. Apri il browser e vai alla pagina [http://localhost:8000](http://localhost:8000)

## Funzionalità Principali ⭐

### Area Ristoratore
- Registrazione e autenticazione ristoratori
- Gestione del profilo ristorante
- CRUD completo per i piatti del menù
- Visualizzazione ordini e statistiche
- Dashboard personalizzata

### Area Cliente
- Ricerca ristoranti per tipologia
- Visualizzazione menù
- Carrello della spesa
- Checkout con pagamento online
- Conferma ordine via email

## Struttura del Database 📊

Il database include le seguenti tabelle principali:
- users (ristoratori)
- restaurants
- plates (piatti)
- orders
- tipologies (tipologie di cucina)
- order_plate (tabella pivot)
- restaurant_tipology (tabella pivot)

## API Endpoints 🔌

L'applicazione espone le seguenti API principali:

- `GET /api/restaurants` - Lista dei ristoranti
- `GET /api/restaurants/filter` - Ricerca ristoranti per tipologia
- `GET /api/restaurants/{slug}` - Dettaglio ristorante
- `GET /api/tipologies` - Lista delle tipologie di cucina
- `GET /api/plates` - Lista dei piatti
- `GET /api/plates/{slug}` - Dettaglio piatto
- `POST /api/checkout` - Creazione nuovo ordine

## Struttura del Progetto 📂

```bash
.
├── app
│   ├── Http
│   │   ├── Controllers
│   │   ├── Middleware
│   │   ├── Requests
│   │   └── ...
│   ├── Models
│   └── ...
├── public
│   ├── images
│   └── ...
├── resources
│   ├── js
│   ├── sass
│   └── views
│       ├── layouts
│       ├── admin
│       ├── auth
│       ├── emails
│       ├── partials
│       ├── home.blade.php
│       └── ...
├── routes
│   ├── api.php
│   └── web.php
├── ...
```

## 🤝 Contributi

Contribuisci al progetto! Consulta la [guida per i contributi](CONTRIBUTING.md) per informazioni su come contribuire.

## 👥 Team di Sviluppo

👨‍💻 [@orazi-paolo](https://github.com/orazi-paolo)
👩‍💻[@natdm02](https://github.com/natdm02)
👨‍💻[@orsoli](https://github.com/orsoli)
👨‍💻[@JeromeMaligaya](https://github.com/JeromeMaligaya)
👨‍💻[@Marcap00](https://github.com/Marcap00)

## 📄 Licenza

Questo progetto è rilasciato sotto la licenza [MIT License](LICENSE).

Copyright © 2024 [DeliveBoo](https://github.com/orazi-paolo/deliveboo-vue3).

Concessione gratuita per utilizzare, copiare, modificare, fondere, pubblicare, distribuire, sublicenziare e/o vendere copie del Software, e per permettere a chiunque altro a farlo, a condizione che il copyright originale e questa dichiarazione di licenza siano inclusi in tutte le copie o parti sostanziali del Software.

IL SOFTWARE È FORNITO "COSÌ COM'È", SENZA GARANZIA DI ALCUN TIPO, ESPRESSA O IMPLICITA, INCLUSE MA NON LIMITATE A GARANZIE DI COMMERCIABILITÀ, IDONEITÀ PER UNO SCOPO PARTICOLARE E NON INFRAZIONE. IN NESSUN CASO IL DETENTORE DEL COPYRIGHT O I CONCESSIONARI SONO RESPONSABILI PER QUALSIASI DANNO O PERDITA, SIA IN UN'AZIONE CONTRATTUALE, ILLECITA O ALTRIMENTI, DERIVANTE DA, O IN CONNESSIONE CON, L'UTILIZZO DEL SOFTWARE.
