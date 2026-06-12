# Getting Started

## Option A — Docker (recommended)

Requirements: Docker + Docker Compose.

```bash
git clone https://github.com/aliammari1/WeDrive-Carpooling-app.git
cd WeDrive-Carpooling-app
cp .env.example .env        # optional: tweak DB / ORS_API_KEY
docker compose up --build
```

This starts:

- **app** — `php:8.2-apache` on <http://localhost:8080>
- **db** — `mysql:8.4`, auto-loading `database/schema.sql` and
  `database/seeds.sql` on first boot.

Seed demo users with valid password hashes:

```bash
docker compose exec app php database/seed.php
```

| Email | Password | Role |
|---|---|---|
| `admin@wedrive.test` | `password123` | admin |
| `driver@wedrive.test` | `password123` | conducteur |
| `rider@wedrive.test` | `password123` | passager |

## Option B — Local PHP

Requirements: PHP 8.2+, Composer, a MySQL/MariaDB server.

```bash
composer install
cp .env.example .env         # set DB_* credentials
mysql -u root -p < database/schema.sql
mysql -u root -p < database/seeds.sql
php database/seed.php
php -S localhost:8000         # serve from the project root
```

## Configuration

All configuration is via environment variables (loaded from `.env`):

| Variable | Default | Purpose |
|---|---|---|
| `DB_HOST` | `127.0.0.1` | MySQL host |
| `DB_PORT` | `3306` | MySQL port |
| `DB_NAME` | `wedrive` | database name |
| `DB_USER` / `DB_PASSWORD` | `root` / _(empty)_ | credentials |
| `ORS_API_KEY` | _(empty)_ | OpenRouteService key; blank => offline fallback |

## Running the tests

```bash
composer install
vendor/bin/phpunit
```
