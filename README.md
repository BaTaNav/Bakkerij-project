# Bakkerijproject

Een webapplicatie gebouwd met Laravel voor het beheren van een bakkerij met nieuwsartikelen, FAQ, producten en bestellingen.

## Installatiestappen

1. Clone de repository:
```bash
git clone [repository-url]
cd bakkerijproject
```

2. Installeer PHP dependencies:
```bash
composer install
```

3. Installeer NPM dependencies:
```bash
npm install
```

4. Kopieer het `.env.example` bestand naar `.env` en configureer je database instellingen:
```bash
cp .env.example .env
```

5. Genereer de application key:
```bash
php artisan key:generate
```

6. Voer de database migraties uit met seeders:
```bash
php artisan migrate:fresh --seed
```

7. Link de storage directory:
```bash
php artisan storage:link
```

8. Start de development server:
```bash
php artisan serve
npm run dev
```

## Verplichte Admin Login

* **Email:** admin@ehb.be
* **Wachtwoord:** Password!321

## Functionele Features

### Rollenbeheer (User vs Admin)
- Gebruikers kunnen zich registreren en inloggen
- Admins hebben toegang tot een speciaal dashboard
- Admin dashboard om gebruikers te beheren en rollen toe te wijzen

### Publieke Profielpagina's
- Elke gebruiker heeft een publieke profielpagina
- Gebruikers kunnen hun eigen profiel bewerken
- Profielfoto upload functionaliteit
- Biografieveld en andere profielinformatie

### Nieuwssysteem
- Volledige CRUD functionaliteit voor artikelen
- Afbeeldingen uploaden en opslaan op de server
- Categorisatie van nieuwsartikelen
- Alleen admins kunnen nieuws toevoegen/bewerken/verwijderen

### FAQ-pagina
- Gecategoriseerde FAQ items
- CRUD functionaliteit voor admins
- Gebruikers kunnen FAQ's bekijken per categorie
- Zoekfunctionaliteit binnen FAQ

### Contactformulier
- Contactformulier met client-side validatie
- E-mail functionaliteit naar de admin
- Beveiliging tegen spam

## Extra Features

- **Productencatalogus**: Overzicht van bakkerijproducten met afbeeldingen en prijzen
- **Bestellingssysteem**: Veel-op-veel relatie tussen bestellingen en producten
- **Responsief design**: Volledig responsive interface met Tailwind CSS
- **Dashboard statistieken**: Admin dashboard met overzicht van statistieken

## Technische Specs

### Layouts & Components
- Minimaal 2 verschillende layouts (guest en authenticated)
- Gebruik van reusable Blade Components
- Component-gebaseerde architectuur

### Middleware
- Authenticatie middleware op alle beveiligde routes
- Admin middleware voor beheerdersfunctionaliteit
- CSRF protection op alle formulieren

### Eloquent Relaties
**1-op-veel relaties:**
- FAQ Categories → FAQ Items
- Users → Articles

**Veel-op-veel relaties:**
- Orders → Products (via order_product pivot tabel)

### Beveiliging
- CSRF tokens op alle formulieren
- XSS protection via Laravel's Blade templating
- Client-side validatie met JavaScript
- Server-side validatie met Form Requests
- Password hashing met bcrypt

## Documentatie & Git

### Version Control
- Volledige Git geschiedenis met betekenisvolle commits
- `vendor/` en `node_modules/` staan in `.gitignore`
- Branches gebruikt voor feature development

### Bronvermelding

**Framework & Tools:**
- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com/)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)

**Tutorials & Resources:**
- [Laravel Daily YouTube Channel](https://www.youtube.com/@LaravelDaily)
- [Laracasts](https://laracasts.com)
- [Laravel News](https://laravel-news.com)

## Screencast

**Link naar video demo:** [Voeg hier de link naar je screencast toe]

## Licentie

Dit project is ontwikkeld als schoolopdracht voor de Erasmushogeschool Brussel.
