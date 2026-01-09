# Bakkerijproject - Laravel Applicatie

Dit project is een content management systeem voor een bakkerij website. Het bevat functionaliteiten voor nieuwsbeheer, een FAQ-sectie, productencatalogus met bestellingssysteem en gebruikersprofielen met verschillende rollen (Admin/User).

## Installatie Handleiding

Volg deze stappen om het project lokaal draaiende te krijgen:

**1. Clone de repository**

```bash
git clone https://github.com/BaTaNav/Bakkerij-project.git
cd Bakkerij-project
```

**2. Installeer PHP dependencies**

```bash
composer install
```

**3. Installeer en build JavaScript assets**

```bash
npm install
npm run dev
```

**4. Omgevingsvariabelen instellen**

Maak een kopie van het voorbeeld bestand:

```bash
cp .env.example .env
```

*Op Windows (PowerShell):*
```powershell
copy .env.example .env
```

Generate de app key:

```bash
php artisan key:generate
```

**5. Database Configuratie**

Zorg dat je database driver (bijv. SQLite of MySQL) correct is ingesteld in het `.env` bestand.

**Voor SQLite (standaard):**

Maak het database bestand aan:

*Op Mac/Linux:*
```bash
touch database/database.sqlite
```

*Op Windows (PowerShell):*
```powershell
New-Item database/database.sqlite -ItemType File
```

*Of maak het bestand handmatig aan:*
- Navigeer naar de `database` map in je project
- Maak een nieuw leeg tekstbestand aan
- Hernoem het naar `database.sqlite` (zorg dat je bestandsextensies zichtbaar hebt in Windows Verkenner)
- Het bestand moet GEEN `.txt` extensie hebben, alleen `database.sqlite`

**Voor MySQL:**

Pas de volgende variabelen aan in je `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bakkerij
DB_USERNAME=root
DB_PASSWORD=
```

**6. Migraties en Seeders draaien**

⚠️ **Belangrijk:** Zorg dat je eerst stap 5 hebt voltooid en het `database.sqlite` bestand bestaat voordat je dit commando uitvoert!

Dit commando maakt de tabellen aan en vult de database met testdata en het admin account:

```bash
php artisan migrate:fresh --seed
```

**7. Storage link aanmaken**

Voor het uploaden en weergeven van afbeeldingen:

```bash
php artisan storage:link
```

**8. Start de development server**

```bash
php artisan serve
```

De applicatie is nu beschikbaar op `http://localhost:8000` (of op `http://bakkerijproject.test` als je Laravel Herd gebruikt).

💡 **Note:** Als je Laravel Herd gebruikt, hoef je `php artisan serve` niet uit te voeren. Herd draait automatisch je Laravel projecten.

## Inloggegevens

Het project wordt geleverd met een standaard administrator account zoals vereist:

* **Rol:** Admin
* **Email:** admin@ehb.be
* **Wachtwoord:** Password!321

## Functionaliteiten

**Nieuws**
* Publiek kan nieuwsartikelen lezen
* Admins kunnen nieuwsberichten aanmaken, bewerken en verwijderen
* Upload en opslag van afbeeldingen op de server
* Categorisatie van artikelen

**FAQ**
* Vragen gegroepeerd per categorie (1-op-veel relatie)
* Admins kunnen categorieën en vragen beheren via CRUD functionaliteit
* Gebruikers kunnen FAQ's bekijken per categorie
* Overzichtelijke presentatie voor bezoekers

**Contact**
* Bezoekers kunnen een contactformulier invullen
* E-mail wordt verstuurd naar de admin
* Client-side en server-side validatie
* CSRF en XSS bescherming

**Producten & Bestellingen**
* Overzicht van bakkerijproducten met afbeeldingen en prijzen
* Bestellingssysteem met veel-op-veel relatie (Orders ↔ Products)
* Admins kunnen producten beheren via CRUD functionaliteit

**Gebruikersbeheer**
* Admins kunnen via het dashboard andere gebruikers admin-rechten geven of ontnemen
* Rollenbeheer (User vs Admin)
* Overzicht van alle geregistreerde gebruikers

**Profiel**
* Gebruikers kunnen hun profiel aanpassen
* Publieke profielpagina voor elke gebruiker
* Upload van profielfoto
* Biografieveld en persoonlijke informatie

## Technische Specificaties

**Layouts & Components**
* Minimaal 2 verschillende layouts (guest en authenticated)
* Gebruik van reusable Blade Components voor herbruikbaarheid
* Component-gebaseerde architectuur

**Middleware**
* Authenticatie middleware op alle beveiligde routes
* Admin middleware voor beheerdersfunctionaliteit
* CSRF protection op alle formulieren

**Eloquent Relaties**

*1-op-veel relaties:*
* FAQ Categories → FAQ Items
* Users → Articles

*Veel-op-veel relaties:*
* Orders ↔ Products (via `order_product` pivot tabel)

**Beveiliging**
* CSRF tokens op alle formulieren
* XSS protection via Laravel's Blade templating engine
* Client-side validatie met JavaScript
* Server-side validatie met Form Requests
* Password hashing met bcrypt
* Middleware bescherming op alle gevoelige routes

## Git & Documentatie

**Version Control**
* `vendor/` en `node_modules/` staan in `.gitignore`
* Volledige Git geschiedenis met betekenisvolle commits
* Branches gebruikt voor feature development

## Bronvermeldingen

* **Framework:** [Laravel 11 Documentation](https://laravel.com/docs)
* **Authenticatie:** [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
* **Styling:** [Tailwind CSS](https://tailwindcss.com/)
* **Tutorials:** [Laracasts](https://laracasts.com) en [Laravel Daily YouTube Channel](https://www.youtube.com/@LaravelDaily)
* **Final styling:** gemaakt door copilot door broken chat in VS Code geen link.
* **Cursusmateriaal:** Backend Development cursusmateriaal (Erasmushogeschool Brussel)






*Dit project is ontwikkeld als schoolopdracht voor de Erasmushogeschool Brussel.*
